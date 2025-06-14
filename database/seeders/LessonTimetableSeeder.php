<?php

namespace Database\Seeders;

use App\Models\LessonTimetable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonTimetableSeeder extends Seeder
{
    public function run(): void
    {
        LessonTimetable::factory()
            ->count(10)
            ->sequence(
                fn ($seq) => [
                    'lesson_id' => $seq->index + 1,
                    'timetable_id' => ($seq->index % 5) + 1,
                    'tutor_id' => ($seq->index % 5) + 1,
                    'module_id' => ($seq->index % 4) + 1,
                    'salle_id' => ($seq->index % 3) + 1,
                    'time_start' => now()->addHours($seq->index + 8)->format('H:i:s'),
                    'time_end' => now()->addHours($seq->index + 10)->format('H:i:s'),
                    'week_day' => fake()->randomElement([
                        'Monday', 'Tuesday', 'Wednesday', 'Thursday', 
                        'Friday', 'Saturday', 'Sunday'
                    ]),
                ]
            )
            ->create();
    }
}
