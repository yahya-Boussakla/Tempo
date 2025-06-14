<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => 'Group '.$this->faker->unique()->randomLetter(),
            'specialization_id' => \App\Models\Specialization::factory(),
            'year' => $this->faker->year(),
        ];
    }
}
