<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Cmap;
use Illuminate\Http\Request;

class DeleteConceptController extends Controller
{
    
    public function __invoke($id)
    {
        try {
            Cmap::destroy($id);

            return redirect()->back()->with('success', 'Concept deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('errors', 'Deleted error with : ' . $e->getMessage());
        }
    }
}
