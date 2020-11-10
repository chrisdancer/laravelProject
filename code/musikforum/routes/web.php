<?php

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

//Welcome-Stuff
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Auth
Auth::routes();

//Forum
Route::get('/forum', function () {
    $forumData = DB::table('forum')->get();

    return view('forum', ['forumData' => $forumData]);
});

//Shows
Route::get('/shows', function () {
    $showsData = DB::table('shows')->get();

    return view('shows', ['showsData' => $showsData]);
});
