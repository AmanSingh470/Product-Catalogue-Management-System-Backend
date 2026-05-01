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
        $limit = 32;

        $parseQuery = function ($queryString) {
            $result = [];

            foreach (explode('&', $queryString) as $pair) {
                if ($pair === '') {
                    continue;
                }

                [$key, $value] = array_pad(explode('=', $pair, 2), 2, '');

                $key   = urldecode($key);
                $value = urldecode($value);

                if ($key === '') {
                    continue;
                }

                $result[$key][] = $value;
            }

            return $result;
        };

        $parsed = $parseQuery($request->server->get('QUERY_STRING') ?? '');

        $filters = [
            'division' => $parsed['division'] ?? [],
            'category' => $parsed['category'] ?? [],
            'segment'  => $parsed['segment'] ?? [],
            'company'  => $parsed['company'] ?? [],
            'search'   => $request->query('search'),
        ];

        $products = $this->service->list($filters, $limit);

        return response()->json([
            'items'        => ProductResource::collection($products),
            'current_page' => $products->currentPage(),
            'hasMore'      => $products->hasMorePages(),
        ]);
    }
}
