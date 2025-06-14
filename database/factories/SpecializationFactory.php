<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SpecializationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Web Development', 'Mobile Development']),
            'code' => strtoupper($this->faker->bothify('??###')),
            'description' => $this->faker->sentence(),
        ];
    }
}