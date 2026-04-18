<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;
use App\Models\CompanyContactPerson;

class CompanyContactPersonFactory extends Factory
{
    protected $model = CompanyContactPerson::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'function' => fake()->jobTitle(),
            'company_id' => Company::query()->inRandomOrder()->value('id') 
                            ?? Company::factory(),
        ];
    }
}