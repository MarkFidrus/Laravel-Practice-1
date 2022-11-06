<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'web'], function () {
    Route::get('/', '\App\Http\Controllers\HomeController@index')->name('home');

    Route::resource('gallery', '\App\Http\Controllers\GalleryController');

    Route::get('/galleries', '\App\Http\Controllers\GalleryController@index')->name('galleries');

    Route::get('/gallery/create', '\App\Http\Controllers\GalleryController@create')->name('create_gallery');
    Route::post('/gallery/create', '\App\Http\Controllers\GalleryController@store');

    Route::get('/gallery/show/{id}', '\App\Http\Controllers\GalleryController@show')->name('show_gallery');

    Route::get('/gallery/edit/{id}', '\App\Http\Controllers\GalleryController@edit')->name('edit_gallery');
    Route::post('/gallery/edit/{id}', '\App\Http\Controllers\GalleryController@set');


    Route::resource('photo', '\App\Http\Controllers\PhotoController');
    Route::get('/photo/upload', '\App\Http\Controllers\PhotoController@upload')->name('upload_photo');
    Route::post('/photo/upload', '\App\Http\Controllers\PhotoController@store');

    Route::get('/photo/show/{id}', '\App\Http\Controllers\GalleryController@show')->name('show_photo');

    Route::get('/photo/edit/{id}', '\App\Http\Controllers\GalleryController@edit')->name('edit_photo');
    Route::post('/photo/edit/{id}', '\App\Http\Controllers\GalleryController@set');


    Route::resource('profile', '\App\Http\Controllers\ProfileController');
    Route::get('/profile/{id}', '\App\Http\Controllers\PhotoController@show')->name('profile');

    Route::get('/contact_us', '\App\Http\Controllers\ContactController@contact')->name('contact');
    Route::post('/contact_us', '\App\Http\Controllers\ContactController@send');

    Route::get('/messages', '\App\Http\Controllers\PhotoController@show')->name('messages');
    Route::get('/messages/show/{id}', '\App\Http\Controllers\PhotoController@show')->name('show_messages');

    Route::get('/about_us', '\App\Http\Controllers\HomeController@about')->name('about_us');

    Auth::routes();

    Route::get('/logout','\App\Http\Controllers\Auth\LoginController@logout');
});





