<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        {
            // usuario y autth
            $user = User::factory()->create();
    
            $productData = [
                'nombre' => 'Producto de prueba',
                'descripcion' => 'Descripción del producto',
                'precio' => 99.99,
            ];
    
            $response = $this->actingAs($user, 'sanctum')
                             ->postJson('/api/products', $productData);
    
            $response->assertStatus(201)
                     ->assertJson([
                         'nombre' => 'Producto de prueba',
                         'descripcion' => 'Descripción del producto',
                         'precio' => 99.99,
                     ]);
    
            $this->assertDatabaseHas('productos', $productData);
        }
    }
}
