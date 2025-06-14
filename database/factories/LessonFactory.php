<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    public function definition(): array
    {
        return [
            'validation_status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
