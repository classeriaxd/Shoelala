<?php

use Illuminate\Support\Facades\Route;

use App\Models\Brand;

use App\Http\Controllers\ShoesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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
    $brands3 = Brand::with(['shoes' => function ($query) {
        $query->where(DB::raw('date_sub(now(), interval 336 HOUR)'),'>=','created_at')->orderBy('created_at', 'DESC')->limit(1);}, 
        'shoes.shoeImages' => function ($query) {
        $query->where('image_angle_id', '3')->pluck('image');},])
    ->get();
    $brands = Brand::with(['shoes' => function ($query) {
        $query->where(DB::raw('date_sub(now(), interval 336 HOUR)'),'>=','created_at')->orderBy('created_at', 'DESC')->limit(3);}, 
        'shoes.shoeImages' => function ($query) {
        $query->where('image_angle_id', '3')->pluck('image');},])
    ->orderBy('name', 'ASC')
    ->get();
    $brands2 = Brand::with(['shoes' => function ($query) {
        $query->where(DB::raw('date_sub(now(), interval 336 HOUR)'),'>=','created_at')->orderBy('created_at', 'DESC')->skip(3)->take(3);}, 
        'shoes.shoeImages' => function ($query) {
        $query->where('image_angle_id', '3')->pluck('image');},])
    ->orderBy('name', 'ASC')
    ->get();
    return view('welcome', compact('brands3','brands','brands2'));
});

Auth::routes(['verify'=> true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/abtcont', [App\Http\Controllers\AbtContController::class, 'abtcont']);

// Todo: custom shoe 404, 403
Route::get('/s/restore-index', [App\Http\Controllers\ShoesController::class, 'restore_index'])->name('shoes.restore')->middleware(['auth','role_auth:Super Admin']); 
Route::get('/s/restore-shoes/{shoe_slug}', [App\Http\Controllers\ShoesController::class, 'restore_shoes'])->where('shoe_slug', '^[a-zA-Z0-9-_]{2,255}$')->middleware(['auth','role_auth:Super Admin']);
Route::get('/s/{brand_slug}/{shoe_slug}/edit', [App\Http\Controllers\ShoesController::class, 'edit'])->middleware(['auth','role_auth:Super Admin']);
Route::get('/s/{brand_slug}/{shoe_slug}', [App\Http\Controllers\ShoesController::class, 'show'])->name('shoes.show')->where(['brand_slug' => '^[a-zA-Z0-9-_]{2,255}$', 'shoe_slug' => '^[a-zA-Z0-9-_]{2,255}$']);
Route::patch('/s/{brand_slug}/{shoe_slug}', [App\Http\Controllers\ShoesController::class, 'update'])->where(['brand_slug' => '^[a-zA-Z0-9-_]{2,255}$', 'shoe_slug' => '^[a-zA-Z0-9-_]{2,255}$'])->middleware(['auth','role_auth:Super Admin']);
Route::delete('/s/{brand_slug}/{shoe_slug}', [App\Http\Controllers\ShoesController::class, 'destroy'])->name('shoes.destroy')->where(['brand_slug' => '^[a-zA-Z0-9-_]{2,255}$', 'shoe_slug' => '^[a-zA-Z0-9-_]{2,255}$'])->middleware(['auth','role_auth:Super Admin']);
Route::get('/s/create', [App\Http\Controllers\ShoesController::class, 'create'])->middleware(['auth','role_auth:Super Admin']);
Route::get('/s', [App\Http\Controllers\ShoesController::class, 'index'])->name('shoes.index');
Route::post('/s', [App\Http\Controllers\ShoesController::class, 'store'])->name('shoes.store')->middleware(['auth','role_auth:Super Admin']);

// Shoe Images Routes

Route::get('/s/{brand_slug}/{shoe_slug}/images/create', [App\Http\Controllers\ShoeImagesController::class, 'create'])->name('shoeimage.create')->middleware(['auth','role_auth:Super Admin']);
Route::post('/s/{brand_slug}/{shoe_slug}/images/create', [App\Http\Controllers\ShoeImagesController::class, 'store'])->name('shoeimage.store')->middleware(['auth','role_auth:Super Admin']);

// Brand Routes
// Todo: custom brand 404, 403
Route::get('/b/restore-index', [App\Http\Controllers\BrandsController::class, 'restore_index'])->name('brands.restore')->middleware(['auth','role_auth:Super Admin']); 
Route::get('/b/restore-brand/{brands_slug}', [App\Http\Controllers\BrandsController::class, 'restore_brand'])->where('brand_slug', '^[a-zA-Z0-9-_]{2,255}$')->middleware(['auth','role_auth:Super Admin']);

Route::get('/b/create', [App\Http\Controllers\BrandsController::class, 'create'])->middleware('auth');
Route::get('/b/create', [App\Http\Controllers\BrandsController::class, 'create'])->middleware('auth')->middleware(['auth','role_auth:Super Admin']);
Route::get('/b/{brand_slug}', [App\Http\Controllers\BrandsController::class, 'show'])->name('brand.show')->where('brand_slug', '^[a-zA-Z0-9-_]{2,255}$');
Route::delete('/b/{brand_slug}', [App\Http\Controllers\BrandsController::class, 'destroy'])->name('brand.destroy')->where('brand_slug', '^[a-zA-Z0-9-_]{2,255}$')->middleware(['auth','role_auth:Super Admin']);
Route::get('/b', [App\Http\Controllers\BrandsController::class, 'index'])->name('brand.index');
Route::post('/b', [App\Http\Controllers\BrandsController::class, 'store'])->name('brand.store')->middleware('auth');


// Shoe Details Routes
Route::get("/d/{shoe_slug}",[App\Http\Controllers\ShoesController::class,'detail'])->middleware(['auth','role_auth:User']);
// Add to Cart Routes
Route::post('/c/add_to_cart', [App\Http\Controllers\CartController::class, 'addToCart'])->middleware(['auth','role_auth:User']);
Route::get('/c/cartlist', [App\Http\Controllers\CartController::class, 'cartlist'])->name('cart.cartlist')->middleware(['auth','role_auth:User']);
Route::get('/c/cartlist/{id}', [App\Http\Controllers\CartController::class, 'removeFromCart'])->where('id', '^[0-9]$')->middleware(['auth','role_auth:User']);

//Show Orders Routes
Route::get('/c/pendingOrders', [App\Http\Controllers\OrderController::class, 'pendingOrders'])->middleware(['auth','role_auth:User']);
Route::get('/c/pendingOrders/{order_uuid}', [App\Http\Controllers\OrderController::class, 'pendingOrdersView'])->where(['order_uuid' => '^[a-zA-Z0-9\-]{36}$'])->middleware(['auth','role_auth:User']);
Route::get('/c/completedOrders', [App\Http\Controllers\OrderController::class, 'completedOrders'])->middleware(['auth','role_auth:User']);
Route::get('/c/completedOrders/{order_uuid}', [App\Http\Controllers\OrderController::class, 'completedOrdersView'])->where(['order_uuid' => '^[a-zA-Z0-9\-]{36}$'])->middleware(['auth','role_auth:User']);
Route::get('/c/cancelledOrders', [App\Http\Controllers\OrderController::class, 'cancelledOrders'])->middleware(['auth','role_auth:User']);
Route::get('/c/cancelledOrders/{order_uuid}', [App\Http\Controllers\OrderController::class, 'cancelledOrdersView'])->where(['order_uuid' => '^[a-zA-Z0-9\-]{36}$'])->middleware(['auth','role_auth:User']);
Route::get('/c/expiredOrders', [App\Http\Controllers\OrderController::class, 'expiredOrders'])->middleware(['auth','role_auth:User']);
Route::get('/c/expiredOrders/{order_uuid}', [App\Http\Controllers\OrderController::class, 'expiredOrdersView'])->where(['order_uuid' => '^[a-zA-Z0-9\-]{36}$'])->middleware(['auth','role_auth:User']);


//order routes
Route::get('/order', [App\Http\Controllers\OrderController::class, 'order'])->middleware(['auth','role_auth:User']);
Route::post('/order/orderSuccess', [App\Http\Controllers\OrderController::class, 'orderSuccess'])->middleware(['auth','role_auth:User']);
Route::get('/c/pendingOrders/cancel/{order_uuid}', [App\Http\Controllers\OrderController::class, 'removeFromOrder'])->where(['order_uuid' => '^[a-zA-Z0-9\-]{36}$'])->middleware(['auth','role_auth:User']);

// Stock Routes
Route::get('/stocks', [App\Http\Controllers\StocksController::class, 'index'])->middleware(['auth','role_auth:Super Admin,Admin'])->name('stocks.index');
Route::get('/stocks/{brand_slug}/{shoe_slug}', [App\Http\Controllers\StocksController::class, 'show'])->where(['brand_slug' => '^[a-zA-Z0-9-_]{2,255}$', 'shoe_slug' => '^[a-zA-Z0-9-_]{2,255}$'])->middleware(['auth','role_auth:Super Admin,Admin'])->name('stocks.show');
Route::delete('/stocks/{brand_slug}/{shoe_slug}/{size_id}', [App\Http\Controllers\StocksController::class, 'destroy'])->name('stocks.destroy')->where(['brand_slug' => '^[a-zA-Z0-9-_]{2,255}$', 'shoe_slug' => '^[a-zA-Z0-9-_]{2,255}$']);
Route::get('/stocks/{brand_slug}/{shoe_slug}/{size_id}/edit', [App\Http\Controllers\StocksController::class, 'edit'])->middleware(['auth','role_auth:Super Admin,Admin']);
Route::patch('/stocks/{brand_slug}/{shoe_slug}/{size_id}', [App\Http\Controllers\StocksController::class, 'update'])->where(['brand_slug' => '^[a-zA-Z0-9-_]{2,255}$', 'shoe_slug' => '^[a-zA-Z0-9-_]{2,255}$']);
Route::get('/stocks/create', [App\Http\Controllers\StocksController::class, 'create'])->middleware('auth')->middleware(['auth','role_auth:Super Admin,Admin']);
Route::post('/stocks', [App\Http\Controllers\StocksController::class, 'store'])->middleware('auth')->name('stocks.store');

// Shop Route
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');


//Order Routes
Route::post('/orders/e/all', [App\Http\Controllers\OrdersController::class, 'tag_all_expired_orders'])->middleware(['auth','role_auth:Super Admin,Admin'])->name('order.all_expired');
Route::post('/orders/e/{order_uuid}', [App\Http\Controllers\OrdersController::class, 'tag_expired_order'])->where(['order_uuid' => '^[a-zA-Z0-9\-]{36}$'])->middleware(['auth','role_auth:Super Admin,Admin'])->name('order.expired');
Route::get('/orders/e', [App\Http\Controllers\OrdersController::class, 'show_expired_orders'])->middleware(['auth','role_auth:Super Admin,Admin'])->name('expired_orders.show');

Route::get('/orders/o/{order_uuid}', [App\Http\Controllers\OrdersController::class, 'show'])->middleware('auth')->where(['order_uuid' => '^[a-zA-Z0-9\-]{36}$'])->middleware(['auth','role_auth:Super Admin,Admin'])->name('orders.show');
Route::post('/orders/o/{order_uuid}', [App\Http\Controllers\OrdersController::class, 'complete_order'])->middleware('auth')->where(['order_uuid' => '^[a-zA-Z0-9\-]{36}$'])->middleware(['auth','role_auth:Super Admin,Admin']);
Route::get('/orders/scan', [App\Http\Controllers\OrdersController::class, 'scanQRView'])->middleware(['auth','role_auth:Super Admin,Admin']);
Route::get('/orders', [App\Http\Controllers\OrdersController::class, 'index'])->middleware(['auth','role_auth:Super Admin,Admin']);


//Maintenance Routes
Route::get('/maintenance/users/edit/{user_id}',[App\Http\Controllers\MaintenanceController::class, 'role_edit'])->middleware(['auth','role_auth:Super Admin']);
Route::patch('/maintenance/users/update/{user_id}',[App\Http\Controllers\MaintenanceController::class, 'role_update'])->middleware(['auth','role_auth:Super Admin']);
Route::get('/maintenance/categories', [App\Http\Controllers\MaintenanceController::class, 'categories_index'])->name('maintenance.category.index')->middleware(['auth','role_auth:Super Admin']);
Route::get('/maintenance/categories/create', [App\Http\Controllers\MaintenanceController::class, 'categories_create'])->name('maintenance.category.create')->middleware(['auth','role_auth:Super Admin']);
Route::post('/maintenance/categories/', [App\Http\Controllers\MaintenanceController::class, 'categories_store'])->name('maintenance.category.store')->middleware(['auth','role_auth:Super Admin']);
Route::get('/maintenance/users', [App\Http\Controllers\MaintenanceController::class, 'index'])->name('maintenance.index')->middleware(['auth','role_auth:Super Admin']);


//Report Routes
Route::post('/reports/orders/show', [App\Http\Controllers\ReportsController::class, 'show_order_report'])->name('orderreport.show')->middleware(['auth','role_auth:Super Admin']);
Route::get('/reports/orders', [App\Http\Controllers\ReportsController::class, 'order_report_index'])->middleware(['auth','role_auth:Super Admin']);

Route::get('/reports/users/verified', [App\Http\Controllers\ReportsController::class, 'users_report_verified_index'])->middleware(['auth','role_auth:Super Admin']);
Route::post('/reports/users/verified/show', [App\Http\Controllers\ReportsController::class, 'show_users_verified_report'])->name('verifiedreport.show')->middleware(['auth','role_auth:Super Admin']);
Route::get('/reports/users/notverified', [App\Http\Controllers\ReportsController::class, 'users_report_not_verified_index'])->middleware(['auth','role_auth:Super Admin']);
Route::post('/reports/users/notverified/show', [App\Http\Controllers\ReportsController::class, 'show_users_not_verified_report'])->name('notverifiedreport.show')->middleware(['auth','role_auth:Super Admin']);
Route::get('/reports/users/purchasers', [App\Http\Controllers\ReportsController::class, 'users_report_purchasers_index'])->middleware(['auth','role_auth:Super Admin']);
Route::post('/reports/users/purchasers/show', [App\Http\Controllers\ReportsController::class, 'show_users_purchasers_report'])->name('purchasers.show')->middleware(['auth','role_auth:Super Admin']);

Route::post('/reports/stocks/show', [App\Http\Controllers\ReportsController::class, 'show_stock_report'])->name('stockreport.show')->middleware(['auth','role_auth:Super Admin']);
Route::get('/reports/stocks', [App\Http\Controllers\ReportsController::class, 'stock_report_index'])->middleware(['auth','role_auth:Super Admin']);


//404 Routes
Route::get('/{any}', function () {
    abort(404);
});



