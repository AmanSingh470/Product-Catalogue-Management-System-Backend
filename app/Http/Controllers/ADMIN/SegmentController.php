<?php
namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use App\Services\admin\SegmentService;
use Illuminate\Support\Facades\Validator;
use Throwable;

class SegmentController extends Controller
{
    protected $service;

    public function __construct(SegmentService $service)
    {
        $this->service = $service;
    }

    public function SegmentData()
    {
        $stats    = $this->service->getSegmentsStats();
        $segments = $this->service->getSegments();

        return view('admin.segment.index', [
            'username' => 'Aman',
            'stats'    => $stats,
            'segments' => $segments,
        ]);
    }

    public function createSegment()
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
            $segment = $this->service->createSegment($data);

            return response()->json([
                'message' => 'Segment created successfully.',
                'data'    => $segment,
            ], 201);

        } catch (Throwable $th) {

            return response()->json([
                'message' => 'Some error occurred.',
            ], 500);
        }
    }

    public function updateSegment()
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
            $segment = $this->service->editSegment($id, $data);

            return response()->json([
                'message' => 'Segment edited successfully.',
                'data'    => $segment,
            ], 201);

        } catch (Throwable $th) {

            return response()->json([
                'message' => 'Some error occurred.',
            ], 500);
        }
    }

    public function getSingleSegment()
    {
        $id      = request()->route('id');
        $segment = $this->service->getSingleSegment($id);
        return $segment;
    }

    public function deleteSegment()
    {
        $id = request()->route('id');

        try {

            $this->service->deleteSegment($id);

            return response()->json([
                'message' => 'Segment deleted successfully.',
            ], 200);

        } catch (Throwable $th) {

            return response()->json([
                'message' => 'Some error occurred.',
            ], 500);
        }
    }
}
