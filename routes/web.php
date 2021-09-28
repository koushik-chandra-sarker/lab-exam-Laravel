<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => 'prevent-back-history'],function(){

    Route::get('/', [HomeController::class, 'index'])->name('Home');
    Route::get('/getcitiesbycountryid/{id}', [CountryController::class, 'showAllCityByCountryId'])->name('country.cities');
    Route::post('/post_question', [QuestionController::class, 'store'])->name('question.store');
    Route::post('/post_location', [CountryController::class, 'store'])->name('country.store');
    Route::post('/post_city', [CityController::class, 'store'])->name('city.store');
//    Route::get('/', [IndexController::class, 'index'])->name('index')->middleware('user.login.check');
//    Route::get('/user-login', [UserController::class, 'login_page'])->name("user.login.page")->middleware('redirect-if-logged-in');
//    Route::post('/user-login', [UserController::class, 'login'])->name("user.login");
//    Route::get('/user-reg', [UserController::class, 'registration_page'])->name("user.registration.page");
//    Route::post('/user-reg', [UserController::class, 'registration'])->name("user.registration");
//    Route::get("/logout", [UserController::class, 'logout'])->name('user.logout');


});
