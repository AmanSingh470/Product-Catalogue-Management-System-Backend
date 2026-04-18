<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'title' => 'iPhone 14',
                'description' => 'Apple smartphone',
                'category_id' => 1,
                'division_id' => 1,
                'segment_id' => 1,
                'company_id' => 1,
                'contact_person_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Paracetamol',
                'description' => 'Fever medicine',
                'category_id' => 2,
                'division_id' => 2,
                'segment_id' => 3,
                'company_id' => 2,
                'contact_person_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Shampoo',
                'description' => 'Hair care product',
                'category_id' => 3,
                'division_id' => 1,
                'segment_id' => 2,
                'company_id' => 3,
                'contact_person_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Drill Machine',
                'description' => 'Industrial tool',
                'category_id' => 4,
                'division_id' => 3,
                'segment_id' => 2,
                'company_id' => 4,
                'contact_person_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}