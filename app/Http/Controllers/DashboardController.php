<?php

namespace App\Http\Controllers;

use App\Models\Cmap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $conceptData = Cmap::select([
            'id',
            'key',
            'model',
            'created_at',
            'updated_at',
            DB::raw("(CASE WHEN (SELECT assignments.cmap_id FROM assignments WHERE assignments.cmap_id = cmaps.id) THEN 'Assign to Test' ELSE 'Skeleton Maps' END) AS status")
        ])->get();

        /**
         * Get super concept as title
         */
        
        // foreach($conceptData as $maps)
        // {
        //     $dataArray = json_decode($maps->model)->nodeDataArray;
            
        //     foreach($dataArray as $data)
        //     {
        //         if(property_exists($data, 'category'))
        //         {
        //             echo $data->text;
        //         }
        //     }
        //     echo "</br></br>";
        // }

        return view('dashboard', ['conceptData' => $conceptData]);
    }
}
