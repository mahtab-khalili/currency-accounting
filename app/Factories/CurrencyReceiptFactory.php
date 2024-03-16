<?php

namespace App\Factories;

use App\Models\CurrencyReceipt;

class CurrencyReceiptFactory
{
    public static function create(array $data)
    {
        return new CurrencyReceipt($data);
    }
}
