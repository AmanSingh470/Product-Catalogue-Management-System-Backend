<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductMediaSeeder extends Seeder
{
    public function run(): void
    {
        $json      = File::get(database_path('data/ProductMedia.json'));
        $ProductMedias = json_decode($json, true);
        $data      = [];

        foreach ($ProductMedias as $ProductMedia) {
            $data[] = [
                'product_id'        => $ProductMedia['product_id'],
                'image' => $ProductMedia['image'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
        }
    }
}
