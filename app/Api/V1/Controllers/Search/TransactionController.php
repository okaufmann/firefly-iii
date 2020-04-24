<?php
declare(strict_types=1);
/**
 * TransactionController.php
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

namespace FireflyIII\Api\V1\Controllers\Search;

use FireflyIII\Api\V1\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class TransactionController
 */
class TransactionController extends Controller
{
    /** @var string */
    public const SEARCH_ALL = 'all';
    /** @var string */
    public const SEARCH_DESCRIPTION = 'description';
    /** @var string */
    public const SEARCH_NOTES = 'notes';
    /** @var string */
    public const SEARCH_ACCOUNTS = 'accounts';
    /** @var array */
    private $validFields;

    public function __construct()
    {
        parent::__construct();
        $this->validFields = [
            self::SEARCH_ALL,
            self::SEARCH_DESCRIPTION,
            self::SEARCH_NOTES,
            self::SEARCH_ACCOUNTS,
        ];
    }

    /**
     * @param Request $request
     *
     * @return void
     */
    public function search(Request $request): void
    {
        die('the route is present but nobody\'s home.');
    }
}
