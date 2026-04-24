<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Premium', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mid-Range', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Budget', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Luxury', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Economy', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Commercial', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Heavy-Duty', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
