<?php

namespace App\Http\Controllers;

use App\Models\pays;
use Illuminate\Http\Request;

class TypeaheadController extends Controller
{
    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          $filterResult = pays::where('name', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    } 
}
