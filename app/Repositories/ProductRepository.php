<?php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getAll($limit = 10)
    {
        return Product::with([
            'category',
            'segment',
            'division',
            'company',
            'companyContactPerson',
            'productMedia',
        ])->paginate($limit);
    }

    public function paginate($limit = 10)
    {
        return Product::with([
            'category',
            'segment',
            'division',
            'company',
            'companyContactPerson',
            'productMedia',
        ])->paginate($limit);
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
