<?php
namespace App\Services\Admin;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection as SupportCollection;

class CategoryService
{
    public function getCategoriesStats(): array
    {
        return [
            'totalCategories' => Category::count(),
        ];
    }

    public function getCategories(): SupportCollection
    {
        return Category::select('id', 'name', 'updated_at')
            ->get()
            ->map(function ($category) {
                return [
                    'id'         => $category->id,
                    'name'       => $category->name,
                    'updated_at' => $category->updated_at->format('d/m/Y, g:i A'),
                ];
            });
    }

    public function createCategory($data): Category
    {
        return Category::create([
            'name' => $data['name'],
        ]);
    }

    public function getSingleCategory($id): JsonResponse
    {
        $category = Category::select(
            'id',
            'name',
            'created_at',
            'updated_at'
        )
            ->where('id', $id)
            ->firstOrFail();

        return response()->json([
            'id'         => $category->id,
            'name'       => $category->name,
            'created_at' => $category->created_at->format('d/m/Y, g:i A'),
            'updated_at' => $category->updated_at->format('d/m/Y, g:i A'),
        ]);
    }

    public function editCategory($id, $data): Category
    {
        $category = Category::where('id', $id)
            ->firstOrFail();

        $category->update([
            'name' => $data['name'],
        ]);

        return $category->fresh();
    }

    public function deleteCategory($id): void
    {
        Category::where('id', $id)
            ->firstOrFail()
            ->delete();
    }
}
