<?php
namespace App\Repositories;

use App\Models\CurrencyAsset;

class CurrencyAssetRepository
{
    public function getAllCurrencyAssets()
    {
        return CurrencyAsset::all();
    }
}
