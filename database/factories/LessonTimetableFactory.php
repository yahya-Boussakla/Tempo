<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Module;
use App\Models\Salle;
use App\Models\Timetable;
use App\Models\Tutor;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonTimetableFactory extends Factory
{
    public function definition(): array
    {
        return [
            'lesson_id' => Lesson::factory(),
            'timetable_id' => Timetable::factory(),
            'tutor_id' => Tutor::factory(),
            'module_id' => Module::factory(),
            'salle_id' => Salle::factory(),
            'week_day' => $this->faker->randomElement([
                'Monday', 'Tuesday', 'Wednesday', 'Thursday', 
                'Friday', 'Saturday', 'Sunday'
            ]),
            'time_start' => $this->faker->time('H:i:s'),
            'time_end' => $this->faker->time('H:i:s'),
        ];
    }
}
