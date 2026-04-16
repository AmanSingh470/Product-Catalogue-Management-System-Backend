<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\CompanyContactPerson;
use App\Models\Divison;
use App\Models\Segment;

class ProductFilterController extends Controller
{
    public function index()
    {
        return response()->json([
            'all' => Divison::select('id', 'name')->get(),
            'categories' => Category::select('id', 'name')->get(),
            'segments' => Segment::select('id', 'name')->get(),
            'divisons' => Divison::select('id', 'name')->get(),
            'companies' => Company::select('id', 'name')->get(),
            'contactPersons' => CompanyContactPerson::select('id', 'name')->get(),
            'count' => [
                'divison' => Divison::has('products')->count(),
                'company'  => Company::has('products')->count(),
                'segment'  => Segment::has('products')->count(),
                'category' => Category::has('products')->count(),
            ]
        ]);
    }
}