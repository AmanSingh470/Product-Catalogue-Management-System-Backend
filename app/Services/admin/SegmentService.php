<?php
namespace App\Services\Admin;

use App\Models\Segment;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection as SupportCollection;

class SegmentService
{
    public function getSegmentsStats(): array
    {
        return [
            'totalSegments' => Segment::count(),
        ];
    }

    public function getSegments(): SupportCollection
    {
        return Segment::select('id', 'name', 'updated_at')
            ->get()
            ->map(function ($segment) {
                return [
                    'id'         => $segment->id,
                    'name'       => $segment->name,
                    'updated_at' => $segment->updated_at->format('d/m/Y, g:i A'),
                ];
        });
    }

    public function createSegment($data): Segment
    {
        return Segment::create([
            'name' => $data['name'],
        ]);
    }

    public function editSegment($id, $data): Segment
    {
        $segment = Segment::where('id', $id)
            ->firstOrFail();

        $segment->update([
            'name' => $data['name'],
        ]);

        return $segment->fresh();
    }

    public function getSingleSegment($id): JsonResponse
    {
        $segment = Segment::select(
            'id',
            'name',
            'created_at',
            'updated_at'
        )
            ->where('id', $id)
            ->firstOrFail();

        return response()->json([
            'id'         => $segment->id,
            'name'       => $segment->name,
            'created_at' => $segment->created_at->format('d/m/Y, g:i A'),
            'updated_at' => $segment->updated_at->format('d/m/Y, g:i A'),
        ]);
    }

    public function deleteSegment($id): void
    {
        Segment::where('id', $id)
            ->firstOrFail()
            ->delete();
    }
}
