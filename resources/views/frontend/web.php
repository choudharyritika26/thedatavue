<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TeamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//===============================laravel page=====================================
// Route::get('/', function () {
//     return view('welcome');
// });

//==============================frontend===============================
Route::get('/', [App\Http\Controllers\frontend\IndexController::class,'index'])->name('frontend.index');

Route::get('/about', [App\Http\Controllers\frontend\IndexController::class,'about'])->name('frontend.about');

Route::get('/faq', [App\Http\Controllers\frontend\IndexController::class,'faq'])->name('frontend.faq');

Route::get('/service', [App\Http\Controllers\frontend\IndexController::class,'service'])->name('frontend.service');

Route::get('/contact', [App\Http\Controllers\frontend\IndexController::class,'contact'])->name('frontend.contact');


//==============================Login And Register ===========================
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//=======================================admin=======================================

Route::group(['namespace' => 'admin','prefix'=>'thedatavue-admin', 'middleware' => ['auth', 'verified']], function() {
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('index', [App\Http\Controllers\admin\AdminController::class,'index'])->name('admin.index');


// ==========================Slider crud=================================
Route::get('/add-slider', [App\Http\Controllers\admin\SliderController::class,'create'])->name('add-slider');
Route::post('/store-slider', [App\Http\Controllers\admin\SliderController::class,'store'])->name('store-slider');
Route::get('/slider-index', [App\Http\Controllers\admin\SliderController::class,'index'])->name('slider-index');
Route::get('/edit-slider/{id}', [App\Http\Controllers\admin\SliderController::class,'edit'])->name('edit-slider');
Route::post('/update-slider/{id}', [App\Http\Controllers\admin\SliderController::class,'update'])->name('update-slider');
Route::delete('/delete-slider/{id}', [App\Http\Controllers\admin\SliderController::class,'destroy'])->name('destroy-slider');


//==========================About crud=================================

Route::get('/add-about', [App\Http\Controllers\admin\AboutController::class,'create'])->name('add-about');
Route::post('/store-about', [App\Http\Controllers\admin\AboutController::class,'store'])->name('store-about');
Route::get('/about-index', [App\Http\Controllers\admin\AboutController::class,'index'])->name('about-index');
Route::get('/edit-about/{id}', [App\Http\Controllers\admin\AboutController::class,'edit'])->name('edit-about');
Route::post('/update-about/{id}', [App\Http\Controllers\admin\AboutController::class,'update'])->name('update-about');
Route::delete('/delete-about/{id}', [App\Http\Controllers\admin\AboutController::class,'destroy'])->name('destroy-about');

//==========================Services crud=================================

Route::get('/add-services', [App\Http\Controllers\admin\ServicesController::class,'create'])->name('add-services');
Route::post('/store-services', [App\Http\Controllers\admin\ServicesController::class,'store'])->name('store-services');
Route::get('/services-index', [App\Http\Controllers\admin\ServicesController::class,'index'])->name('services-index');
Route::get('/edit-services/{id}', [App\Http\Controllers\admin\ServicesController::class,'edit'])->name('edit-services');
Route::post('/update-services/{id}', [App\Http\Controllers\admin\ServicesController::class,'update'])->name('update-services');
Route::delete('/delete-services/{id}', [App\Http\Controllers\admin\ServicesController::class,'destroy'])->name('destroy-services');


//==========================Portfolio crud=================================

Route::get('/add-portfolio', [App\Http\Controllers\admin\PortfolioController::class,'create'])->name('add-portfolio');
Route::post('/store-portfolio', [App\Http\Controllers\admin\PortfolioController::class,'store'])->name('store-portfolio');
Route::get('/portfolio-index', [App\Http\Controllers\admin\PortfolioController::class,'index'])->name('portfolio-index');
Route::get('/edit-portfolio/{id}', [App\Http\Controllers\admin\PortfolioController::class,'edit'])->name('edit-portfolio');
Route::post('/update-portfolio/{id}', [App\Http\Controllers\admin\PortfolioController::class,'update'])->name('update-portfolio');
Route::delete('/delete-portfolio/{id}', [App\Http\Controllers\admin\PortfolioController::class,'destroy'])->name('destroy-portfolio');


//==========================Team crud=================================

Route::get('/add-team', [App\Http\Controllers\admin\TeamController::class,'create'])->name('add-team');
Route::post('/store-team', [App\Http\Controllers\admin\TeamController::class,'store'])->name('store-team');
Route::get('/team-index', [App\Http\Controllers\admin\TeamController::class,'index'])->name('team-index');
Route::get('/edit-team/{id}', [App\Http\Controllers\admin\TeamController::class,'edit'])->name('edit-team');
Route::post('/update-team/{id}', [App\Http\Controllers\admin\TeamController::class,'update'])->name('update-team');
Route::delete('/delete-team/{id}', [App\Http\Controllers\admin\TeamController::class,'destroy'])->name('destroy-team');


//==========================Client crud=================================

Route::get('/add-client', [App\Http\Controllers\admin\ClientController::class,'create'])->name('add-client');
Route::post('/store-client', [App\Http\Controllers\admin\ClientController::class,'store'])->name('store-client');
Route::get('/client-index', [App\Http\Controllers\admin\ClientController::class,'index'])->name('client-index');
Route::get('/edit-client/{id}', [App\Http\Controllers\admin\ClientController::class,'edit'])->name('edit-client');
Route::post('/update-client/{id}', [App\Http\Controllers\admin\ClientController::class,'update'])->name('update-client');
Route::delete('/delete-client/{id}', [App\Http\Controllers\admin\ClientController::class,'destroy'])->name('destroy-client');

});