<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\TransactionCategoryResource;
use App\Models\TransactionCategory;
use Yajra\DataTables\Facades\DataTables;

class TransactionCategoryViewController extends Controller
{
    public function category()
    {
        return view('category.category');
    }

    public function categoryTableData()
    {
        return DataTables::eloquent(TransactionCategory::query())
            ->addColumn('actions', function ($user) {
                return view('table.actions', [
                    "editModalId" => "#editCategoryFormModal",
                    "deleteModalId" => "#deleteCategoryFormModal",
                    "value" => json_encode(new TransactionCategoryResource($user))
                ]);
            })
            ->rawColumns(['actions'])
            ->toJson();
    }
}
