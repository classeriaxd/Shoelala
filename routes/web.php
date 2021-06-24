<?php

use Illuminate\Support\Facades\Route;
use \App\Models\Brand;

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
    $brands = Brand::with(['shoes' => function ($query) {
        $query->orderBy('created_at', 'DESC');}, 
        'shoes.shoeImages' => function ($query) {
        $query->where('image_angle_id', '3')->pluck('image');},])
    ->orderBy('name', 'ASC')
    ->get();
    return view('welcome', compact('brands'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

// Todo: custom shoe 404, 403
Route::get('/s/{brand_slug}/{shoe_slug}/edit', [App\Http\Controllers\ShoesController::class, 'edit']);
Route::get('/s/{brand_slug}/{shoe_slug}', [App\Http\Controllers\ShoesController::class, 'show'])->name('shoes.show')->where(['brand_slug' => '^[a-zA-Z0-9-_]{2,255}$', 'shoe_slug' => '^[a-zA-Z0-9-_]{2,255}$']);
Route::patch('/s/{brand_slug}/{shoe_slug}', [App\Http\Controllers\ShoesController::class, 'update'])->where(['brand_slug' => '^[a-zA-Z0-9-_]{2,255}$', 'shoe_slug' => '^[a-zA-Z0-9-_]{2,255}$']);
Route::delete('/s/{brand_slug}/{shoe_slug}', [App\Http\Controllers\ShoesController::class, 'destroy'])->name('shoes.destroy')->where(['brand_slug' => '^[a-zA-Z0-9-_]{2,255}$', 'shoe_slug' => '^[a-zA-Z0-9-_]{2,255}$']);
Route::get('/s/create', [App\Http\Controllers\ShoesController::class, 'create'])->middleware('auth');
Route::get('/s', [App\Http\Controllers\ShoesController::class, 'index'])->name('shoes.index');
Route::post('/s', [App\Http\Controllers\ShoesController::class, 'store'])->name('shoes.store')->middleware('auth');


// Shoe Images Routes

Route::get('/shoes/{shoe}/images', [App\Http\Controllers\ShoeImagesController::class, 'index'])->name('shoeimage.home');
Route::get('/s/{brand_slug}/{shoe_slug}/images/create', [App\Http\Controllers\ShoeImagesController::class, 'create'])->name('shoeimage.create');
Route::post('/s/{brand_slug}/{shoe_slug}/images/create', [App\Http\Controllers\ShoeImagesController::class, 'store'])->name('shoeimage.store');

// Brand Routes
// Todo: custom brand 404, 403

Route::get('/b/create', [App\Http\Controllers\BrandsController::class, 'create'])->middleware('auth');
Route::get('/b/{brand_slug}', [App\Http\Controllers\BrandsController::class, 'show'])->name('brand.show')->where('brand_slug', '^[a-zA-Z0-9-_]{2,255}$');
Route::delete('/b/{brand_slug}', [App\Http\Controllers\BrandsController::class, 'destroy'])->name('brand.destroy')->where('brand_slug', '^[a-zA-Z0-9-_]{2,255}$');
Route::get('/b', [App\Http\Controllers\BrandsController::class, 'index'])->name('brand.index');
Route::post('/b', [App\Http\Controllers\BrandsController::class, 'store'])->name('brand.store')->middleware('auth');
//404 Routes
Route::get('/{any}', function () {
    abort(404);
});

