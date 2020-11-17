<?php

use App\Http\Controllers\CarpoolController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

//Dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth
Auth::routes();

//Forum
Route::resource('themes', ThemeController::class);
Route::resource('articles', ArticleController::class);
Route::get('/relatedArticles/{relatedThemeID}', [ThemeController::class, 'relatedArticles']
)->name('relatedArticles');
Route::get('/relatedArticles/{relatedThemeID}', [ArticleController::class, 'createRelatedArticle']
)->name('createRelatedArticle');
Route::post('/relatedArticles/{relatedThemeID}', [ArticleController::class, 'storeArticle']
)->name('storeRelatedArticle');

//Shows
Route::get('/shows', function () {
    $currentPageData = DB::table('shows')->get();
    return view('layouts.shows', ['currentPageData' => $currentPageData]);
});
Route::post('/book/{showID}', function ($showID){
    DB::table('bookedShows')->insert(
        ['show_id' => $showID, 'user_id' => Auth::id()]
    );
    return redirect('shows');
})->name('bookShow');

//Carpools
Route::resource('carpools', CarpoolController::class);
Route::post('/book/{carpoolID}', function ($carpoolID){
    DB::table('bookedCarpools')->insert(
        ['carpool_id' => $carpoolID, 'user_id' => Auth::id()]
    );

    $query = DB::table('carpools')->where('id', $carpoolID);
    $query->increment('seatsTaken', 1);
    $query->decrement('seatsAvailable', 1);

    return redirect('carpools');
})->name('bookCarpool');

//404-Handling
Route::fallback(function () {
    return view('layouts.missing');
});


