<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('divisions')->insert([
                ['name' => 'Wiring Harness Division', 'description' => 'Handles design and manufacturing of automotive wiring harness systems', 'created_at' => now(), 'updated_at' => now()],

                ['name' => 'Vision Systems Division', 'description' => 'Focuses on rearview mirrors, camera systems, and driver visibility solutions', 'created_at' => now(), 'updated_at' => now()],

                ['name' => 'Polymer & Modules Division', 'description' => 'Produces plastic components, dashboards, and exterior modules', 'created_at' => now(), 'updated_at' => now()],

                ['name' => 'Lighting Systems Division', 'description' => 'Develops and manufactures automotive lighting solutions', 'created_at' => now(), 'updated_at' => now()],

                ['name' => 'Metal & Precision Components Division', 'description' => 'Handles metal fabrication, machining, and structural components', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
