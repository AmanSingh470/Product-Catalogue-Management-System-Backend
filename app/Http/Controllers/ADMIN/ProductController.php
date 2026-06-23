<?php
namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use App\Services\admin\ProductService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function ProductData()
    {
        $productStats   = $this->service->getProductStats();
        $products       = $this->service->getProducts();
        $filters        = $this->service->getFilters();
        $companies      = $this->service->getCompanies();
        $contactPersons = $this->service->getContactPersons();

        return view('admin.product.index', [
            'username'       => 'Aman',
            'stats'          => $productStats,
            'products'       => $products,
            'filters'        => $filters,
            'companies'      => $companies,
            'contactPersons' => $contactPersons,
        ]);
    }

    public function createProduct()
    {
        $validator = Validator::make(request()->all(), [
            'title'                     => ['required', 'string', 'max:255'],
            'description'               => ['required', 'string'],
            'category_id'               => ['required', 'integer', 'exists:categories,id'],
            'segment_id'                => ['required', 'integer', 'exists:segments,id'],
            'division_id'               => ['required', 'integer', 'exists:divisions,id'],
            'company_id'                => ['required', 'integer', 'exists:companies,id'],
            'contact_person_id'         => ['required', 'integer', 'exists:company_contact_persons,id'],
            'status'                    => ['required', 'in:1,2,3,4'],
            'main_advantages'           => ['nullable', 'array'],
            'main_advantages.*'         => ['string', 'max:255'],
            'key_facts'                 => ['nullable', 'array'],
            'key_facts.*'               => ['string', 'max:255'],
            'intellectual_properties'   => ['nullable', 'array'],
            'intellectual_properties.*' => ['string', 'max:255'],
            'applications'              => ['nullable', 'array'],
            'applications.*'            => ['string', 'max:255'],
            'media'                     => ['nullable', 'array', 'max:10'],
            'media.*'                   => [
                'file',
                'mimes:png,jpg,jpeg,webp,mp4,pdf',
                'max:51200',
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        try {
            Log::info("controller call going");
            $data = $validator->validated();
            Log::info("data:", $data);

            $product = $this->service->createProductWithMedia($data, request()->file('media', []));

            return response()->json([
                'message' => 'Product created successfully.',
                'data'    => $product,
            ], 201);

        } catch (Throwable $th) {

            Log::error('Product creation failed', [
                'message' => $th->getMessage(),
                'file'    => $th->getFile(),
                'line'    => $th->getLine(),
            ]);

            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function productDetailPage()
    {
        $id             = request()->route('id');
        $productDetails = $this->service->getProductDetails($id);
        $filters        = $this->service->getFilters();
        $companies      = $this->service->getCompanies();
        $categories     = $this->service->getCategories();
        $segments       = $this->service->getSegments();
        $divisions      = $this->service->getDivisions();
        $contactPersons = $this->service->getContactPersons();
        $productMedia   = $this->service->getProductMedia($id);

        return view('admin.product.detail', [
            'product'        => $productDetails,
            'filters'        => $filters,
            'companies'      => $companies,
            'categories'     => $categories,
            'segments'       => $segments,
            'divisions'      => $divisions,
            'contactPersons' => $contactPersons,
            'productMedia'   => $productMedia
        ]);
    }
    
    public function getSingleProduct(){
        $id             = request()->route('id');
        $productDetails = $this->service->getProductDetails($id);
        return $productDetails;
    }
}
