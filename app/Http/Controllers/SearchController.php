<?php

namespace App\Http\Controllers;

use App\Models\cour;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $term = trim($request->get('term'));
     
            $cours = cour::where('Name_cour', 'like', '%'.$term.'%')
            ->orWhere('Name_prof', 'like', '%'.$term.'%')
            ->orWhere('Ecole_name', 'like', '%'.$term.'%')
            ->orderBy('Name_domaine', 'desc')
            ->get();
            return view('cour.index', compact('cours', 'term'));
    }
}
