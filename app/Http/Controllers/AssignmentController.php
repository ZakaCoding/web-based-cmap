<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Cmap;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AssignmentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Request all data in json
        $data = $request->json()->all();
        // create assignment key
        $key = strtoupper(Str::random(3) . '-'. Str::random(3) .'-'. Str::random(3));
        
        try {
            // get cmap key from json
            $cmapID = Cmap::where('key', $data['key'])->first();

            Assignment::create([
                'user_id' => $data['userID'],
                'cmap_id' => $cmapID->id,
                'keycode' => $key,
                'focus_question' => $data['data']['focusquestion'],
                'due_date' => date('Y-m-d', strtotime($data['data']['duedate'])),
                'timer' => $data['data']['timer'],
                'method' => $data['data']['method']
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => true,
                'message' => 'failed',
                'data' => $e->getMessage()
            ], 400);
        }

        return response([
            'status' => true,
            'message' => 'success',
            'data' => $key
        ]);
    }
}
