<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CompanyContactPersonSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('company_contact_persons')->insert([
            [
                'name' => 'Aman Singh',
                'email' => 'aman@mail.com',
                'function' => 'Manager',
                'company_id' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Rohit Sharma',
                'email' => 'rohit@mail.com',
                'function' => 'Sales',
                'company_id' => 2,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Neha Verma',
                'email' => 'neha@mail.com',
                'function' => 'HR',
                'company_id' => 3,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Priya Kapoor',
                'email' => 'priya@mail.com',
                'function' => 'Admin',
                'company_id' => 4,
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);
    }
}