<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankingProvider extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "image"
    ];

    protected $hidden = [
        "created_at",
        "updated_at"
    ];

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
