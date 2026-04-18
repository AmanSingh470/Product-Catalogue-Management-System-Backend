<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('companies')->insert([
            ['name' => 'Tata', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Reliance', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Infosys', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Wipro', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}