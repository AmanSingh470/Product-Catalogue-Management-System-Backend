<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SegmentSeeder extends Seeder
{
    public function run(): void
    {
        $json     = File::get(database_path('data/Segment.json'));
        $Segments = json_decode($json, true);
        $data     = [];

        foreach ($Segments as $Segment) {
            $data[] = [
                'name'             => $Segment['name'],
                'created_at'        => now(),
                'updated_at'        => now(),
            ];
        }
        DB::table('segments')->insert($data);
    }
}
