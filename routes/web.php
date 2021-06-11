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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Shoe Routes
Route::get('/shoes', [App\Http\Controllers\ShoesController::class, 'index'])->name('shoes.home');
Route::post('/shoes', [App\Http\Controllers\ShoesController::class, 'store'])->name('shoes.store');
Route::get('/shoes/create', [App\Http\Controllers\ShoesController::class, 'create']);
Route::get('/shoes/view', [App\Http\Controllers\ShoesController::class, 'view']);
Route::patch('/shoes/{shoe}', [App\Http\Controllers\ShoesController::class, 'update']);
Route::get('/shoes/{shoe}', [App\Http\Controllers\ShoesController::class, 'show'])->name('shoes.show');
Route::delete('/shoes/{shoe}', [App\Http\Controllers\ShoesController::class, 'destroy'])->name('shoes.destroy');
Route::get('/shoes/{shoe}/edit', [App\Http\Controllers\ShoesController::class, 'edit']);

// Shoe Images Routes

Route::get('/shoes/{shoe}/images', [App\Http\Controllers\ShoeImagesController::class, 'index'])->name('shoeimage.home');

// Brand Routes
Route::get('/brands', [App\Http\Controllers\BrandsController::class, 'index'])->name('brands.home');
Route::post('/brands', [App\Http\Controllers\BrandsController::class, 'store'])->name('brands.store');
Route::get('/brands/create', [App\Http\Controllers\BrandsController::class, 'create']);
Route::get('/brands/view', [App\Http\Controllers\BrandsController::class, 'view'])->name('brands.view');


