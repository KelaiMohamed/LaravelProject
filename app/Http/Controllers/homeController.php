<?php

namespace App\Http\Controllers;

use App\Models\ad;
use App\Models\pays;
use App\Models\reservation;
use App\Models\typeHebergement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class homeController extends Controller
{
    public function index(){
        $ads_data = ad::all()->take(6);
        return view('home')->with('ads_data', $ads_data);
    }

    
    public function EspaceAdmin(){
        if(!Gate::allows('Access_Admin')){abort('403');}
        $ads_data = ad::all();
        return view('EspaceAdmin.AdminHome')->with('ads_data', $ads_data);
    }
    public function showAd($id){
        $ad = ad::find($id);
        $data = ad::where('pays_id', $ad->pays_id)->take(3)->get();
        $pays = pays::find($ad->pays_id)->name;
        return view ('showAd')->with([
            'ad' => $ad,
            'data' => $data,
            'pays' => $pays
        ]);
    }
    public function reserver($ad_id){
        if(Auth::check()){
            $reservation = reservation::firstOrCreate([                
                'user_id' => Auth::user()->id,
                'ad_id' => $ad_id
            ]);
            Alert::success('Success');
            return redirect()->route('showAd', ['id' => $ad_id]); 
        }
        else 
        return view('auth.login');
    }
    public function MesReservations(){
         if(Auth::check()){
            $reservation = reservation::where('user_id', Auth::user()->id)->get();
            $table =[];
            $pays =[];
            $types =[];
            foreach($reservation as $item){
                array_push($table, $item->ad_id);
            }    
            $ads = ad::whereIn('id', $table)->get(); 
            return view('EspaceClient.MesReservations')->with([
                'ads' => $ads,
            ]);
         }
         else
         return redirect()->route('auth.login');
    }
    public function deleteReservation($id){
        $reservation = reservation::where('ad_id',$id)->where('user_id', Auth::user()->id)->get();
        reservation::destroy($reservation);
        Alert::success('Success');
        return redirect()->route('MesReservations');
    }
   
}
