<?php

namespace Tests\Unit;

use App\Models\Countries;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    use RefreshDatabase;
    public function test_that_true_is_true(): void
    {       
            $this->assertTrue(true);;
    }
}
