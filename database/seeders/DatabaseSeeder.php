<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            DivisionSeeder::class,
            SegmentSeeder::class,
            CompanySeeder::class,
            CompanyContactPersonSeeder::class,
            ProductSeeder::class,
            ProductMediaSeeder::class,
        ]);
    }
}

// use App\Models\Category;
// use App\Models\Company;
// use App\Models\CompanyContactPerson;
// use App\Models\Division;
// use App\Models\Product;
// // use App\Models\ProductMedia;
// use App\Models\Segment;

// class DatabaseSeeder extends Seeder
// {
//     public function run(): void
//     {
//         // Step 1: Base tables
//         Company::factory(20)->create();
//         Division::factory(20)->create();
//         Segment::factory(20)->create();
//         Category::factory(20)->create();

//         // Step 2: Dependent tables
//         CompanyContactPerson::factory(30)->create();

//         // Step 3: Products
//         Product::factory(50)->create();

//         // Step 4: Media
//         // ProductMedia::factory(50)->create();
//     }

// }
