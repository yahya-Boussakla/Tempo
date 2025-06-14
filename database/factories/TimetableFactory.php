<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TimetableFactory extends Factory
{
    public function definition(): array
    {
        return [
            'group_id' => \App\Models\Groupe::factory(),
            'date_start' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'date_end' => $this->faker->dateTimeBetween('+1 month', '+3 months'),
        ];
    }
}
