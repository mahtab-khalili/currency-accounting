<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\CurrencyReceipt;

class CurrencyReceiptControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test storing a currency receipt.
     *
     * @return void
     */
    public function testStoreCurrencyReceipt()
    {
        $response = $this->postJson('/api/currency-receipts', [
            'currency_type' => 'USD',
            'amount' => 1000,
            'conversion_rate' => 500000,
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'currency_type',
                'amount',
                'conversion_rate',
                'created_at',
                'updated_at'
            ]);

        // Assert that the currency receipt was stored in the database
        $this->assertDatabaseHas('currency_receipts', [
            'currency_type' => 'USD',
            'amount' => 1000,
            'conversion_rate' => 500000,
        ]);
    }
}
