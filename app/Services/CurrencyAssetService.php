<?php

namespace App\Services;

use App\Models\CurrencyAsset;
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
        // Logic to update currency assets
    }

    public function getCurrencyAssets()
    {
        return $this->currencyAssetRepository->getAllCurrencyAssets();
    }
}
