<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('divisions')->insert([
            ['name' => 'North Divison', 'description' => 'Handles northern region', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'South Divison', 'description' => 'Handles southern region', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Export Divison', 'description' => 'Handles exports globally', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}