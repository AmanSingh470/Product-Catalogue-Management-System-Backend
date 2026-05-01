<?php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    // public function getAll($limit = 10)
    // {
    //     return Product::with([
    //         'category',
    //         'segment',
    //         'division',
    //         'company',
    //         'companyContactPerson',
    //         'productMedia',
    //     ])->paginate($limit);
    // }

    public function paginate($filters = [], $limit)
    {
        $query = Product::with([
            'category',
            'segment',
            'division',
            'company',
            'companyContactPerson',
            'productMedia',
        ]);

        if (! empty($filters['division'])) {
            $query->whereIn('division_id', $filters['division']);
        }

        if (! empty($filters['company'])) {
            $query->whereIn('company_id', $filters['company']);
        }

        if (! empty($filters['segment'])) {
            $query->whereIn('segment_id', $filters['segment']);
        }

        if (! empty($filters['search'])) {
            $query->where('title', 'like', '%' . $filters['search'] . '%');
        }

        return $query->paginate($limit);
    }

    public function findById($id)
    {
        return Product::findOrFail($id);
    }

    public function create($data)
    {
        return Product::create($data);
    }

    public function update($product, $data)
    {
        $product->update($data);
        return $product;
    }

    public function delete($product)
    {
        return $product->delete();
    }
}
