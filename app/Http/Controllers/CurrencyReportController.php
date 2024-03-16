<?php

namespace App\Http\Controllers;

use App\Models\CurrencyReceipt;
use App\Services\CurrencyAssetService;
use Illuminate\Http\Request;

class CurrencyReportController extends Controller
{
    protected $currencyAssetService;

    public function __construct(CurrencyAssetService $currencyAssetService)
    {
        $this->currencyAssetService = $currencyAssetService;
    }

    public function index()
    {
        $currencyReceipts = CurrencyReceipt::all();

        return response()->json($currencyReceipts);
    }

    public function assets()
    {
        return response()->json($this->currencyAssetService->getCurrencyAssets());
    }
}
