<?php


use App\Http\Controllers\BloodType\BloodController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\City\CityController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\DonationRequest\DonationRequestController;
use App\Http\Controllers\Governorate\GovernorateController;
use App\Http\Controllers\Post\PostController;

use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
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



Route::get('/', function () {
    return view('auth/login')->middleware(['guest']);
});



route::group(['middleware' => 'auth' ],function (){
   route::get('/',function (){
      return view('dashboard');

   });

    route::get('/home',function (){
        return view('dashboard');

    });
});


Auth::routes();

route::group(['middleware'=>'auth'],function (){
   route::resource('governorate',GovernorateController::class);
    route::resource('cities',CityController::class);
    route::resource('bloodtype',BloodController::class);
    route::resource('categories',CategoryController::class);
    route::resource('posts',PostController::class);
    route::resource('clients',ClientController::class);
//    Route::get('client_filter', [ClientController::class,'client_filter']);
//    Route::post('get_client_filter', [ClientController::class,'get_client_filter']);
    route::resource('donation_request',DonationRequestController::class);
    route::resource('contact',ContactController::class);
    route::resource('setting',SettingController::class);

//this is permossion
    route::resource('users',UserController::class);
    route::resource('roles',RoleController::class);

    Route::get('/get_password', [App\Http\Controllers\HomeController::class, 'get_password'])->name('get_password');
    Route::post('/change_password', [App\Http\Controllers\HomeController::class, 'change_password'])->name('change_password');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


