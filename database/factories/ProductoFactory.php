<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word, // Genera una palabra aleatoria
            'descripcion' => $this->faker->sentence, // Genera una frase aleatoria
            'precio' => $this->faker->randomFloat(2, 10, 1000), // Genera un número decimal entre 10 y 1000
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
