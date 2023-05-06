<?php

namespace App\Http\Controllers;

use App\Models\Cmap;
use Illuminate\Http\Request;
Use Illuminate\Support\Str;

class CmapDataController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Data from request
        $data = $request->json()->all();

        /**
         * Diagram model data
         */

        $model = json_decode(json_encode($data), true);
        // remove userid from json
        unset($model['userID'], $model['key']);

        try {

            if(Cmap::where('key', $data['key'])->first())
            {
                // update model
                Cmap::where('key', $data['key'])->update([
                    'model' => json_encode($model)
                ]);
            } else {
                // Upload to database
                Cmap::create([
                    'user_id' => $data['userID'],
                    'key' => $data['key'],
                    'model' => json_encode($model),
                ]);
            }
        } catch (\Exception $e) {
            return response([
                'status' => true,
                'message' => 'failed',
                'data' => $e->getMessage()
            ], 400);
        }

        // success
        return response([
            'status' => true,
            'message' => 'success',
            'data' => $model
        ], 200);
    }
}
