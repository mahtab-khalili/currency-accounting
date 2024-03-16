<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyReceipt extends Model
{
    use HasFactory;

    protected $fillable = ['currency_type', 'amount', 'conversion_rate'];
}
