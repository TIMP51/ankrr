<?php

namespace Tests\Feature;

use App\Models\Countries;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CountryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_country_create(): void
    {
        $country = Countries::factory()->create([ 'name' => 'Test country', ]);
        $this->assertEquals('Test country', $country->name);
    }
}
