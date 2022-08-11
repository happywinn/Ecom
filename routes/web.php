<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BrandController;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;

use App\Http\Controllers\CouponsController;
use App\Http\Controllers\GoogleAuthController;


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


// Index Page Route 
Route::get('/',[FrontendController::class,'index'])->name('home');






Auth::routes();
// Cart Routes
Route::get('load-cart-data',[CartController::class,'cartcount']);
Route::post('/add-to-cart',[CartController::class,'addProduct']);
Route::post('update-cart',[CartController::class,'updatecart']);
Route::post('/delete-cart-item',[CartController::class,'deleteProduct']);
Route::post('/delete-cart-all',[CartController::class,'deleteProductAll']);

// Wishlist Routes
Route::post('add-to-wishlist',[WishlistController::class,'add']);
// Route::post('add_to_wishlist/{id}',[WishlistController::class,'addIndex']);
Route::post('delete-wishlist-item',[WishlistController::class,'deleteitem']);
Route::post('/delete-wish-all',[WishlistController::class,'deleteWishlistAll']);
Route::get('load-wishlist-count',[WishlistController::class,'wishcount']);


// Search Routes
Route::get('product-list',[FrontendController::class, 'productlistAjax']);
Route::post('searched-products',[FrontendController::class, 'searchProduct'])->name('search.product');


//Collections Route
Route::get('/collections',[FrontendController::class,'collection'])->name('home.collection');

// Collectons__items Routes
Route::get('collections/{item}',[FrontendController::class,'sidebarCategory'])->name('home.items');

Route::get('collections/{category}/{sub}',[FrontendController::class,'subCategory'])->name('home.subitems');

//Item Details Route
Route::get('collections/{cate_name}/{prod_type}/{prod_name}',[FrontendController::class,'productview'])->name('home.itemdetail');


//Client-side Brand route
Route::post('brand-check',[FrontendController::class,'brandCheck'])->name('brand.check');

/*  routes တွေကို group တခုအတွင်းမှာ middleware ကို assign လုပ်ဖို့,
middleware() method ကိုသုံးနိုင် ...
array ထဲမှာ သုံးချင်တဲ့ middleware တွေကို define လုပ်ပေးရမယ် ... 
*/

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    Route::get('cart',[CartController::class,'viewcart'])->name('cart.index');
    Route::get('checkout',[CheckoutController::class,'index'])->name('checkout.index');
    Route::post('place-order',[CheckoutController::class,'placeorder']);

    Route::get('my-orders',[UserController::class,'index'])->name('order.index');
    Route::delete('my-orders/{id}',[UserController::class,'destroy'])->name('order.destroy');
    // Route::get('my-orders/{id}', function() {
    //     return abort('404');
    // })->where('any', '.*');
    
    Route::get('view-order/{id}',[UserController::class,'view']);  

    Route::get('wishlist',[WishlistController::class,'index']);
    Route::post('add-rating',[RatingController::class,'add']);

    Route::get('add-review/{prod_name}/userreview',[ReviewController::class,'add']);
    Route::post('add-review',[ReviewController::class,'create']);


    Route::get('edit-review/{prod_name}/userreview',[ReviewController::class,'edit']);
    Route::put('update-review',[ReviewController::class,'update']);

    //Route::get('filterprice',[FrontendController::class,'filterPrice'])->name('price.filter');



//Profile route
    //Route::get('account/{id}',[UserController::class,'profile'])->name('user.profile');
    Route::get('account',[UserController::class,'profile'])->name('user.profile');
    // Route::get('account/settings/{id}',[UserController::class,'settings'])->name('user.settings');
    Route::get('account/{sub}',[UserController::class,'settings'])->name('user.settings');
    Route::post('account-update',[UserController::class,'update'])->name('user.update');

    
//Coupons route
    Route::post('/coupon',[CouponsController::class,'store'])->name('coupon.store');
    Route::delete('/coupon',[CouponsController::class,'destroy'])->name('coupon.destroy');
});




// Admin User Routes
Route::middleware(['auth','isAdmin'])->group(function () {

    Route::get('/dashboard','Admin\FrontendController@index');

    // Category route
    Route::get('categories','Admin\CategoryController@index');
    Route::get('add-category','Admin\CategoryController@add');
    Route::post('insert-category','Admin\CategoryController@insert');
    Route::get('edit-category/{id}','Admin\CategoryController@edit');
    Route::post('update-category/{id}','Admin\CategoryController@update');
    Route::get('delete-category/{id}','Admin\CategoryController@delete');


    // Product route
    Route::get('products',[ProductController::class,'index']);
    Route::get('add-product',[ProductController::class,'add']);
    Route::post('insert-product',[ProductController::class,'insert']);
    Route::get('edit-product/{id}',[ProductController::class,'edit']);
    Route::post('update-product/{id}',[ProductController::class,'update']);
    Route::get('delete-product/{id}',[ProductController::class,'delete']);


    //Brand route
    Route::get('brands',[BrandController::class,'index']);
    Route::get('add-brand',[BrandController::class,'add']);
    Route::post('insert-brand',[BrandController::class,'insert']);
    Route::get('edit-brand/{id}',[BrandController::class,'edit']);
    Route::post('update-brand/{id}',[BrandController::class,'update']);
    Route::get('delete-brand/{id}',[BrandController::class,'delete']);


    //Coupon route
    Route::get('coupons',[CouponsController::class,'coupons']);
    Route::get('add-coupon',[CouponsController::class,'add']);
    Route::post('insert-coupon',[CouponsController::class,'insert']);
    Route::get('edit-coupon/{id}',[CouponsController::class,'edit']);
    Route::post('update-coupon/{id}',[CouponsController::class,'update']);
    Route::get('delete-coupon/{id}',[CouponsController::class,'delete']);



    // Order Route
    Route::get('orders',[OrderController::class,'index']);
    Route::get('admin/view-order/{id}',[OrderController::class,'view']);
    Route::put('update-order/{id}',[OrderController::class,'updateorder']);
    Route::get('order-history',[OrderController::class,'orderhistory']);

    // User Route
    Route::get('users',[DashboardController::class,'users']);
    Route::get('view-user/{id}',[DashboardController::class,'viewuser']);
    Route::post('user/{id}',[DashboardController::class,'deleteuser']);
});


//Google Auth
Route::get('auth/google',[GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back',[GoogleAuthController::class, 'callbackGoogle']);


//Thank you

Route::view('/thankyou','frontend.thankyou');


Route::fallback( function () {
    abort( 404 );
} );