<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DivisionMediaSeeder extends Seeder
{
    public function run(): void
    {

        $json                  = File::get(database_path('data/DivisionMedia.json'));
        $DivisionMedias = json_decode($json, true);
        $data                  = [];

        foreach ($DivisionMedias as $DivisionMedia) {
            $data[] = [
                'division_id'       => $DivisionMedia['division_id'],
                'image'      => $DivisionMedia['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('division_media')->insert($data);
    }
}
