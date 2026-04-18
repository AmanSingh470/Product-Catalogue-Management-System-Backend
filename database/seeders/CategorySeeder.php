<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Electronics', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pharmaceuticals', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'FMCG', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Industrial', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}