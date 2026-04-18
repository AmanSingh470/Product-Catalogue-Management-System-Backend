<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('companies')->insert([
                ['name' => 'Maruti Suzuki', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Tata Motors', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Mahindra & Mahindra', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Hyundai Motors', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Honda Cars', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Toyota Kirloskar', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Ashok Leyland', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Bajaj Auto', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
