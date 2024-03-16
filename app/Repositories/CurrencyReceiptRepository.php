<?php

namespace App\Repositories;

use App\Models\CurrencyReceipt;
use App\DTOs\CurrencyReceiptDTO;

class CurrencyReceiptRepository
{
    public function create(CurrencyReceiptDTO $data)
    {
        return CurrencyReceipt::create([
            'currency_type' => $data->currency_type,
            'amount' => $data->amount,
            'conversion_rate' => $data->conversion_rate,
        ]);
    }

}

