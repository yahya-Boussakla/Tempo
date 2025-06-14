<?php

namespace Database\Seeders;

use App\Models\Timetable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
Timetable::factory()
            ->count(5)
            ->sequence(
                ['group_id' => 1, 'date_start' => '2025-06-01', 'date_end' => '2025-06-30'],
                ['group_id' => 2, 'date_start' => '2025-07-01', 'date_end' => '2025-07-30'],
                ['group_id' => 3, 'date_start' => '2025-05-15', 'date_end' => '2025-06-15'],
                ['group_id' => 1, 'date_start' => '2025-08-01', 'date_end' => '2025-08-31'],
                ['group_id' => 2, 'date_start' => '2025-09-01', 'date_end' => '2025-09-30'],
            )
            ->create();
    }
}
