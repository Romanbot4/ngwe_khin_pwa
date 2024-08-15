<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Http\Requests\V1\StoreTransactionRequest;
use App\Http\Requests\V1\UpdateTransactionRequest;
use App\Http\Resources\V1\TransactionResource;
use App\Http\Resources\V1\TransactionCollection;
use App\Models\User;

class TransactionController extends Controller
{
    private int $item_limit;
    public function __construct()
    {
        $this->item_limit = config('app.item_limit');
    }

    public function all()
    {
        return new TransactionCollection(Transaction::paginate($this->item_limit));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return new TransactionCollection($user->transactions()->paginate($this->item_limit));
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
    public function store(StoreTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Transaction $transaction)
    {
        return new TransactionResource($transaction);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    protected function authorizeTransaction(User $user, Transaction $transaction)
    {
        if ($transaction->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }
    }
}
