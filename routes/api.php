<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyReceiptController;
use App\Http\Controllers\CurrencyReportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/currency-receipts', [CurrencyReceiptController::class, 'store']);
Route::get('/currency-receipts', [CurrencyReportController::class, 'index']);
Route::get('/currency-assets', [CurrencyReportController::class, 'assets']);
