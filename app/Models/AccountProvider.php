<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountProvider extends Model
{
    use HasFactory;

    protected $table = "banking_providers";

    protected $fillable = [
        "name",
        "image"
    ];

    protected $hidden = [
        "updated_at"
    ];
}
