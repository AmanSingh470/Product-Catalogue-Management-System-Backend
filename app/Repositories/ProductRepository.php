<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getAllProducts($filters, $limit)
    {
        $query = Product::with([
            'segment:id,name',
            'division:id,name',
            'company:id,name',
            'productMedia:id,product_id,image',
        ])->select('id', 'title', 'segment_id', 'division_id', 'company_id');

        if (! empty($filters['division'])) {
            $query = $query->whereIn('division_id', $filters['division']);
        }

        if (! empty($filters['company'])) {
            $query = $query->whereIn('company_id', $filters['company']);
        }

        if (! empty($filters['segment'])) {
            $query = $query->whereIn('segment_id', $filters['segment']);
        }

        if (! empty($filters['search'])) {
            $query = $query->where('title', 'like', '%' . $filters['search'] . '%');
        }
        return $query->paginate($limit);
    }

    public function getProductById($id)
    {
        return Product::with([
            'category',
            'segment',
            'division',
            'company',
            'companyContactPerson',
            'productMedia',
        ])->findOrFail($id);
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
