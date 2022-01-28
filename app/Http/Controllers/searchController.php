<?php

namespace App\Http\Controllers;

use App\Models\ad;
use App\Models\pays;
use Illuminate\Http\Request;
use App\Models\typeHebergement;

class searchController extends Controller
{
    
    public function prixH(){
        $ad = ad::all()->sortBy('price');
        return view('search')->with([
            'ad' => $ad       
        ]);
    }
    public function prixL(){
        $ad = ad::all()->sortByDesc('price');
        return view('search')->with([
            'ad' => $ad       
        ]);
    }
    public function searchByType($type){
        $ad = ad::where('typeHebergement_id', $type)->get();
        return view('search')->with([
            'ad' => $ad       
        ]);    }
    public function searchBystars(){
        $ad = ad::all()->sortBy('stars');
        return view('search')->with([
            'ad' => $ad       
        ]);    }
    public function searchByCreationTime(){
        $ad = ad::all()->sortBy('created_at');
        return view('search')->with([
            'ad' => $ad       
        ]);    
    }
   
    public function searchPT(Request $request){
        $pays = pays::where('name', $request->pays)->first();
        $ads = ad::where('pays_id',$pays->id)->where('typeHebergement_id', $request->select)->get();
        return view('search')->with(['ad'=>$ads]);     
   }

}
