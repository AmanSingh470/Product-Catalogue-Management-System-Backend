<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\FilterProductService;
use App\Http\Resources\FilterProductResource;

class FilterProductController extends Controller
{
    protected $service;

    public function __construct(FilterProductService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return new FilterProductResource(
            (object) $this->service->list()
        );
    }
}
