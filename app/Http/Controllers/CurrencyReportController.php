<?php

namespace App\Http\Controllers;

use App\Models\CurrencyReceipt;
use Illuminate\Http\Request;

class CurrencyReportController extends Controller
{
    public function index()
    {
        $currencyReceipts = CurrencyReceipt::all();

        return response()->json($currencyReceipts);
    }
}
