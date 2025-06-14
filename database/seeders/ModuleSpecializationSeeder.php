<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('module_specialization')->insert([
            ['module_id' => 1, 'specialization_id' => 1],
            ['module_id' => 2, 'specialization_id' => 1],
            ['module_id' => 3, 'specialization_id' => 2],
            ['module_id' => 4, 'specialization_id' => 2],
        ]);
    }
}
