<?php

namespace App\Observers;

use App\Models\CurrencyReceipt;
use App\Services\CurrencyAssetService;

class CurrencyReceiptObserver
{
    protected $currencyAssetService;

    public function __construct(CurrencyAssetService $currencyAssetService)
    {
        $this->currencyAssetService = $currencyAssetService;
    }

    public function created(CurrencyReceipt $currencyReceipt)
    {
        // Update currency assets
        $this->currencyAssetService->updateAssets();
    }
}
