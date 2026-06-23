<?php
namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use App\Services\admin\DivisionService;
use Illuminate\Support\Facades\Validator;
use Throwable;

class DivisionController extends Controller
{
    protected $service;

    public function __construct(DivisionService $service)
    {
        $this->service = $service;
    }

    public function DivisionData()
    {
        $stats     = $this->service->getDivisionsStats();
        $divisions = $this->service->getDivisions();

        return view('admin.division.index', [
            'username'  => 'Aman',
            'stats'     => $stats,
            'divisions' => $divisions,
        ]);
    }

    public function createDivision()
    {
        $validator = Validator::make(request()->all(), [
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        try {
            $division = $this->service->createDivision($data);

            return response()->json([
                'message' => 'Division created successfully.',
                'data'    => $division,
            ], 201);

        } catch (Throwable $th) {

            return response()->json([
                'message' => 'Some error occurred.',
            ], 500);
        }
    }

    public function getSingleDivision()
    {
        $id       = request()->route('id');
        $division = $this->service->getSingleDivision($id);
        return $division;
    }

    public function updateDivision()
    {
        $id = request()->route('id');

        $validator = Validator::make(request()->all(), [
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        try {
            $division = $this->service->editDivision($id, $data);

            return response()->json([
                'message' => 'Division edited successfully.',
                'data'    => $division,
            ], 201);

        } catch (Throwable $th) {

            return response()->json([
                'message' => 'Some error occurred.',
            ], 500);
        }
    }

    public function deleteDivision()
    {
        $id = request()->route('id');

        try {

            $this->service->deleteDivision($id);

            return response()->json([
                'message' => 'Division deleted successfully.',
            ], 200);

        } catch (Throwable $th) {

            return response()->json([
                'message' => 'Some error occurred.',
            ], 500);
        }
    }
}
