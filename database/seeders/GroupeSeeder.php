<?php

namespace Database\Seeders;

use App\Models\Groupe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Groupe::factory()
            ->count(3)
            ->sequence(
                ['name' => 'Group A', 'specialization_id' => 1, 'year' => 2025],
                ['name' => 'Group B', 'specialization_id' => 2, 'year' => 2025],
                ['name' => 'Group C', 'specialization_id' => 1, 'year' => 2024]
            )
            ->create();
    }
}
