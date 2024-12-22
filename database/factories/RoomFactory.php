<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    public function definition(): array
    {
        return [
            'roomId' => Str::uuid()->toString(),
            'name' => $this->faker->unique()->word(),
            'type' => $this->faker->randomElement(['Single', 'Double', 'Suite']),
            'price' => $this->faker->randomFloat(2, 50, 500),
        ];
    }
}
