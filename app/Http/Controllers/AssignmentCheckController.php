<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Cmap;
use Illuminate\Http\Request;

class AssignmentCheckController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($cmapID)
    {
        $cmap = Cmap::where('key', $cmapID)->first();

        try {
            Assignment::where('cmap_id', $cmap->id)->first();
        } catch (\Exception $e) {
            return response([
                'status' => true,
                'message' => $e->getMessage(),
                'data' => [
                    'status' => false
                ]
            ], 400);
        }

        return response([
            'status' => true,
            'message' => 'Data found',
            'data' => [
                'status' => true
            ]
        ]);
    }
}
