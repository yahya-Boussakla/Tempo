<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupeTutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('groupe_tutor')->insert([
            ['groupe_id' => 1, 'tutor_id' => 1],
            ['groupe_id' => 1, 'tutor_id' => 2],
            ['groupe_id' => 2, 'tutor_id' => 3],
            ['groupe_id' => 3, 'tutor_id' => 4],
        ]);
    }
}
