<?php

use App\Models\PromCode;
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
use App\Http\Controllers\Api\ComplaintController;
use App\Http\Controllers\Api\ConditionController;
use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Auth\DriverAuthController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\Product\OrderController;
use App\Http\Controllers\Api\Review\ReviewController;
use App\Http\Controllers\Api\Product\ProductController;
use App\Http\Controllers\Api\Favorite\FavoriteController;
use App\Http\Controllers\Api\PromoCode\PromoCodeController;
use App\Models\SubCategory;

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

Route::group(['middleware' => 'optional_auth'] , function() {

    Route::get('products' , [ProductController::class ,'index'])->name('product.index');
    Route::get('products/{product}' , [ProductController::class ,'show'])->name('product.show');
    Route::get('brands' , [CategoryController::class ,'brand'])->name('brand');
    Route::get('categories' , [CategoryController::class ,'index'])->name('categories.index');
    Route::get('categories/{category}' , [CategoryController::class ,'show'])->name('categories.show');
    Route::get('best/brands' , [SubCategoryController::class , 'bestBrand'])->name('best.brands');
    Route::get('sub_categories' , [SubCategoryController::class ,'index'])->name('sub_categories');
    Route::get('sub_categories/{sub_category}' , [SubCategoryController::class ,'show'])->name('sub_categories.show');
    Route::get('regions' , [RegionController::class ,'index'])->name('regions.index');
    Route::get('regions/{region}' , [RegionController::class ,'show'])->name('regions.show');
    Route::get('cities' , [CityController::class ,'index'])->name('cities.index');
    Route::get('cities/{city}' , [CityController::class ,'show'])->name('cities.show');
    Route::get('conditions' , [ConditionController::class ,'condition'])->name('conditions');
});

Route::group(['middleware' => 'auth:sanctum'] , function() {

    Route::get('profile' , [UserController::class , 'show'])->name('profile.show');
    Route::post('profile' , [UserController::class , 'update'])->name('profile.update');
    Route::put('change/password/{user}' , [UserController::class , 'change_password'])->name('change.password');

    Route::get('favorites' , [FavoriteController::class , 'index'])->name('favorites.index');
    Route::get('notify' , [NotificationController::class , 'index'])->name('notify');
    Route::get('promoCode' , [PromoCodeController::class , 'getPromo'])->name('promo.code');
    Route::post('add/to/favorites/{product}' , [FavoriteController::class , 'add_to_favorite'])->name('add.favorite');
    Route::post('review/create/{product}' , [ReviewController::class , 'add_review'])->name('reviews.create');
    Route::get('reviews/{product_id}' , [ReviewController::class , 'show'])->name('reviews.show');
    Route::get('reviews/rate' , [ReviewController::class , 'rate'])->name('reviews.rate');
    Route::get('orders/done' , [OrderController::class , 'order_done'])->name('order_done');
    Route::get('orders/inprogress' , [OrderController::class , 'order_inProgress'])->name('order_inProgress');
    Route::get('orders/cancel' , [OrderController::class , 'order_canceled'])->name('order_canceled');
    Route::get('orders' , [OrderController::class , 'index'])->name('order.indx');
    Route::post('orders/status/{order}' , [OrderController::class , 'order_status'])->name('orders.status');
    Route::post('orders/payed/{order}' , [OrderController::class , 'order_payed']);
    Route::post('orders' , [OrderController::class , 'store']);
    Route::post('add/complaint' , [ComplaintController::class , 'store']);
    Route::post('logout' , [LoginController::class ,'apiLogout'])->name('logout');
   });

Route::group(['middleware' => 'guest:sanctum'] , function() {
    Route::post('register' , [RegisterController::class , 'create'])->name('register');
    Route::post('login' , [LoginController::class , 'login'])->name('login');
    Route::post('reset/password' , [UserController::class , 'reset_password'])->name('reset.password');
    Route::post('reset/password/otp/check' , [UserController::class , 'reset_password_otp_check'])->name('reset.password.otp');
    Route::post('new/password' , [UserController::class , 'new_password'])->name('new.password');
    Route::post('otp-generate' , [RegisterController::class , 'generate'])->name('otp.generate');
    Route::post('otp-check' , [RegisterController::class , 'check'])->name('otp.check');

    Route::post('social/register' , [SocialAuthController::class , 'create'])->name('social.register');
    Route::post('social/login' , [SocialAuthController::class , 'login'])->name('social.login');

    Route::post('driver/register' , [DriverAuthController::class , 'create'])->name('social.register');
    Route::post('driver/login' , [DriverAuthController::class , 'login'])->name('social.login');


    Route::post('driver/otp-generate' , [DriverAuthController::class , 'generate'])->name('driver.otp.generate');
    Route::post('driver/otp-check' , [DriverAuthController::class , 'check'])->name('driver.otp.check');


});

Route::group(['prefix'=>'filter' , 'middleware' => 'optional_auth'] , function() {
    Route::get('products' , [ProductController::class ,'filter'])->name('product.filter');
    Route::get('category' , [CategoryController::class ,'filter'])->name('category.filter');
    Route::get('sub_category' , [SubCategoryController::class ,'filter'])->name('sub_category.filter');
    Route::get('regions' , [RegionController::class ,'filter'])->name('regions.filter');
    Route::get('cities' , [CityController::class ,'filter'])->name('cities.filter');
});


Route::group(['prefix'=>'carts' , 'middleware' => 'auth:sanctum'] , function() {
    Route::get('/' , [CartController::class ,'index'])->name('carts.index');
    Route::post('add' , [CartController::class ,'add'])->name('carts.add');
    Route::put('update/{id}' , [CartController::class ,'update'])->name('carts.update');
    Route::get('remove/{id}' , [CartController::class ,'remove'])->name('carts.remove');
    Route::get('clear' , [CartController::class ,'clear'])->name('carts.remove');
});

Route::get('ads' , [AdsController::class ,'index'])->name('ads');

Route::group(['prefix'=>'driver' , 'middleware' => 'auth:sanctum'] , function() {
    Route::get('notify' , [DriverController::class , 'index'])->name('notify');
    Route::get('history' , [DriverController::class , 'history'])->name('history');
    Route::get('orders' , [DriverController::class , 'order'])->name('order');
    Route::post('confirm/{id}' , [DriverController::class , 'confirm'])->name('confirm');
    Route::post('delivered/{id}' , [DriverController::class , 'delivered'])->name('delivered');
});
Route::get('test' , function(){
    return PromCode::all();
});

Route::post('test' , function(Request $request){
    return SubCategory::where('category_id' , $request->id)->get();
});





