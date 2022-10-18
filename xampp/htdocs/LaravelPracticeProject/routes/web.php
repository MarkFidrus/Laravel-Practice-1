<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PhotoController;

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
Route::resource('gallery', GalleryController::class);
Route::get('/', [GalleryController::class, 'index']);
Route::get('/gallery/show/{id}', [GalleryController::class, 'show']);


Route::resource('photo', PhotoController::class);
Route::get('/photo/details/{id}', [PhotoController::class, 'details']);
