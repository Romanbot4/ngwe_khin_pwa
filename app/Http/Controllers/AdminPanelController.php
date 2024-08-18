<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\TransactionCategoryResource;
use App\Models\TransactionCategory;
use Yajra\DataTables\Facades\DataTables;

class AdminPanelController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function categories()
    {
        return view('categories.categories');
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
