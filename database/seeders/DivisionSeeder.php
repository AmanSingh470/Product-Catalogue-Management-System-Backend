<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DivisionSeeder extends Seeder
{
    public function run(): void
    {
        $json           = File::get(database_path('data/Division.json'));
        $Divisions = json_decode($json, true);
        $data           = [];

        foreach ($Divisions as $Division) {
            $data[] = [
                'name' => $Division['name'],
                'description'       => $Division['description'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
        }
        DB::table('divisions')->insert($data);
    }
}
