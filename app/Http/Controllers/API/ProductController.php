<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    // public function index()
    // {
    //     return ProductResource::collection(
    //         $this->service->list()
    //     );

    //     // // or
    //     // $products = $this->service->list();
    //     // return $products->map(function ($product) {
    //     //     return new ProductResource($product);
    //     // });
    // }
    
    public function index(Request $request)
    {
        $limit = $request->get('limit', 32);

        $products = $this->service->list($limit);

        return response()->json([
            'items'        => ProductResource::collection($products),
            'current_page' => $products->currentPage(),
            'hasMore'      => $products->hasMorePages(),
        ]);
    }

    public function store(Request $request)
    {
        return new ProductResource(
            $this->service->store($request->all())
        );
    }

    public function show($id)
    {
        return new ProductResource(
            $this->service->show($id)
        );
    }

    public function update(Request $request, $id)
    {
        return new ProductResource(
            $this->service->update($id, $request->all())
        );
    }

    public function destroy($id)
    {
        $this->service->delete($id);

        return response()->json([
            'status'  => true,
            'message' => 'Deleted successfully',
        ]);
    }
}
