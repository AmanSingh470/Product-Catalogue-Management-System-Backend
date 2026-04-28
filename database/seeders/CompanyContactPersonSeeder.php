<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CompanyContactPersonSeeder extends Seeder
{
    public function run(): void
    {
        $json       = File::get(database_path('data/CompanyContactPerson.json'));
        $CompanyContactPersons = json_decode($json, true);
        $data       = [];

        foreach ($CompanyContactPersons as $CompanyContactPerson) {
            $data[] = [
                'name'       => $CompanyContactPerson['name'],
                'email'      => $CompanyContactPerson['email'],
                'function'   => $CompanyContactPerson['function'],
                'company_id' => $CompanyContactPerson['company_id'],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('company_contact_persons')->insert($data);
    }
}
