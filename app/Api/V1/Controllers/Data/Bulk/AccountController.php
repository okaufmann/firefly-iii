<?php
declare(strict_types=1);
/*
 * AccountController.php
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

namespace FireflyIII\Api\V1\Controllers\Data\Bulk;


use FireflyIII\Api\V1\Controllers\Controller;
use FireflyIII\Api\V1\Requests\Data\Bulk\MoveTransactionsRequest;
use FireflyIII\Repositories\Account\AccountRepositoryInterface;
use FireflyIII\Services\Internal\Destroy\AccountDestroyService;
use Illuminate\Http\JsonResponse;

/**
 * Class AccountController
 */
class AccountController extends Controller
{
    private AccountRepositoryInterface $repository;

    public function __construct()
    {
        parent::__construct();
        $this->middleware(
            function ($request, $next) {
                $this->repository = app(AccountRepositoryInterface::class);
                $this->repository->setUser(auth()->user());

                return $next($request);
            }
        );
    }

    /**
     * @param MoveTransactionsRequest $request
     *
     * @return JsonResponse
     */
    public function moveTransactions(MoveTransactionsRequest $request): JsonResponse
    {
        $accountIds  = $request->getAll();
        $original    = $this->repository->findNull($accountIds['original_account']);
        $destination = $this->repository->findNull($accountIds['destination_account']);

        /** @var AccountDestroyService $service */
        $service = app(AccountDestroyService::class);
        $service->moveTransactions($original, $destination);

        return response()->json([], 204);

    }

}
