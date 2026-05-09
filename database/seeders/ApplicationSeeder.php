<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ApplicationSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/Application.json'));
        $applications = json_decode($json, true);

        $data = [];

        foreach ($applications as $item) {
            $data[] = [
                'product_id' => $item['product_id'],
                'description' => $item['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('applications')->insert($data);
    }
}