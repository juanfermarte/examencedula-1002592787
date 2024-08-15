<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Winners>
 */
class WinnersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'cedula' => $this->faker->number(100,10000),
            'telefono' => $this->faker->number(100,10000),
            'correo' => $this->faker->name(),
        ];
    }
}
