<?php
namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Models\ProductRequests;
use App\Http\Controllers\Controller;
class ProductRequestFormController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'category_id' => 'required|integer|exists:categories,id',
            'company_id' => 'required|integer|exists:companies,id',
            'division_id' => 'required|integer|exists:divisions,id',
            'segment_id' => 'required|integer|exists:segments,id',
            'description' => 'nullable|string',
        ]);        

        $product = ProductRequests::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully'
        ], 201);
    }
}