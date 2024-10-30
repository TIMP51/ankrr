<?php


use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeeCanTest extends TestCase
{
    /**
     * A basic test example.
     */
    use RefreshDatabase;
    public function test_user_see_animation(): void
    {
        $response = $this->get('/');
        $response->assertOk();
    }
}
