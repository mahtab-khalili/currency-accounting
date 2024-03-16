<?php


namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\CurrencyReceipt;

class CurrencyReportControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test retrieving currency receipts.
     *
     * @return void
     */
    public function testRetrieveCurrencyReceipts()
    {
        // Create sample currency receipts for testing
        CurrencyReceipt::factory()->count(3)->create();

        // Send a GET request to the endpoint
        $response = $this->get('/api/currency-receipts');

        // Assert that the response is successful (HTTP status code 200)
        $response->assertStatus(200);

        // Assert that the response contains the correct structure (JSON)
        $response->assertJsonStructure([
            '*' => [
                'id',
                'currency_type',
                'amount',
                'conversion_rate',
                'created_at',
                'updated_at'
            ]
        ]);

        // Assert that the correct number of currency receipts is returned
        $response->assertJsonCount(3);
    }
}
