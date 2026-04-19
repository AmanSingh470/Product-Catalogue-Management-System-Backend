<?php
namespace App\Services;

use App\Repositories\FilterProductRepository;

class FilterProductService
{
    protected $repo;

    public function __construct(FilterProductRepository $repo)
    {
        $this->repo = $repo;
    }

    public function list()
    {
        return $this->repo->getAll();
    }
}