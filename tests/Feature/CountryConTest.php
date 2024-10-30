<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CountryConTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_country_seeder(): void
    {
        $this->seed();
        $this->assertDatabaseCount('countries',6);
    }
}
