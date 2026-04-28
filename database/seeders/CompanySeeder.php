<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CompanySeeder extends Seeder
{
    public function run(): void
    {

        $json                  = File::get(database_path('data/Company.json'));
        $companies = json_decode($json, true);
        $data                  = [];

        foreach ($companies as $company) {
            $data[] = [
                'name'       => $company['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('companies')->insert($data);
    }
}
