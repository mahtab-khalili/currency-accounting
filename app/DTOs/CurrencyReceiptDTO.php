<?php

namespace App\DTOs;

class CurrencyReceiptDTO
{
    public $currency_type;
    public $amount;
    public $conversion_rate;

    public function __construct(string $currency_type, float $amount, float $conversion_rate)
    {
        $this->currency_type = $currency_type;
        $this->amount = $amount;
        $this->conversion_rate = $conversion_rate;
    }
}
