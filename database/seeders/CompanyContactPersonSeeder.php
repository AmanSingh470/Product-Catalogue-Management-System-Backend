<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyContactPersonSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('company_contact_persons')->insert([
            [
                'name'       => 'Aman Singh',
                'email'      => 'aman@mail.com',
                'function'   => 'Manager',
                'company_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'Rohit Sharma',
                'email'      => 'rohit@mail.com',
                'function'   => 'Sales',
                'company_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'Neha Verma',
                'email'      => 'neha@mail.com',
                'function'   => 'HR',
                'company_id' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'Priya Kapoor',
                'email'      => 'priya@mail.com',
                'function'   => 'Admin',
                'company_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'Arjun Mehta',
                'email'      => 'arjun@mail.com',
                'function'   => 'Operations',
                'company_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'Sneha Iyer',
                'email'      => 'sneha@mail.com',
                'function'   => 'Finance',
                'company_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'Karan Malhotra',
                'email'      => 'karan@mail.com',
                'function'   => 'Marketing',
                'company_id' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'Pooja Sharma',
                'email'      => 'pooja@mail.com',
                'function'   => 'Support',
                'company_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'Rahul Gupta',
                'email'      => 'rahul@mail.com',
                'function'   => 'IT',
                'company_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'Anjali Desai',
                'email'      => 'anjali@mail.com',
                'function'   => 'Legal',
                'company_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
