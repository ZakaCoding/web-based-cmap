<?php

namespace App\Http\Controllers;

use App\Models\Cmap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        /**
         * For mysql setting database
         * 
         */
        // $conceptData = Cmap::select([
        //     'id',
        //     'key',
        //     'model',
        //     'created_at',
        //     'updated_at',
        //     DB::raw("(CASE WHEN (SELECT assignments.cmap_id FROM assignments WHERE assignments.cmap_id = cmaps.id) THEN 'Assign to Test' ELSE 'Skeleton Maps' END) AS status")
        // ])->get();

        /**
         * if you using postgres as database 
         * use this code, this code has been fixed by chat.open.ai :)
         */
        // $conceptData = Cmap::select([
        //     'id',
        //     'key',
        //     'model',
        //     'created_at',
        //     'updated_at',
        //     DB::raw("(CASE WHEN EXISTS (SELECT assignments.cmap_id FROM assignments WHERE assignments.cmap_id = cmaps.id) THEN 'Assign to Test' ELSE 'Skeleton Maps' END) AS status")
        // ])->get();

        // handel error cause RDBMS between MySQL and Postgresql
        if(env('DB_CONNECTION') === 'pgsql')
        {
            $conceptData = Cmap::select([
                'id',
                'user_id',
                'key',
                'model',
                'created_at',
                'updated_at',
                DB::raw("(CASE WHEN EXISTS (SELECT assignments.cmap_id FROM assignments WHERE assignments.cmap_id = cmaps.id) THEN 'Assign to Test' ELSE 'Skeleton Maps' END) AS status")
            ])->where('user_id', Auth::user()->id)->get();
        }

        if(env('DB_CONNECTION') === 'mysql')
        {
            $conceptData = Cmap::select([
                'id',
                'user_id',
                'key',
                'model',
                'created_at',
                'updated_at',
                DB::raw("(CASE WHEN (SELECT assignments.cmap_id FROM assignments WHERE assignments.cmap_id = cmaps.id) THEN 'Assign to Test' ELSE 'Skeleton Maps' END) AS status")
            ])->where('user_id', Auth::user()->id)->get();
        }


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

    public function releasePages()
    {
        return view('release-notes');
    }
}
