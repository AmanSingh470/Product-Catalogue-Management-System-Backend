<?php

namespace App\Repositories;

use App\Models\Division;
use App\Models\Category;
use App\Models\Segment;
use App\Models\Company;
use App\Models\CompanyContactPerson;

use Illuminate\Support\Facades\Log;

class FilterProductRepository
{
    public function getAll()
    {
        $temp = Division::with('divisionMedia')
                                ->withCount(['products as total_products'])
                                ->select('id', 'name', 'description')
                                ->get();
        $res = [
            'all'            => Division::with('divisionMedia')
                                ->select('id', 'name', 'description')
                                ->get(),
            'categories'     => Category::select('id', 'name')->get(),
            'segments'       => Segment::select('id', 'name')->get(),
            'divisions'      => Division::select('id', 'name')->get(),
            'companies'      => Company::select('id', 'name')->get(),
            'contactPersons' => CompanyContactPerson::select('id', 'name')->get(),
        ];
        Log::info($temp);
        return $res;
    }
}