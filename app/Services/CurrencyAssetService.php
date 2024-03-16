<?php

namespace App\Services;

use App\Models\CurrencyAsset;
use App\Models\CurrencyReceipt;
use App\Repositories\CurrencyAssetRepository;

class CurrencyAssetService
{
    private static $instance;

    protected $currencyAssetRepository;

    public function __construct(CurrencyAssetRepository $currencyAssetRepository)
    {
        $this->currencyAssetRepository = $currencyAssetRepository;
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function updateAssets()
    {
        // Group currency receipts by currency type and calculate total amount and total weighted conversion rate
        $currencyData = CurrencyReceipt::selectRaw('currency_type, sum(amount) as total_amount, sum(amount * conversion_rate) as total_weighted_conversion_rate')
            ->groupBy('currency_type')
            ->get();

        foreach ($currencyData as $data) {
            // Calculate the weighted conversion rate
            $weightedConversionRate = $data->total_weighted_conversion_rate / $data->total_amount;

            // Update or create currency asset record
            CurrencyAsset::updateOrCreate(
                ['currency_type' => $data->currency_type],
                ['balance' => $data->total_amount, 'weighted_conversion_rate' => $weightedConversionRate]
            );
        }

    }

    public function getCurrencyAssets()
    {
        return $this->currencyAssetRepository->getAllCurrencyAssets();
    }
}
