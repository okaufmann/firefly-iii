<?php
/**
 * BillUpdateService.php
 * Copyright (c) 2019 james@firefly-iii.org
 *
 * This file is part of Firefly III (https://github.com/firefly-iii).
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace FireflyIII\Services\Internal\Update;

use FireflyIII\Factory\TransactionCurrencyFactory;
use FireflyIII\Models\Bill;
use FireflyIII\Models\Rule;
use FireflyIII\Models\RuleTrigger;
use FireflyIII\Models\TransactionCurrency;
use FireflyIII\Repositories\Bill\BillRepositoryInterface;
use FireflyIII\Services\Internal\Support\BillServiceTrait;
use Illuminate\Support\Collection;
use Log;

/**
 * @codeCoverageIgnore
 * Class BillUpdateService
 */
class BillUpdateService
{
    use BillServiceTrait;

    /**
     * Constructor.
     */
    public function __construct()
    {
        if ('testing' === config('app.env')) {
            Log::warning(sprintf('%s should not be instantiated in the TEST environment!', get_class($this)));
        }
    }

    /**
     * @param Bill $bill
     * @param array $data
     *
     * @return Bill
     */
    public function update(Bill $bill, array $data): Bill
    {
        /** @var TransactionCurrencyFactory $factory */
        $factory = app(TransactionCurrencyFactory::class);
        /** @var TransactionCurrency $currency */
        $currency = $factory->find($data['currency_id'] ?? null, $data['currency_code'] ?? null);

        if (null === $currency) {
            // use default currency:
            $currency = app('amount')->getDefaultCurrencyByUser($bill->user);
        }

        // enable the currency if it isn't.
        $currency->enabled = true;
        $currency->save();

        // old values
        $oldData = [
            'name'                      => $bill->name,
            'amount_min'                => $bill->amount_min,
            'amount_max'                => $bill->amount_max,
            'transaction_currency_name' => $bill->transactionCurrency->name,
        ];
        // new values
        $data['transaction_currency_name'] = $currency->name;
        $bill->name                        = $data['name'];
        $bill->match                       = $data['match'] ?? $bill->match;
        $bill->amount_min                  = $data['amount_min'];
        $bill->amount_max                  = $data['amount_max'];
        $bill->date                        = $data['date'];
        $bill->transaction_currency_id     = $currency->id;
        $bill->repeat_freq                 = $data['repeat_freq'];
        $bill->skip                        = $data['skip'];
        $bill->automatch                   = true;
        $bill->active                      = $data['active'] ?? true;
        $bill->save();

        // update note:
        if (isset($data['notes'])) {
            $this->updateNote($bill, (string) $data['notes']);
        }

        // update rule actions.
        $this->updateBillActions($bill, $oldData['name'], $data['name']);
        $this->updateBillTriggers($bill, $oldData, $data);

        return $bill;
    }

    /**
     * @param Bill  $bill
     * @param array $oldData
     * @param array $newData
     */
    private function updateBillTriggers(Bill $bill, array $oldData, array $newData): void
    {
        Log::debug(sprintf('Now in updateBillTriggers(%d, "%s")', $bill->id, $bill->name));
        /** @var BillRepositoryInterface $repository */
        $repository = app(BillRepositoryInterface::class);
        $repository->setUser($bill->user);
        $rules = $repository->getRulesForBill($bill);
        if (0 === $rules->count()) {
            Log::debug('Found no rules.');

            return;
        }
        Log::debug(sprintf('Found %d rules', $rules->count()));
        $fields = [
            'name'                      => 'description_contains',
            'amount_min'                => 'amount_more',
            'amount_max'                => 'amount_less',
            'transaction_currency_name' => 'currency_is'];
        foreach ($fields as $field => $ruleTriggerKey) {
            if ($oldData[$field] === $newData[$field]) {
                Log::debug(sprintf('Field %s is unchanged ("%s"), continue.', $field, $oldData[$field]));
                continue;
            }
            $this->updateRules($rules, $ruleTriggerKey, $oldData[$field], $newData[$field]);
        }

    }

    /**
     * @param Collection $rules
     * @param string     $key
     * @param string     $oldValue
     * @param string     $newValue
     */
    private function updateRules(Collection $rules, string $key, string $oldValue, string $newValue): void
    {
        /** @var Rule $rule */
        foreach ($rules as $rule) {
            $trigger = $this->getRuleTrigger($rule, $key);
            if (null !== $trigger && $trigger->trigger_value === $oldValue) {
                Log::debug(sprintf('Updated rule trigger #%d from value "%s" to value "%s"', $trigger->id, $oldValue, $newValue));
                $trigger->trigger_value = $newValue;
                $trigger->save();
                continue;
            }
            if (null !== $trigger && $trigger->trigger_value !== $oldValue && in_array($key, ['amount_more', 'amount_less'], true)
                && 0 === bccomp($trigger->trigger_value, $oldValue)) {
                Log::debug(sprintf('Updated rule trigger #%d from value "%s" to value "%s"', $trigger->id, $oldValue, $newValue));
                $trigger->trigger_value = $newValue;
                $trigger->save();
                continue;
            }
        }
    }


    /**
     * @param Rule   $rule
     * @param string $key
     *
     * @return RuleTrigger|null
     */
    private function getRuleTrigger(Rule $rule, string $key): ?RuleTrigger
    {
        return $rule->ruleTriggers()->where('trigger_type', $key)->first();
    }
}
