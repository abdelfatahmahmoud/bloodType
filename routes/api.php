<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationRequestController;
use App\Http\Controllers\GoverrnoateController;
use App\Http\Controllers\NotifecationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//confirm new register and login api method post
route::group(['namespace'=>'auth','prefix'=>'auth'],function (){
    route::post('login',[AuthController::class,'login']);
    route::post('register',[AuthController::class,'register']);
    route::post('rest_password',[AuthController::class,'rest_password']);
    route::post('new_password',[AuthController::class,'new_password']);
});
//multi auth api
route::group(['middleware'=>'auth:api'],function (){

    route::get('allPosts',[PostController::class,'allPosts']);
   route::get('posts',[PostController::class,'posts']);
    route::post('post_favourite',[PostController::class,'postFavouriteClient']);
    route::post('my_favourite',[PostController::class,'my_favourite']);
    route::get('category',[CategoryController::class,'category']);
    route::post('donation_request_create',[DonationRequestController::class,'donationRequestCreate']);
    route::get('donation_request',[DonationRequestController::class,'donation_request']);
    route::get('contact',[ContactController::class,'contact']);
    route::get('settings',[SettingController::class,'settings']);
    route::get('view_notification_setting',[NotifecationController::class,'view_notification_setting']);
    route::post('update_notification_setting',[NotifecationController::class,'update_notification_setting']);
    route::post('registerToken',[TokenController::class,'registerToken']);
    route::post('removeToken',[TokenController::class,'removeToken']);

});

route::get('governorate',[GoverrnoateController::class,'index']);
route::get('cities',[GoverrnoateController::class,'city']);
