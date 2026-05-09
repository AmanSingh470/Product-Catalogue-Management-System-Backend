<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class IntellectualPropertySeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/IntellectualProperty.json'));
        $properties = json_decode($json, true);

        $data = [];

        foreach ($properties as $item) {
            $data[] = [
                'product_id' => $item['product_id'],
                'description' => $item['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('intellectual_properties')->insert($data);
    }
}