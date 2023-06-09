<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Cmap;
use Illuminate\Http\Request;

class DashboardDataController extends Controller
{
    public function assignment($key)
    {
        $cmap = Cmap::where('key', $key)->first();
        $assignment = Assignment::where('cmap_id', $cmap->id)->first();

        return response([
            'status' => true,
            'message' => 'success',
            'data' => $assignment
        ]);
    }
}
