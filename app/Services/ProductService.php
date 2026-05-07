<?php
namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $repo;

    public function __construct(ProductRepository $repo)
    {
        $this->repo = $repo;
    }

    public function list($filters, $limit)
    {
        return $this->repo->getAllProducts($filters, $limit);
    }

    public function show($id)
    {
        return $this->repo->getProductById($id);
    }
    
    // public function store($data)
    // {
    //     return $this->repo->create($data);
    // }

    // public function update($id, $data)
    // {
    //     $product = $this->repo->findById($id);
    //     return $this->repo->update($product, $data);
    // }

    // public function delete($id)
    // {
    //     $product = $this->repo->findById($id);
    //     return $this->repo->delete($product);
    // }
}