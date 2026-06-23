<?php
namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use App\Services\admin\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $service;

    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $filters = [
            'division' => $request->query('division') ?? '',
            'category' => $request->query('category') ?? '',
            'segment'  => $request->query('segment') ?? '',
            'company'  => $request->query('company') ?? '',
            'status'   => $request->query('status') ?? '',
            'search'   => $request->query('search') ?? '',
        ];

        $type = $request->query('type') ?? '';
        switch ($type) {
            case 'product':
                $products = $this->service
                    ->searchProducts($filters);

                return view(
                    'admin.product.partials.table',
                    ['products' => $products]
                )->render();

            case 'category':
                $categories = $this->service
                    ->searchCategories($filters);

                return view(
                    'admin.category.partials.table',
                    ['categories' => $categories]
                )->render();

            case 'segment':
                $segments = $this->service
                    ->searchSegments($filters);

                return view(
                    'admin.segment.partials.table',
                    ['segments' => $segments]
                )->render();

            case 'division':
                $divisions = $this->service
                    ->searchDivisions($filters);

                return view(
                    'admin.division.partials.table',
                    ['divisions' => $divisions]
                )->render();

            case 'contactpersons':
                $contactPersons = $this->service
                    ->searchContactPersons($filters);

                return view(
                    'admin.company_contact_person.partials.table',
                    ['contactPersons' => $contactPersons]
                )->render();

            case 'company':
                 $companies = $this->service
                    ->searchCompanies($filters);

                return view(
                    'admin.company.partials.table',
                    ['companies' => $companies]
                )->render();

            default:
                return response()->json([
                    'message' => 'Invalid search type',
                    'type' => $type
                ], 400);
        }
    }
}
