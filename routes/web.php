<?php

use Illuminate\Support\Facades\Route;

use App\Models\Brand;

use App\Http\Controllers\ShoesController;
use App\Http\Controllers\TransactionsController;

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
Route::get('/s/{brand_slug}/{shoe_slug}/edit', [App\Http\Controllers\ShoesController::class, 'edit'])->middleware(['auth','role_auth:Super Admin']);
Route::get('/s/{brand_slug}/{shoe_slug}', [App\Http\Controllers\ShoesController::class, 'show'])->name('shoes.show')->where(['brand_slug' => '^[a-zA-Z0-9-_]{2,255}$', 'shoe_slug' => '^[a-zA-Z0-9-_]{2,255}$']);
Route::patch('/s/{brand_slug}/{shoe_slug}', [App\Http\Controllers\ShoesController::class, 'update'])->where(['brand_slug' => '^[a-zA-Z0-9-_]{2,255}$', 'shoe_slug' => '^[a-zA-Z0-9-_]{2,255}$'])->middleware(['auth','role_auth:Super Admin']);
Route::delete('/s/{brand_slug}/{shoe_slug}', [App\Http\Controllers\ShoesController::class, 'destroy'])->name('shoes.destroy')->where(['brand_slug' => '^[a-zA-Z0-9-_]{2,255}$', 'shoe_slug' => '^[a-zA-Z0-9-_]{2,255}$'])->middleware(['auth','role_auth:Super Admin']);
Route::get('/s/create', [App\Http\Controllers\ShoesController::class, 'create'])->middleware(['auth','role_auth:Super Admin']);
Route::get('/s', [App\Http\Controllers\ShoesController::class, 'index'])->name('shoes.index');
Route::post('/s', [App\Http\Controllers\ShoesController::class, 'store'])->name('shoes.store')->middleware(['auth','role_auth:Super Admin']);

// Shoe Images Routes

Route::get('/shoes/{shoe}/images', [App\Http\Controllers\ShoeImagesController::class, 'index'])->name('shoeimage.home');
Route::get('/s/{brand_slug}/{shoe_slug}/images/create', [App\Http\Controllers\ShoeImagesController::class, 'create'])->name('shoeimage.create')->middleware(['auth','role_auth:Super Admin']);
Route::post('/s/{brand_slug}/{shoe_slug}/images/create', [App\Http\Controllers\ShoeImagesController::class, 'store'])->name('shoeimage.store')->middleware(['auth','role_auth:Super Admin']);

// Brand Routes
// Todo: custom brand 404, 403

Route::get('/b/create', [App\Http\Controllers\BrandsController::class, 'create'])->middleware('auth');
Route::get('/b/create', [App\Http\Controllers\BrandsController::class, 'create'])->middleware('auth')->middleware(['auth','role_auth:Super Admin']);
Route::get('/b/{brand_slug}', [App\Http\Controllers\BrandsController::class, 'show'])->name('brand.show')->where('brand_slug', '^[a-zA-Z0-9-_]{2,255}$');
Route::delete('/b/{brand_slug}', [App\Http\Controllers\BrandsController::class, 'destroy'])->name('brand.destroy')->where('brand_slug', '^[a-zA-Z0-9-_]{2,255}$')->middleware(['auth','role_auth:Super Admin']);
Route::get('/b', [App\Http\Controllers\BrandsController::class, 'index'])->name('brand.index');
Route::post('/b', [App\Http\Controllers\BrandsController::class, 'store'])->name('brand.store')->middleware('auth');


// Shoe Details Routes
Route::get("/d/{shoe_slug}",[App\Http\Controllers\ShoesController::class,'detail']);

// Add to Cart Routes
Route::post('/c/add_to_cart', [App\Http\Controllers\TransactionsController::class, 'addToCart']);
Route::get('/c/cartlist', [App\Http\Controllers\TransactionsController::class, 'cartlist'])->name('cart.cartlist');
Route::get('/c/cartlist/{id}', [App\Http\Controllers\TransactionsController::class, 'removeFromCart']);

//order routes
Route::get('/order', [App\Http\Controllers\TransactionsController::class, 'order']);
Route::get('/orderSucess', [App\Http\Controllers\TransactionsController::class, 'orderSuccess']);

// Stock Routes
Route::get('/stocks', [App\Http\Controllers\StocksController::class, 'index'])->name('stocks.index');
Route::get('/stocks/{brand_slug}/{shoe_slug}', [App\Http\Controllers\StocksController::class, 'show'])->name('stocks.show')->where(['brand_slug' => '^[a-zA-Z0-9-_]{2,255}$', 'shoe_slug' => '^[a-zA-Z0-9-_]{2,255}$']);
Route::delete('/stocks/{brand_slug}/{shoe_slug}/{size_id}', [App\Http\Controllers\StocksController::class, 'destroy'])->name('stocks.destroy')->where(['brand_slug' => '^[a-zA-Z0-9-_]{2,255}$', 'shoe_slug' => '^[a-zA-Z0-9-_]{2,255}$']);
Route::get('/stocks/{brand_slug}/{shoe_slug}/{size_id}/edit', [App\Http\Controllers\StocksController::class, 'edit']);
Route::patch('/stocks/{brand_slug}/{shoe_slug}/{size_id}', [App\Http\Controllers\StocksController::class, 'update'])->where(['brand_slug' => '^[a-zA-Z0-9-_]{2,255}$', 'shoe_slug' => '^[a-zA-Z0-9-_]{2,255}$']);
Route::get('/stocks/create', [App\Http\Controllers\StocksController::class, 'create'])->middleware('auth');
Route::post('/stocks', [App\Http\Controllers\StocksController::class, 'store'])->name('stocks.store')->middleware('auth');

// Shop Route
Route::get('/shop', [App\Http\Controllers\StocksController::class, 'index'])->name('stocks.index');


//404 Routes
Route::get('/{any}', function () {
    abort(404);
});



