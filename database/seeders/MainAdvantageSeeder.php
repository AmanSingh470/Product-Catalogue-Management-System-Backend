<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MainAdvantageSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/MainAdvantage.json'));
        $mainAdvantages = json_decode($json, true);

        $data = [];

        foreach ($mainAdvantages as $item) {
            $data[] = [
                'product_id' => $item['product_id'],
                'title' => $item['title'],
                'description' => $item['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('main_advantages')->insert($data);
    }
}