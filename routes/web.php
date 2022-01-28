<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\TypeaheadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [homeController::class, 'index'])->name('home');
Route::get('/createAd',[AdsController::class, 'AdForm'])->name('AdForm');
Route::post('/storeAd',[AdsController::class, 'storeAd'])->name('storeAd');
Route::get('/EspaceAdmin',[homeController::class, 'EspaceAdmin'])->name('EspaceAdmin');
Route::get('/deleteAd{id}',[AdsController::class, 'deleteAd'])->name('deleteAd');
Route::get('/updateAd{id}',[AdsController::class, 'updateAd'])->name('updateAd');
Route::post('/exeUpdateAd{id}',[AdsController::class, 'exeUpdateAd'])->name('exeUpdateAd');
Route::get('/showAd{id}',[homeController::class, 'showAd'])->name('showAd');
Route::get('/reserver{id}',[homeController::class, 'reserver'])->name('reserver');
Route::get('/MesReservations',[homeController::class, 'MesReservations'])->name('MesReservations');     
Route::get('/deleteReservation{id}',[homeController::class, 'deleteReservation'])->name('deleteReservation');  


//search routes :
Route::get('/Stype{type}',[searchController::class, 'searchByType'])->name('searchByType');
Route::get('/PL', [searchController::class, 'prixL'])->name('prixL');
Route::get('/PH', [searchController::class, 'prixH'])->name('prixH');
Route::get('/SS', [searchController::class, 'searchBystars'])->name('searchBystars');
Route::get('/ST', [searchController::class, 'searchByCreationTime'])->name('searchByCreationTime');
Route::post('/search',[searchController::class, 'searchPT'])->name('searchPT');
//Home search :
Route::get('/autocompleteSearch', [TypeaheadController::class, 'autocompleteSearch'])->name('autocomplete-search');




Auth::routes();