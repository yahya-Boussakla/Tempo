<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ModuleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'code' => strtoupper($this->faker->bothify('MOD###')),
            'hourly_volume' => $this->faker->numberBetween(10, 60),
            'description' => $this->faker->sentence(),
            'specialization_id' => \App\Models\Specialization::factory(),
        ];
    }
}
