<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\BankingProvider;
use App\Http\Requests\V1\StoreBankingProviderRequest;
use App\Http\Requests\V1\UpdateBankingProviderRequest;

class BankingProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBankingProviderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BankingProvider $bankingProvider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankingProvider $bankingProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBankingProviderRequest $request, BankingProvider $bankingProvider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankingProvider $bankingProvider)
    {
        //
    }
}
