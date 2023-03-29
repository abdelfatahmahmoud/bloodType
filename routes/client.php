<?php


use App\Http\Controllers\FrontEnd\auth\LoginController;


use App\Http\Controllers\FrontEnd\Contact\ContactController;
use App\Http\Controllers\FrontEnd\Fav\FavoritePostController;
use App\Http\Controllers\FrontEnd\How\HowAreController;
use App\Http\Controllers\FrontEnd\Post\PostController;
use App\Http\Controllers\FrontEnd\Request\DonationRequestController;
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

Route::post('favorite-add', [FavoritePostCOntroller::class, 'favoriteAdd'])->name('favorite.add');
Route::delete('favorite-remove/{id}', [FavoritePostCOntroller::class, 'favoriteRemove'])->name('favorite.remove');


//Route::get('/blood_type', [App\Http\Controllers\FrontEnd\HomeController::class, 'blood_type'])->name('blood_type');
//
route::resource('register',LoginController::class);
route::get('get_login',[LoginController::class,'getLogin'])->name('auth')->middleware('guest');
route::post('signin',[LoginController::class,'login_client'])->name('signin');
route::post('logout',[LoginController::class,'logout_client'])->name('logout');


//Route::get('/blood_type', [App\Http\Controllers\FrontEnd\HomeController::class, 'get_data'])->name('blood_type');
route::resource('article',PostController::class);
route::resource('contacts_us',ContactController::class);
route::get('about',[ContactController::class,'about']);
route::resource('how_are',HowAreController::class);
//route::post('favorite',[App\Http\Controllers\PostController::class,'postFavouriteClient']);
route::post('search',[App\Http\Controllers\FrontEnd\HomeController::class,'search'])->name('search');
Route::get('/index', [App\Http\Controllers\FrontEnd\HomeController::class, 'index'])->name('index');

//this middle ware at routes
route::group(['middleware'=>'auth:client'],function (){

       route::resource('donation_requests',DonationRequestController::class);

//    route::get('/people/simple',[DonationRequestController::class,'simple'])->name('simple_search');
//    Route::get('/people/simple', 'SearchController@simple')->name('simple_search');
});



