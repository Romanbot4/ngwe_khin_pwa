<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreBankingProviderRequest;
use App\Http\Requests\V1\UpdateBankingProviderRequest;
use App\Models\BankingProvider;
use App\Http\Resources\V1\BankingProviderCollection;
use App\Http\Resources\V1\BankingProviderResource;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Storage;

class BankingProviderController extends Controller
{
    protected string $image_folder = "banking_providers";

    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index(BankingProvider $bankingProvider)
    {
        return $this->ok(new BankingProviderCollection($bankingProvider->paginate()));
    }

    public function show(BankingProvider $bankingProvider)
    {
        return $this->ok(new BankingProviderResource($bankingProvider));
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
        $data["image"] = $request->file('image')->store($this->image_folder);
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

        if ($request->file('image')) {
            Storage::delete($bankingProvider->image);
            $data['image'] = $request->file('image')->store($this->image_folder);
        } else {
            $data['image'] = $bankingProvider->image;
        }

        $bankingProvider->fill($data)->update();
        return $this->ok(new BankingProviderResource($bankingProvider));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankingProvider $bankingProvider)
    {
        $data = $bankingProvider->destroy([$bankingProvider->id]);
        return $data == 1 ? $this->deleted() : $this->notFound();
    }
}
