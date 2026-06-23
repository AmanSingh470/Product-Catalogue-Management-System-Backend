<?php
namespace App\Services\Admin;

use App\Models\Category;
use App\Models\Company;
use App\Models\CompanyContactPerson;
use App\Models\Division;
use App\Models\Product;
use App\Models\Segment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

class SearchService
{
    public function searchProducts($filters): SupportCollection
    {
        $products = Product::with([
            'category:id,name',
            'segment:id,name',
            'division:id,name',
            'company:id,name',
            'companyContactPerson:id,name',

            'productMedia' => function ($query) {
                $query->where('media_type', 'image')
                    ->select('id', 'product_id', 'media_url')
                    ->limit(1);
            },
        ])
            ->select([
                'id',
                'title',
                'description',
                'category_id',
                'segment_id',
                'division_id',
                'company_id',
                'contact_person_id',
                'status',
                'updated_at',
            ]);

        if (! empty($filters['search'])) {
            $search = '%' . $filters['search'] . '%';

            $products->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', $search)
                    ->orWhere('description', 'LIKE', $search);
            });
        }

        if (! empty($filters['category'])) {
            $products->where('category_id', $filters['category']);
        }

        if (! empty($filters['segment'])) {
            $products->where('segment_id', $filters['segment']);
        }

        if (! empty($filters['division'])) {
            $products->where('division_id', $filters['division']);
        }

        if (! empty($filters['company'])) {
            $products->where('company_id', $filters['company']);
        }

        if (! empty($filters['status'])) {
            $products->where('status', $filters['status']);
        }

        $products = $products->get();
        $products = $products->map(function ($product) {
            return [
                'id'                     => $product->id,
                'title'                  => $product->title,
                'description'            => $product->description,
                'category'               => $product->category,
                'segment'                => $product->segment,
                'division'               => $product->division,
                'company'                => $product->company,
                'company_contact_person' => $product->companyContactPerson,
                'status'                 => $product->status,
                'thumbnail'              => $product->productMedia->first()?->media_url,
                'updated_at'             => $product->updated_at->format('d/m/Y, g:i A'),
            ];
        });
        return $products;
    }

    public function searchCategories($filters): SupportCollection
    {
        $categories = Category::select('id', 'name', 'updated_at');

        if (! empty($filters['search'])) {
            $categories->where('name', 'LIKE', '%' . $filters['search'] . '%');
        }

        $categories = $categories->get();
        $categories = $categories->map(function ($category) {
            return [
                'id'         => $category->id,
                'name'       => $category->name,
                'updated_at' => $category->updated_at->format('d/m/Y, g:i A'),
            ];
        });
        return $categories;
    }

    public function searchSegments($filters): SupportCollection
    {
        $segments = Segment::select('id', 'name', 'updated_at');

        if (! empty($filters['search'])) {
            $segments->where('name', 'LIKE', '%' . $filters['search'] . '%');
        }

        $segments = $segments->get();
        $segments = $segments->map(function ($segment) {
            return [
                'id'         => $segment->id,
                'name'       => $segment->name,
                'updated_at' => $segment->updated_at->format('d/m/Y, g:i A'),
            ];
        });
        return $segments;
    }

    public function searchDivisions($filters): SupportCollection
    {
        $divisions = Division::select('id', 'name', 'description', 'updated_at');

        if (! empty($filters['search'])) {
            $divisions->where('name', 'LIKE', '%' . $filters['search'] . '%');
        }

        $divisions = $divisions->get();
        $divisions = $divisions->map(function ($division) {
            return [
                'id'          => $division->id,
                'name'        => $division->name,
                'description' => $division->description,
                'updated_at'  => $division->updated_at->format('d/m/Y, g:i A'),
            ];
        });
        return $divisions;
    }

    public function searchContactPersons($filters): SupportCollection
    {
        $contactPersons = CompanyContactPerson::with('company:id,name')
            ->select('id', 'name', 'email', 'function', 'company_id', 'updated_at');

        if (! empty($filters['search'])) {
            $contactPersons->where('name', 'LIKE', '%' . $filters['search'] . '%');
        }

        $contactPersons = $contactPersons->get();

        $contactPersons = $contactPersons->map(function ($person) {
            return [
                'id'         => $person->id,
                'name'       => $person->name,
                'email'      => $person->email,
                'function'   => $person->function,
                'company'    => $person->company?->name,
                'updated_at' => $person->updated_at->format('d/m/Y, g:i A'),
            ];
        });
        return $contactPersons;
    }

    public function searchCompanies($filters): SupportCollection
    {
        $companies = Company::select('id', 'name', 'updated_at');

        if (! empty($filters['search'])) {
            $companies->where('name', 'LIKE', '%' . $filters['search'] . '%');
        }

        $companies = $companies->get();
        $companies = $companies->map(function ($company) {
            return [
                'id'         => $company->id,
                'name'       => $company->name,
                'updated_at' => $company->updated_at->format('d/m/Y, g:i A'),
            ];
        });
        return $companies;
    }
}
