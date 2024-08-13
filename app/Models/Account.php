<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public function bankingProvider()
    {
        return $this->belongsTo(BankingProvider::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
