<?php
namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use App\Services\admin\CompanyService;
use Illuminate\Support\Facades\Validator;
use Throwable;

class CompanyController extends Controller
{
    protected $service;

    public function __construct(CompanyService $service)
    {
        $this->service = $service;
    }

    public function CompanyData()
    {
        $stats = $this->service->getCompaniesStats();
        $companies = $this->service->getCompanies();

        return view('admin.company.index', [
            'username' => 'Aman',
            'stats' => $stats,
            'companies' => $companies
        ]);
    }

    public function createCompany()
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
            $company = $this->service->createCompany($data);

            return response()->json([
                'message' => 'Company created successfully.',
                'data'    => $company,
            ], 201);

        } catch (Throwable $th) {

            return response()->json([
                'message' => 'Some error occurred.',
            ], 500);
        }
    }
    
    public function getSingleCompany()
    {
        $id       = request()->route('id');
        $company = $this->service->getSingleCompany($id);
        return $company;
    }

    public function updateCompany()
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
            $company = $this->service->editCompany($id, $data);

            return response()->json([
                'message' => 'Company edited successfully.',
                'data'    => $company,
            ], 201);

        } catch (Throwable $th) {

            return response()->json([
                'message' => 'Some error occurred.',
            ], 500);
        }
    }

    public function deleteCompany()
    {
        $id = request()->route('id');

        try {

            $this->service->deleteCompany($id);

            return response()->json([
                'message' => 'Company deleted successfully.',
            ], 200);

        } catch (Throwable $th) {

            return response()->json([
                'message' => 'Some error occurred.',
            ], 500);
        }
    }
}
