<?php

namespace App\Http\Controllers\Concept;

use App\Http\Controllers\Controller;
use App\Models\Cmap;
use Illuminate\Http\Request;

class MapPreviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index($key)
    {    
        $concept = Cmap::where('key', $key)
                        ->leftJoin('users', 'users.id', '=', 'cmaps.user_id')
                        ->first();

        if(is_null($concept))
        {
            return abort(404);
        }

        return view('concept', ['concept' => $concept]);
    }
}
