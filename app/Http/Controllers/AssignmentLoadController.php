<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Cmap;
use Illuminate\Http\Request;

class AssignmentLoadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($key)
    {
        $assignment = Assignment::where('keycode', $key)->first();

        $model = Cmap::where('id', $assignment->cmap_id)->first();

        return response([
            'status' => true,
            'message' => 'success',
            'data' => [
                'assignment' => $assignment,
                'model' => json_decode($model->model)
            ]
        ]);
    }
}
