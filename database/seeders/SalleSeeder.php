<?php

namespace Database\Seeders;

use App\Models\Salle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Salle::factory()
            ->count(3)
            ->sequence(
                ['name' => 'Room 101', 'capacity' => 30, 'location' => 'Block A'],
                ['name' => 'Room 102', 'capacity' => 20, 'location' => 'Block B'],
                ['name' => 'Room 103', 'capacity' => 25, 'location' => 'Block C']
            )
            ->create();
    }
}
