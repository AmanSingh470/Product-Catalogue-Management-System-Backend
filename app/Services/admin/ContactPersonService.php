<?php
namespace App\Services\Admin;

use App\Models\Company;
use App\Models\CompanyContactPerson;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class ContactPersonService
{
    public function getContactPersonsStats(): array
    {
        return [
            'totalContactPersons' => CompanyContactPerson::count(),
        ];
    }

    public function getContactPersons(): Collection
    {
        return CompanyContactPerson::with('company:id,name')
            ->select('id', 'name', 'email', 'function', 'company_id', 'updated_at')
            ->get()
            ->map(function ($person) {
                return [
                    'id'         => $person->id,
                    'name'       => $person->name,
                    'email'      => $person->email,
                    'function'   => $person->function,
                    'company'    => $person->company?->name,
                    'updated_at' => $person->updated_at->format('d/m/Y, g:i A'),
                ];
            });
    }

    public function getCompanies(): Collection
    {
        return Company::select('id', 'name')
            ->get()
            ->map(function ($company) {
                return [
                    'id'   => $company->id,
                    'name' => $company->name,
                ];
            });
    }

    public function createContactPerson($data): CompanyContactPerson
    {
        return CompanyContactPerson::create([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'function'   => $data['function'],
            'company_id' => $data['company'],
        ]);
    }

    public function getSingleContactPerson($id): JsonResponse
    {
        $contactPerson = CompanyContactPerson::with('company:id,name')
            ->select(
                'id',
                'name',
                'email',
                'function',
                'company_id',
                'created_at',
                'updated_at'
            )
            ->where('id', $id)
            ->firstOrFail();

        return response()->json([
            'id'         => $contactPerson->id,
            'name'       => $contactPerson->name,
            'email'      => $contactPerson->email,
            'function'   => $contactPerson->function,

            'company'    => [
                'id'   => $contactPerson->company->id,
                'name' => $contactPerson->company->name,
            ],

            'created_at' => $contactPerson->created_at->format('d/m/Y, g:i A'),
            'updated_at' => $contactPerson->updated_at->format('d/m/Y, g:i A'),
        ]);
    }

    public function editContactPerson($id, $data): CompanyContactPerson
    {
        $contactPerson = CompanyContactPerson::where('id', $id)
            ->firstOrFail();

        $contactPerson->update([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'function' => $data['function'],
            'company_id'  => $data['company']
        ]);

        return $contactPerson->fresh();
    }

    public function deleteContactPerson($id): void
    {
        CompanyContactPerson::where('id', $id)
            ->firstOrFail()
            ->delete();
    }
}
