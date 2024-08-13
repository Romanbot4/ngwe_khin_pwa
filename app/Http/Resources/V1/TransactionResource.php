<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'transactionTypeId' => $this->transaction_types_id,
            'accountId' => $this->account_id,
            'amount' => $this->amount,
            'note' => $this->note,
            'createdAt' => $this->created_at,
        ];
    }
}
