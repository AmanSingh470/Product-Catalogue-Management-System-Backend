<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Product;

class FilterProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'all' => collect($this->all)->map(function ($division) {
                return [
                    'id' => $division->id,
                    'name' => $division->name,
                    'description' => $division->description,
                    'image' => $division->divisionMedia ? $division->divisionMedia->image : null,
                    'total_products' => Product::where('division_id', $division->id)->count()
                ];
            }),
            'categories' => collect($this->categories)->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'total_products' => Product::where('category_id', $category->id)->count()
                ];
            }),
            'segments' => collect($this->segments)->map(function ($segment) {
                return [
                    'id' => $segment->id,
                    'name' => $segment->name,
                    'total_products' => Product::where('segment_id', $segment->id)->count()
                ];
            }),
            'divisions' => collect($this->divisions)->map(function ($division) {
                return [
                    'id' => $division->id,
                    'name' => $division->name,
                    'total_products' => Product::where('division_id', $division->id)->count()
                ];
            }),
            'companies' => collect($this->companies)->map(function ($company) {
                return [
                    'id' => $company->id,
                    'name' => $company->name,
                    'total_products' => Product::where('company_id', $company->id)->count()
                ];
            }),
            'contactPersons' => collect($this->contactPersons)->map(function ($contactPerson) {
                return [
                    'id' => $contactPerson->id,
                    'name' => $contactPerson->name,
                    'total_products' => Product::where('contact_person_id', $contactPerson->id)->count()
                ];
            }),
        ];
    }
}