<?php

//use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PhotoController;
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

Route::group(['middleware' => 'web'], function(){

    Route::resource('gallery', '\App\Http\Controllers\GalleryController');

    Route::get('/','\App\Http\Controllers\GalleryController@index');
    Route::get('/gallery/create', '\App\Http\Controllers\GalleryController@create');
    Route::get('/gallery/show/{id}', '\App\Http\Controllers\GalleryController@show');


    Route::resource('photo', '\App\Http\Controllers\PhotoController');

    Route::get('/photo/create/{id}', '\App\Http\Controllers\PhotoController@create');
    Route::get('/photo/details/{id}', '\App\Http\Controllers\PhotoController@details');

    Auth::routes();

    Route::get('/home','\App\Http\Controllers\GalleryController@index');
    Route::get('/logout','\App\Http\Controllers\Auth\LoginController@logout');

});
