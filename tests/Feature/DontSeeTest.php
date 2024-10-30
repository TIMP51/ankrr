<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DontSeeTest extends TestCase
{
    /**
     * A basic test example.
     */
    use RefreshDatabase;
    public function test_user_dont_see_countries(): void
    {
        $response = $this->get('/countries');
        $response->assertFound();
    }
}
