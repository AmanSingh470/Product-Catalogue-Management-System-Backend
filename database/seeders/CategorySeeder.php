<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Electrical & Electronics', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Interior & Exterior Systems', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Powertrain & Drivetrain', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Structural & Metal Components', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Aftermarket & Services', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
