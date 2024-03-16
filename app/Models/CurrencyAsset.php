<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyAsset extends Model
{
    use HasFactory;

    protected $fillable = ['currency_type', 'balance', 'weighted_conversion_rate'];
}
