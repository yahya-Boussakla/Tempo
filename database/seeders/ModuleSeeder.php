<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    public function run(): void
    {
       Module::factory()
            ->count(4)
            ->sequence(
                ['name' => 'Laravel Basics', 'code' => 'LAR101', 'hourly_volume' => 30, 'description' => 'Intro to Laravel', 'specialization_id' => 1],
                ['name' => 'React Native', 'code' => 'RN201', 'hourly_volume' => 40, 'description' => 'Mobile apps with React Native', 'specialization_id' => 2],
                ['name' => 'Vue.js', 'code' => 'VUE301', 'hourly_volume' => 25, 'description' => 'Frontend with Vue', 'specialization_id' => 1],
                ['name' => 'Flutter', 'code' => 'FLU401', 'hourly_volume' => 35, 'description' => 'Mobile apps with Flutter', 'specialization_id' => 2]
            )
            ->create();
    }
}