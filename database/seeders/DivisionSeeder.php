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
        DB::table('divisions')->insert([
            ['name' => 'Wiring Harness Division', 'description' => 'Handles design and manufacturing of automotive wiring harness systems', 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Vision Systems Division', 'description' => 'Focuses on rearview mirrors, camera systems, and driver visibility solutions', 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Polymer & Modules Division', 'description' => 'Produces plastic components, dashboards, and exterior modules', 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Lighting Systems Division', 'description' => 'Develops and manufactures automotive lighting solutions', 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Metal & Precision Components Division', 'description' => 'Handles metal fabrication, machining, and structural components', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
