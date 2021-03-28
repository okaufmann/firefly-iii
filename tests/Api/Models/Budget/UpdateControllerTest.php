<?php
/*
 * UpdateControllerTest.php
 * Copyright (c) 2021 james@firefly-iii.org
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

namespace Tests\Api\Models\Budget;
use Laravel\Passport\Passport;
use Log;
use Tests\Objects\Field;
use Tests\Objects\FieldSet;
use Tests\Objects\TestConfiguration;
use Tests\TestCase;
use Tests\Traits\CollectsValues;
use Tests\Traits\TestHelpers;

/**
 * Class UpdateControllerTest
 */
class UpdateControllerTest extends TestCase
{
    use TestHelpers, CollectsValues;

    /**
     *
     */
    public function setUp(): void
    {
        parent::setUp();
        Passport::actingAs($this->user());
        Log::info(sprintf('Now in %s.', get_class($this)));
    }
    /**
     * @dataProvider updateDataProvider
     */
    public function testUpdate(array $submission): void
    {
        if ([] === $submission) {
            $this->markTestSkipped('Empty provider.');
        }
        Log::debug('testStoreUpdated()');
        Log::debug('submission       :', $submission['submission']);
        Log::debug('expected         :', $submission['expected']);
        Log::debug('ignore           :', $submission['ignore']);
        Log::debug('parameters       :', $submission['parameters']);

        $route = route('api.v1.budgets.update', $submission['parameters']);
        $this->assertPUT($route, $submission);

    }
    /**
     * @return array
     */
    public function updateDataProvider(): array
    {
        $configuration = new TestConfiguration;

        $fieldSet             = new FieldSet;
        $fieldSet->parameters = [1];
        $fieldSet->addField(Field::createBasic('name', 'uuid'));
        $configuration->addOptionalFieldSet('name', $fieldSet);

        $fieldSet             = new FieldSet;
        $fieldSet->parameters = [1];
        $fieldSet->addField(Field::createBasic('active', 'boolean'));
        $configuration->addOptionalFieldSet('active', $fieldSet);

        $fieldSet             = new FieldSet;
        $fieldSet->parameters = [1];
        $fieldSet->addField(Field::createBasic('order', 'order'));
        $configuration->addOptionalFieldSet('order', $fieldSet);

        $fieldSet               = new FieldSet;
        $fieldSet->parameters   = [1];
        $field                  = new Field;
        $field->fieldTitle      = 'auto_budget_currency_id';
        $field->fieldType       = 'random-currency-id';
        $field->ignorableFields = ['auto_budget_currency_code', 'a'];
        $field->title           = 'auto_budget_currency_id';
        $fieldSet->addField($field);
        $fieldSet->addField(Field::createBasic('auto_budget_type', 'random-auto-type'));
        $fieldSet->addField(Field::createBasic('auto_budget_amount', 'random-amount'));
        $fieldSet->addField(Field::createBasic('auto_budget_period', 'random-auto-period'));
        $configuration->addOptionalFieldSet('auto_budget_id', $fieldSet);

        $fieldSet               = new FieldSet;
        $fieldSet->parameters   = [1];
        $field                  = new Field;
        $field->fieldTitle      = 'auto_budget_currency_code';
        $field->fieldType       = 'random-currency-code';
        $field->ignorableFields = ['auto_budget_currency_id', 'b'];
        $field->title           = 'auto_budget_currency_code';
        $fieldSet->addField($field);
        $fieldSet->addField(Field::createBasic('auto_budget_type', 'random-auto-type'));
        $fieldSet->addField(Field::createBasic('auto_budget_amount', 'random-amount'));
        $fieldSet->addField(Field::createBasic('auto_budget_period', 'random-auto-period'));
        $configuration->addOptionalFieldSet('auto_budget_code', $fieldSet);

        $fieldSet               = new FieldSet;
        $fieldSet->parameters   = [1];
        $field                  = new Field;
        $field->fieldTitle      = 'auto_budget_type';
        $field->fieldType       = 'static-auto-none';
        $field->ignorableFields = ['auto_budget_currency_code', 'auto_budget_currency_id', 'c', 'auto_budget_period', 'auto_budget_amount'];
        $field->expectedReturn  = function ($value) {
            return null;
        };
        $field->title           = 'auto_budget_type';
        $fieldSet->addField($field);
        $configuration->addOptionalFieldSet('none', $fieldSet);
        return $configuration->generateAll();
    }
}
