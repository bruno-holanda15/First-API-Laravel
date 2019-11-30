<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Suppliers;

class SupplierTest extends TestCase
{
    public function testSupplierHas()
    {
        $response =  $this->assertDatabaseHas('suppliers', [
        'name' => 'Spotify'
    ]);
    }
    public function testSupplierMissing()
    {
        $response =  $this->assertDatabaseMissing('suppliers', [
        'name' => 'marcelo'
    ]);
    }
}
