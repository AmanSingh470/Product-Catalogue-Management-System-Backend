<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Company;
use App\Models\Category;
use App\Models\Segment;
use App\Models\Division;
use App\Models\CompanyContactPerson;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'description' => fake()->paragraph(),

            'category_id' => Category::query()->inRandomOrder()->value('id') ?? Category::factory(),
            'segment_id' => Segment::query()->inRandomOrder()->value('id') ?? Segment::factory(),
            'division_id' => Division::query()->inRandomOrder()->value('id') ?? Division::factory(),
            'company_id' => Company::query()->inRandomOrder()->value('id') ?? Company::factory(),
            'contact_person_id' => CompanyContactPerson::query()->inRandomOrder()->value('id') ?? CompanyContactPerson::factory(),

            'main_advantages' => fake()->sentence(),
            'key_facts' => fake()->sentence(),
            'applications' => fake()->sentence(),

            'status' => fake()->randomElement(['active','inactive']),
        ];
    }
}