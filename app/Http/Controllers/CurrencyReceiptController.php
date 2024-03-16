<?php
// app/Http/Controllers/CurrencyReceiptController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CurrencyReceiptRepository;
use App\DTOs\CurrencyReceiptDTO;

class CurrencyReceiptController extends Controller
{
    protected $currencyReceiptRepository;

    public function __construct(CurrencyReceiptRepository $currencyReceiptRepository)
    {
        $this->currencyReceiptRepository = $currencyReceiptRepository;
    }

    public function store(Request $request)
    {
        $request->validate([
            'currency_type' => 'required',
            'amount' => 'required|numeric',
            'conversion_rate' => 'required|numeric',
        ]);

        $data = new CurrencyReceiptDTO(
            $request->currency_type,
            $request->amount,
            $request->conversion_rate
        );

        $receipt = $this->currencyReceiptRepository->create($data);

        return response()->json($receipt, 201);
    }
}
