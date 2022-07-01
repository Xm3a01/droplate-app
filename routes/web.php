<?php

use App\Helper\Sms;
use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Category;
use App\Helper\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Resources\OrderNotificationResource;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Dashboard\DriverController;
use App\Http\Controllers\Dashboard\Ads\AdsController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\City\CityController;
use App\Http\Controllers\Dashboard\User\UserController;
use App\Http\Controllers\Dashboard\Order\OrderController;
use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Dashboard\Region\RegionController;
use App\Http\Controllers\Dashboard\Report\ReportController;
use App\Http\Controllers\Dashboard\Product\ProductController;
use App\Http\Controllers\Dashboard\Profile\ProfileController;
use App\Http\Controllers\Dashboard\Report\DataTableController;
use App\Http\Controllers\Dashboard\Category\CategoryController;
use App\Http\Controllers\Dashboard\Employee\EmpolyeeController;
use App\Http\Controllers\Dashboard\PromoCode\PromoCodeController;
use App\Http\Controllers\Dashboard\SubCategory\SubCategoryController;

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
Auth::routes();

Route::group(['prefix' => 'admin' ,'middleware' => 'guest:admin'], function(){
 Route::get('login' , [AdminLoginController::class , 'AdminLoginForm'])->name('admin.login.form');
 Route::post('login' , [AdminLoginController::class , 'AdminLogin'])->name('admin.login');
});


Route::group(['middleware' => 'auth:admin'],function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('products', ProductController::class);
    Route::get('profile/{user}', [ProfileController::class , 'edit'])->name('profile.edit');
    Route::put('profile/{user}', [ProfileController::class , 'update'])->name('profile.update');
    Route::get('users/block/{user}', [UserController::class , 'block'])->name('users.block');
    Route::resource('employees', EmpolyeeController::class);
    Route::resource('regions', RegionController::class);
    Route::resource('cities', CityController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('sub_categories', SubCategoryController::class);
    Route::resource('orders' , OrderController::class);
    Route::resource('users' , UserController::class);
    Route::resource('drivers' , DriverController::class);
    Route::resource('promoes' , PromoCodeController::class);
    Route::resource('ads' , AdsController::class);
    Route::post('logout' , [AdminLoginController::class , 'AdminLogout'])->name('admin.logout');
    Route::get('profits', [ReportController::class, 'profitReport'])->name('profits');
    Route::get('clients', [ReportController::class, 'clientReport'])->name('clients');
    Route::get('delivery/price', [ReportController::class, 'deliveryReport'])->name('delivery.price');
    Route::get('setting', [SettingController::class , 'index'])->name('setting.index');
    Route::post('setting', [SettingController::class , 'update'])->name('setting.update');
    Route::get('conditions', [SettingController::class , 'condition'])->name('conditions.index');
    Route::post('conditions', [SettingController::class , 'condition_store'])->name('conditions.update');

    Route::get('notifications/create', [NotificationController::class , 'create'])->name('notifications.create');
    Route::post('notifications/send', [NotificationController::class , 'send'])->name('notifications.send');
});

Route::group(['prefix' => 'data-table' , 'middleware' => 'auth:admin'],function(){
    Route::get('products', [DataTableController::class , 'products'])->name('data.products');
    Route::get('categories', [DataTableController::class , 'categories'])->name('data.categories');
    Route::get('sub_categories', [DataTableController::class , 'sub_categories'])->name('data.sub_categories');
    Route::get('orders', [DataTableController::class , 'order'])->name('data.orders');
    Route::get('ads', [DataTableController::class , 'ads'])->name('data.ads');
    Route::get('promoes', [DataTableController::class , 'promoes'])->name('data.promoes');
    Route::get('cities', [DataTableController::class , 'city'])->name('data.cities');
    Route::get('regions', [DataTableController::class , 'region'])->name('data.regions');
    Route::get('empolyees', [DataTableController::class , 'employee'])->name('data.empolyee');
    Route::get('driver', [DataTableController::class , 'driver'])->name('data.driver');
    Route::get('users', [DataTableController::class , 'user'])->name('data.user');
    

   
});


Route::get('test' , function(){
    // return view('test');
    // return "hello";
    // return Sms::send('Hello' , '249116163938');
    // return Notification::send(90);
        // return "hello";
        // return Sms::send('Hello' , '09123456');
        // php artisan storage:link
        
        // $artisan = Artisan::call('storage:link');
        // $output = Artisan::output();
        // return $output;

        $user = User::first();

        $noti =  $user->unreadNotifications()->find('8539e0d5-c9be-4ce8-9e1d-7770ef2451d7');
        return new OrderNotificationResource($noti);
        $cov =  json_decode($noti);
        return $cov->data->title;
        // $notifi->markAsRead();

});
// Category::whereJsonContains('name->en' , 'En-Quinten Kihn')->get();