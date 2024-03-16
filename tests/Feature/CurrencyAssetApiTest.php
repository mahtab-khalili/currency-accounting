<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\CurrencyAsset;

class CurrencyAssetApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test retrieving currency assets.
     *
     * @return void
     */
    public function testRetrieveCurrencyAssets()
    {
        // Create sample currency assets for testing
        CurrencyAsset::factory()->count(3)->create();

        // Send a GET request to the endpoint
        $response = $this->get('/api/currency-assets');

        // Assert that the response is successful (HTTP status code 200)
        $response->assertStatus(200);

        // Assert that the response contains the correct structure (JSON)
        $response->assertJsonStructure([
            '*' => [
                'id',
                'currency_type',
                'balance',
                'weighted_conversion_rate',
                'created_at',
                'updated_at'
            ]
        ]);

        // Assert that the correct number of currency assets is returned
        $response->assertJsonCount(3);
    }
}
