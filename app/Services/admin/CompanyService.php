<?php
namespace App\Services\Admin;

use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Http\JsonResponse;

class CompanyService
{
    public function getCompaniesStats(): array
    {
        return [
            'totalCompanies' => Company::count(),
        ];
    }

    public function getCompanies(): SupportCollection
    {
        return Company::select('id', 'name', 'updated_at')
            ->get()
            ->map(function ($company) {
                return [
                    'id'         => $company->id,
                    'name'       => $company->name,
                    'updated_at' => $company->updated_at->format('d/m/Y, g:i A'),
                ];
            });
    }

    public function createCompany($data): Company
    {
        return Company::create([
            'name' => $data['name'],
        ]);
    }

    public function getSingleCompany($id): JsonResponse
    {
        $company = Company::select(
            'id',
            'name',
            'created_at',
            'updated_at'
        )
            ->where('id', $id)
            ->firstOrFail();

        return response()->json([
            'id'         => $company->id,
            'name'       => $company->name,
            'created_at' => $company->created_at->format('d/m/Y, g:i A'),
            'updated_at' => $company->updated_at->format('d/m/Y, g:i A'),
        ]);
    }

    public function editCompany($id, $data): Company
    {
        $company = Company::where('id', $id)
            ->firstOrFail();

        $company->update([
            'name' => $data['name'],
        ]);

        return $company->fresh();
    }

    public function deleteCompany($id): void
    {
        Company::where('id', $id)
            ->firstOrFail()
            ->delete();
    }

}
