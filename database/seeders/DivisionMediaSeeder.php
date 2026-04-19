<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionMediaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('division_media')->insert([
                ['division_id' => 1, 'image' => '1_Wiring_Harness_Division.png', 'created_at' => now(), 'updated_at' => now()],
                ['division_id' => 2, 'image' => '2_Vision_Sytem_Division.png', 'created_at' => now(), 'updated_at' => now()],
                ['division_id' => 3, 'image' => '3_Polymer_And_Modulus_Division.png', 'created_at' => now(), 'updated_at' => now()],
                ['division_id' => 4, 'image' => '4_Lighting_System_Division.png', 'created_at' => now(), 'updated_at' => now()],
                ['division_id' => 5, 'image' => '5_Metal_And_Precision_Division.png', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}