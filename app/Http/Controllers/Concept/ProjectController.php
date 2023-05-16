<?php

namespace App\Http\Controllers\Concept;

use App\Http\Controllers\Controller;
use App\Models\Cmap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        if(isset($_GET['key']))
        {
            // check concept key
            $concept = Cmap::where('key', $_GET['key'])
                            ->where('user_id', Auth::user()->id)
                            ->first(['user_id', 'key']);

            if(is_null($concept))
            {
                return redirect('/concept-map/'.$_GET['key']);
            }
        }

        return view('project');
    }
}
