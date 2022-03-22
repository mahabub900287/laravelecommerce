<?php

use App\Http\Controllers\backend\BackendControler;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Forntend\ForntendUSerController;
use App\Http\Controllers\Forntend\ForntendUserRegistation;
use App\Http\Controllers\Forntend\FrontendController;
use App\Http\Controllers\Forntend\FrontendShopController;
use App\Http\Controllers\Forntend\FrontendUserLoginController;
use App\Http\Controllers\HomeController;
use App\Models\Banner;
use App\Models\Product;
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
Route::name('forntend.')->group(function(){
Route::get('/',[FrontendController::class,'index'])->name('home');
Route::get('/user/dashboard',[ForntendUSerController::class,'index'])->name('user.dashboard');
Route::get('/user/register',[ForntendUserRegistation::class,'register'])->name('user.register');
Route::post('/user/register',[ForntendUserRegistation::class,'store'])->name('user.store');
Route::get('/shop',[FrontendShopController::class,'shop'])->name('user.shop');
Route::get('/shop/{slug}',[FrontendShopController::class,'slow'])->name('single.shop');
});
Auth::routes();
Route::name('backend.')->group(function(){
Route::group(['middleware' => ['role_or_permission:Super Admin|Admin']], function () {
//Banner Route
Route::get('/Dasboard', [BackendControler::class,'index'])->name('home');
Route::resource('/banner',BannerController::class)->except(['show']);
Route::get('/banner/status/{banner}',[BannerController::class,'status'])->name('banner.status');
Route::get('/banner/restore/{id}',[BannerController::class,'restore'])->name('banner.restore');
Route::get('/banner/harddelete/{id}',[BannerController::class,'harddelete'])->name('banner.harddelete');
//Product Category Route
Route::resource('/category', CategoryController::class);
Route::get('/category/delete/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
Route::get('/category/status/{id}',[CategoryController::class,'status'])->name('category.status');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category/update',[CategoryController::class,'update'])->name('category.update');
Route::get('/category/restore/{id}',[CategoryController::class,'restore'])->name('category.restore');
Route::get('/category/harddelete/{id}',[CategoryController::class,'harddelete'])->name('category.harddelete');

//Product size Route
Route::resource('/size', SizeController::class)->except('show','create');
Route::resource('/color', ColorController::class)->except('show','create');
Route::resource('/product', ProductController::class);
Route::get('/product/view/{id}',[ProductController::class,'show'])->name('product.view');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
//test Route
Route::get('/test',[HomeController::class,'testroute']);
});
});
