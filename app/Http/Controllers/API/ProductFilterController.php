<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\CompanyContactPerson;
use App\Models\Division;
use App\Models\Segment;

class ProductFilterController extends Controller
{
    public function index()
    {
        return response()->json([
            'all' => Division::select('id', 'name','description')->get(),
            'categories' => Category::select('id', 'name')->get(),
            'segments' => Segment::select('id', 'name')->get(),
            'divisions' => Division::select('id', 'name')->get(),
            'companies' => Company::select('id', 'name')->get(),
            'contactPersons' => CompanyContactPerson::select('id', 'name')->get()
        ]);
    }
}