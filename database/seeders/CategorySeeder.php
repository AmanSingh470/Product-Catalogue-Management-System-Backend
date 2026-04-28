<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $json      = File::get(database_path('data/Category.json'));
        $categories = json_decode($json, true);
        $data = [];

        foreach ($categories as $category) {
            $data[] = [
                'name'       => $category['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('categories')->insert($data);
    }
}
