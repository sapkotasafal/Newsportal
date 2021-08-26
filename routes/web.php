<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CkeditorFileUploadController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\SocialController;

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


Route::get('/',[FrontEndController::class,'index'])->name('index');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/news/{slug}',[FrontEndController::class,'newsSingle'])->name('newsSingle');


Route::get('/forget-password',[AdminController::class,'forgetpassword'])->name('forgetpassword');

Route::prefix('/admin')->group(function(){
    // Admin Login
    Route::match(['get','post'],'/login',[AdminController::class,'adminLogin'])->name('adminLogin');
    Route::group(['middleware'=>'admin'],function () {
         // Admin Dashboard
    Route::get('/dashboard',[AdminController::class,'adminDashboard'])->name('adminDashboard');
    // Admin Profile
    Route::get('/profile',[AdminController::class,'profile'])->name('profile');
    // Admin profile update
    Route::post('/profile/update/{id}',[AdminController::class,'profileUpdate'])->name('profileUpdate');
    // Chanage Password
    Route::get('/profile/change_password',[AdminController::class,'changePassword'])->name('changePassword');
    // check user password
    Route::post('/profile/check-password',[AdminController::class,'checkUserPassword'])->name('checkUserPassword');
    // update admin password
    Route::post('profile/update-password/{id}',[AdminController::class,'updatePassword'])->name('updatePassword');

    // Category
    Route::get('/category/index',[CategoryController::class,'index'])->name('category.index');
    Route::get('/category/add',[CategoryController::class,'add'])->name('category.add');
    Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('/delete-category/{id}',[CategoryController::class,'delete'])->name('category.delete');

    // News

    Route::get('/news/index',[NewsController::class,'index'])->name('news.index');
    Route::get('/news/add',[NewsController::class,'add'])->name('news.add');
    Route::post('/news/store',[NewsController::class,'store'])->name('news.store');
    Route::get('/news/edit/{id}',[NewsController::class,'edit'])->name('news.edit');
    Route::post('/news/update/{id}',[NewsController::class,'update'])->name('news.update');
    Route::get('/delete-news/{id}',[NewsController::class,'delete'])->name('news.delete');


    // Ck editor
    Route::post('ckeditor', [CkeditorFileUploadController::class,'store'])->name('ckeditor.upload');

    // Social Media Setting
    Route::get('/social/setting',[SocialController::class,'social'])->name('social');
    Route::post('/social/setting/{id}',[SocialController::class,'socialUpdate'])->name('socialUpdate');

    // Theme Settings
    Route::get('/theme', [ThemeController::class,'theme'])->name('theme');
    Route::post('/theme/update/{id}',[ThemeController::class,'themeUpdate'])->name('themeUpdate');



    });
    Route::get('/admin/logout',[AdminController::class,'adminLogout'])->name('adminLogout');

});

