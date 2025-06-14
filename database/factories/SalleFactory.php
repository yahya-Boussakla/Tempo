<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SalleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => 'Room ' . $this->faker->numberBetween(100, 999),
            'capacity' => $this->faker->numberBetween(20, 50),
            'location' => $this->faker->city(),
        ];
    }
}
