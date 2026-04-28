<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $json     = File::get(database_path('data/Product.json'));
        $Products = json_decode($json, true);
        $data     = [];

        foreach ($Products as $Product) {
            $data[] = [
                'title'             => $Product['title'],
                'description'       => $Product['description'],
                'category_id'       => $Product['category_id'],
                'division_id'       => $Product['division_id'],
                'segment_id'        => $Product['segment_id'],
                'company_id'        => $Product['company_id'],
                'contact_person_id' => $Product['contact_person_id'],
                'created_at'        => now(),
                'updated_at'        => now(),
            ];
        }

        DB::table('products')->insert($data);
    }
}
