<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Specialization::factory()
            ->count(2)
            ->sequence(
                ['name' => 'Web Development', 'code' => 'WD101', 'description' => 'Web technologies'],
                ['name' => 'Mobile Development', 'code' => 'MD102', 'description' => 'Mobile apps']
            )
            ->create();
    }
}
