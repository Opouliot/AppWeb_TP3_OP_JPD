<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::post('logout', 'App\Http\Controllers\AuthController@logout');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('user/{id}', 'App\Http\Controllers\UserController@show');
    Route::put('user/{id}', 'App\Http\Controllers\UserController@update');
    
    Route::post('critics', 'App\Http\Controllers\CriticController@create');
    Route::get('critics', 'App\Http\Controllers\CriticController@index');
});

Route::middleware(['auth:sanctum', 'abilities:admin'])->group(function () {
    Route::resource('films', 'App\Http\Controllers\FilmController')->except(['index', 'show']);
    Route::get('user', 'App\Http\Controllers\UserController@index');
});

Route::post('user', 'App\Http\Controllers\UserController@store');

Route::get('films/{id}/actors', 'App\Http\Controllers\FilmController@actors');
Route::resource('films', 'App\Http\Controllers\FilmController')->only(['index', 'show']);
