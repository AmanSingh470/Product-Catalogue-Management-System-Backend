<?php
namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use App\Services\admin\CategoryService;
use Illuminate\Support\Facades\Validator;
use Throwable;

class CategoryController extends Controller
{
    protected $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function CategoryData()
    {
        $stats      = $this->service->getCategoriesStats();
        $categories = $this->service->getCategories();

        return view('admin.category.index', [
            'username'   => 'Aman',
            'stats'      => $stats,
            'categories' => $categories,
        ]);
    }

    public function createCategory()
    {
        $validator = Validator::make(request()->all(), [
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        try {
            $category = $this->service->createCategory($data);

            return response()->json([
                'message' => 'Category created successfully.',
                'data'    => $category,
            ], 201);

        } catch (Throwable $th) {

            return response()->json([
                'message' => 'Some error occurred.',
            ], 500);
        }
    }

    public function getSingleCategory()
    {
        $id       = request()->route('id');
        $category = $this->service->getSingleCategory($id);
        return $category;
    }

    public function updateCategory()
    {
        $id        = request()->route('id');
        $validator = Validator::make(request()->all(), [
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        try {
            $category = $this->service->editCategory($id, $data);

            return response()->json([
                'message' => 'Category edited successfully.',
                'data'    => $category,
            ], 201);

        } catch (Throwable $th) {

            return response()->json([
                'message' => 'Some error occurred.',
            ], 500);
        }
    }

    public function deleteCategory()
    {
        $id = request()->route('id');

        try {

            $this->service->deleteCategory($id);

            return response()->json([
                'message' => 'Category deleted successfully.',
            ], 200);

        } catch (Throwable $th) {

            return response()->json([
                'message' => 'Some error occurred.',
            ], 500);
        }
    }
}
