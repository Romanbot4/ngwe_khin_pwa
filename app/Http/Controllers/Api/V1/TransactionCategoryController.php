<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\TransactionCategory;
use App\Http\Requests\V1\StoreTransactionCategoryRequest;
use App\Http\Requests\V1\UpdateTransactionCategoryRequest;
use App\Http\Resources\V1\TransactionCategoryCollection;
use App\Http\Resources\V1\TransactionCategoryResource;
use App\Traits\ApiResponse;

class TransactionCategoryController extends Controller
{
    use ApiResponse;
    public function index(TransactionCategory $category)
    {
        return $this->ok(new TransactionCategoryCollection($category->paginate()));
    }

    public function show(TransactionCategory $category)
    {
        return $this->ok(new TransactionCategoryResource($category));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionCategoryRequest $request)
    {
        $data = $request->validated();
        /**
         * @var TransactionCategory
         */
        $category = TransactionCategory::create($data);
        return $this->ok(new TransactionCategoryResource($category));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionCategoryRequest $request, TransactionCategory $category)
    {
        $data = $request->validated();
        $category->fill($data)->update();
        return $this->ok(new TransactionCategoryResource($category));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransactionCategory $category)
    {
        $data = $category->destroy([$category->id]);
        return $data == 1 ? $this->deleted() : $this->notFound();
    }
}
