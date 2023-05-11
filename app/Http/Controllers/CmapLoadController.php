<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Cmap;
use Illuminate\Http\Request;

class CmapLoadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($ckey)
    {
        $model = Cmap::where('key', $ckey)->first();

        $assignmentStatus = Assignment::where('cmap_id', $model->id)->first();

        return response([
            'status' => true,
            'message' => 'success',
            'data' => [
                'key' => $model->key,
                'model' => json_decode($model->model),
                'assignmentStatus' => $assignmentStatus
            ]
        ]);
    }
}
