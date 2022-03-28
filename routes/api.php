<?php

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Api\Ads\AdsController;
use App\Http\Controllers\Api\Otp\OtpController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\Product\OrderController;
use App\Http\Controllers\Api\Review\ReviewController;
use App\Http\Controllers\Api\Product\ProductController;
use App\Http\Controllers\Api\Favorite\FavoriteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:sanctum'] , function() {

    Route::get('profile' , [UserController::class , 'show'])->name('profile.show');
    Route::put('profile' , [UserController::class , 'update'])->name('profile.update');
    Route::put('change/password/{user}' , [UserController::class , 'change_password'])->name('change.password');
    
    Route::get('favorites' , [FavoriteController::class , 'index'])->name('favorites.index');
    Route::post('add/to/favorites/{product}' , [FavoriteController::class , 'add_to_favorite'])->name('add.favorite');
    Route::post('review/create/{product}' , [ReviewController::class , 'add_review'])->name('add.favorite');
    Route::get('orders/done' , [OrderController::class , 'order_done'])->name('order_done');
    Route::get('orders/inprogress' , [OrderController::class , 'order_inProgress'])->name('order_inProgress');
    Route::get('orders/cancel' , [OrderController::class , 'order_canceled'])->name('order_canceled');
    Route::get('orders' , [OrderController::class , 'index'])->name('order.indx');
    Route::post('orders/status/{order}' , [OrderController::class , 'order_status'])->name('orders.status');
    Route::post('orders' , [OrderController::class , 'store']);
    Route::get('products' , [ProductController::class ,'index'])->name('product.index');
    Route::get('products/{product}' , [ProductController::class ,'show'])->name('product.show');
    Route::get('brands' , [CategoryController::class ,'brand'])->name('brand');
    Route::get('categories' , [CategoryController::class ,'index'])->name('categories.index');
    Route::get('categories/{category}' , [CategoryController::class ,'show'])->name('categories.show');
    Route::get('best/brands' , [SubCategoryController::class , 'bestBrand'])->name('favorites.index');
    Route::get('sub_categories' , [SubCategoryController::class ,'index'])->name('best.brands');
    Route::get('sub_categories/{sub_category}' , [SubCategoryController::class ,'show'])->name('sub_categories.show');
    Route::get('regions' , [RegionController::class ,'index'])->name('regions.index');
    Route::get('regions/{region}' , [RegionController::class ,'show'])->name('regions.show');
    Route::get('cities' , [CityController::class ,'index'])->name('cities.index');
    Route::get('cities/{city}' , [CityController::class ,'show'])->name('cities.show');
    Route::get('logout' , [LoginController::class ,'apiLogout'])->name('logout');

    Route::get('test' , function(){
        // return Auth::guard('sanctum')->user();
    });
   });

Route::group(['middleware' => 'guest:sanctum'] , function() {
    Route::post('register' , [RegisterController::class , 'create'])->name('register');
    Route::post('login' , [LoginController::class , 'login'])->name('login');
    Route::post('reset/password' , [UserController::class , 'reset_password'])->name('reset.password');
    Route::post('reset/password/otp/check' , [UserController::class , 'reset_password_otp_check'])->name('reset.password.otp');
    Route::post('new/password' , [UserController::class , 'new_password'])->name('new.password');
    Route::post('otp-generate' , [RegisterController::class , 'generate'])->name('otp.generate');   
    Route::post('otp-check' , [RegisterController::class , 'check'])->name('otp.check'); 
    // new/password  
});

Route::group(['prefix'=>'filter' , 'middleware' => 'auth:sanctum'] , function() {
    Route::get('products' , [ProductController::class ,'filter'])->name('product.filter');
    Route::get('category' , [CategoryController::class ,'filter'])->name('category.filter');
    Route::get('sub_category' , [SubCategoryController::class ,'filter'])->name('sub_category.filter');
    Route::get('regions' , [RegionController::class ,'filter'])->name('regions.filter');
    Route::get('cities' , [CityController::class ,'filter'])->name('cities.filter');
});


Route::group(['prefix'=>'carts' , 'middleware' => 'auth:sanctum'] , function() {
    Route::get('/' , [CartController::class ,'index'])->name('carts.index');
    Route::post('add' , [CartController::class ,'add'])->name('carts.add');
    Route::get('remove/{id}' , [CartController::class ,'remove'])->name('carts.remove');
    Route::get('clear' , [CartController::class ,'clear'])->name('carts.remove');
    // Route::get('cities' , [CityController::class ,'filter'])->name('cities.filter');
});

Route::get('ads' , [AdsController::class ,'index'])->name('ads');


