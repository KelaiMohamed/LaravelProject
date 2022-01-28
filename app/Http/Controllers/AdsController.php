<?php

namespace App\Http\Controllers;

use app;
use App\Models\ad;
use App\Models\pays;
use Illuminate\Http\Request;
use App\Models\typeHebergement;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdsController extends Controller
{
    public function AdForm(){
        if(!Gate::allows('Access_Admin')){abort('403');}
        $pays = pays::all();
        $types = typeHebergement::all();
        return view('EspaceAdmin.create_ad')->with([
             'types' => $types,
             'pays' => $pays
        ]);
    }
    public function storeAd(Request $request){
        if(!Gate::allows('Access_Admin')){abort('403');}
        $ad = new ad();
        $ad->title = $request->title;
        $filename = time() . '.' . $request->image->extension();
        $ad->image_path = $request->file('image')->storeAS(
            'images',
            $filename,
            'public'
        );
        $ad->time_in_days=$request->time;
        $ad->price = $request->prix;
        $ad->ville = $request->ville;
        $ad->pays_id = $request->pays;
        $ad->typeHebergement_id = $request->type;
       
        $ad->save();
        Alert::success('Success');
        return redirect()->route('EspaceAdmin');
    }
    public function deleteAd($id){
        if(!Gate::allows('Access_Admin')){abort('403');}
        $ad = ad::find($id);
        Storage::delete($ad->image_path);
        ad::destroy($id);
        Alert::success('Success');
        return redirect()->route('EspaceAdmin');
    }
    public function updateAd($id){
        if(!Gate::allows('Access_Admin')){abort('403');}
        $ad = ad::where('id',$id)->firstOrFail();
        $pays = pays::all();
        $types = typeHebergement::all();
        return view('EspaceAdmin.updateAd')->with([
            'ad' => $ad,
            'pays'=>$pays,
            'types' => $types
        ]);
    }
    public function exeUpdateAd($id, Request $request){
        if(!Gate::allows('Access_Admin')){abort('403');}
        $ad = ad::find($id)->firstOrFail();
        $ad->title = $request->title;
        $filename = time() . '.' . $request->image->extension();
        $ad->image_path = $request->file('image')->storeAS(
            'images',
            $filename,
            'public'
        );
        $ad->time_in_days=$request->time;
        $ad->price = $request->prix;
        $ad->ville = $request->ville;
        $ad->pays_id = $request->pays;
        $ad->typeHebergement_id = $request->type;
        $ad->save();
        Alert::success('Success');
        return redirect()->route('EspaceAdmin');   
    }

}
