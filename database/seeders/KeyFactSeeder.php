<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KeyFactSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/KeyFact.json'));
        $keyFacts = json_decode($json, true);

        $data = [];

        foreach ($keyFacts as $item) {
            $data[] = [
                'product_id' => $item['product_id'],
                'description' => $item['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('key_facts')->insert($data);
    }
}