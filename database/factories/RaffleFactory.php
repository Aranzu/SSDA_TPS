<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Raffle>
 */
class RaffleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => '1',
            'rut' => fake()->numberBetween(1111111,9999999),
            'name' => fake()->name(),
            'cargo' => fake()->jobTitle(),
        ];
    }
}
