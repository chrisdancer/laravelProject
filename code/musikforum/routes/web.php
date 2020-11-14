<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

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

//Article
Route::resource('themes', ThemeController::class);
Route::get('/relatedArticles/{relatedThemeID}', [ThemeController::class, 'relatedArticles']
)->name('relatedArticles');

Route::resource('articles', ArticleController::class);

//Menu
Route::get('/{currentPage}', [MenuController::class, "showView"]);

//Images
Route::resource('images', ImageController::class);
Route::resource('comments', CommentController::class);

Route::get('/relatedComments/{relatedImageID}', [CommentController::class, 'relatedComment']
)->name('createRelatedComment');


