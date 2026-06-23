<?php

namespace App\Services\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Segment;
use App\Models\Division;
use Illuminate\Database\Eloquent\Collection;

class DashboardService
{
    public function getDashboardStats(): array
    {
        return [
            'totalProducts' => Product::count(),
            'totalCategories' => Category::count(),
            'totalSegments' => Segment::count(),
            'totalDivisions' => Division::count(),
        ];
    }
    
    public function getRecentProducts(): Collection
    {
        return Product::with('category')
            ->latest()
            ->take(4)
            ->get([
                'id',
                'title',
                'category_id',
                'created_at'
            ]);
    }
}