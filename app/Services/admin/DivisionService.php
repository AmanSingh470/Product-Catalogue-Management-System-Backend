<?php
namespace App\Services\Admin;

use App\Models\Division;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection as SupportCollection;

class DivisionService
{
    public function getDivisionsStats(): array
    {
        return [
            'totalDivisions' => Division::count(),
        ];
    }

    public function getDivisions(): SupportCollection
    {
        return Division::select('id', 'name', 'description' ,'updated_at')
            ->get()
            ->map(function ($division) {
                return [
                    'id'          => $division->id,
                    'name'        => $division->name,
                    'description' => $division->description,
                    'updated_at'  => $division->updated_at->format('d/m/Y, g:i A')
                ];
            });
    }

    public function createDivision($data): Division
    {
        return Division::create([
            'name' => $data['name'],
            'description' => $data['description']
        ]);
    }

    public function getSingleDivision($id): JsonResponse
    {
        $division = Division::select(
            'id',
            'name',
            'description',
            'created_at',
            'updated_at'
        )
            ->where('id', $id)
            ->firstOrFail();

        return response()->json([
            'id'          => $division->id,
            'name'        => $division->name,
            'description' => $division->description,
            'created_at'  => $division->created_at->format('d/m/Y, g:i A'),
            'updated_at' => $division->updated_at->format('d/m/Y, g:i A'),
        ]);
    }

    public function editDivision($id, $data): Division
    {
        $division = Division::where('id', $id)
            ->firstOrFail();

        $division->update([
            'name' => $data['name'],
            'description' => $data['description']
        ]);

        return $division->fresh();
    }

    public function deleteDivision($id): void
    {
        Division::where('id', $id)
            ->firstOrFail()
            ->delete();
    }
}
