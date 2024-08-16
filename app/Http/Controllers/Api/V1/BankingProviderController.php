<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreBankingProviderRequest;
use App\Http\Requests\V1\UpdateBankingProviderRequest;
use App\Models\BankingProvider;
use App\Http\Resources\V1\BankingProviderCollection;
use App\Http\Resources\V1\BankingProviderResource;
use App\Traits\ApiResponse;

class BankingProviderController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index(BankingProvider $bankingProvider)
    {
        return new BankingProviderCollection($bankingProvider->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBankingProviderRequest $request)
    {
        $data = $request->validated();
        /**
         * @var BankingProvider
         */
        $bankingProvider = BankingProvider::create($data);
        $resource = new BankingProviderResource($bankingProvider);
        return $this->ok($resource);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBankingProviderRequest $request, BankingProvider $bankingProvider)
    {
        $data = $request->validated();
        $value = $bankingProvider->fill($data)->save();
        return $this->ok($value);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankingProvider $bankingProvider, int $id)
    {
        $data = $bankingProvider->destroy([$id]);
        return $data == 1 ? $this->deleted($data) : $this->notFound();
    }
}
