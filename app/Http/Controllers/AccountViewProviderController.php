<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccountProviderResource;
use App\Models\AccountProvider;
use Yajra\DataTables\Facades\DataTables;

class AccountViewProviderController extends Controller
{
    public function accountProvider()
    {
        return view('account_providers.account_providers');
    }

    public function accountProviderTableData()
    {
        return DataTables::eloquent(AccountProvider::query())
            ->addColumn('image', function ($accountProvider) {
                return view('components.credit_flag_sm', [
                    "image" => str_starts_with($accountProvider->image, "http") ? $accountProvider->image : url_storage($accountProvider->image),
                    "name" => $accountProvider->name,
                ]);
            })
            ->addColumn('actions', function ($user) {
                return view('table.actions', [
                    "editModalId" => "#editAccountProviderFormModal",
                    "deleteModalId" => "#deleteAccountProviderFormModal",
                    "value" => json_encode(new AccountProviderResource($user))
                ]);
            })
            ->rawColumns(['actions', 'image'])
            ->toJson();
    }
}
