<?php
/**
 * SetDescriptionTest.php
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

namespace Tests\Unit\TransactionRules\Actions;

use FireflyIII\Models\RuleAction;
use FireflyIII\Models\TransactionJournal;
use FireflyIII\TransactionRules\Actions\SetDescription;
use Tests\TestCase;

/**
 * Class SetDescriptionTest
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class SetDescriptionTest extends TestCase
{
    /**
     * @covers \FireflyIII\TransactionRules\Actions\SetDescription
     */
    public function testAct(): void
    {
        // get journal, give fixed description
        $description          = 'text' . $this->randomInt();
        $newDescription       = 'new description' . $this->randomInt();
        $journal              = $this->getRandomWithdrawal();
        $journal->description = $description;
        $journal->save();

        // fire the action:
        $ruleAction               = new RuleAction;
        $ruleAction->action_value = $newDescription;
        $action                   = new SetDescription($ruleAction);
        $result                   = $action->act($journal);
        $this->assertTrue($result);
        $journal = TransactionJournal::find($journal->id);

        // assert result
        $this->assertEquals($newDescription, $journal->description);
    }
}
