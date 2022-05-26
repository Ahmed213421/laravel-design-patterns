<?php

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::group(['middleware' => 'auth:web'],function(){
    Route::get('/', function () {
        return view('admin.master');
    });
    Route::resource('categories',App\Http\Controllers\CategoryController::class);
    Route::resource('posts',App\Http\Controllers\PostController::class);
    Route::resource('tags',App\Http\Controllers\TagController::class);
    Route::resource('comments',App\Http\Controllers\Commentcontroller::class);
    
    Route::get('/pay',[App\Http\Controllers\fatoorahontroller::class,'payOrder'])->name('pay');
    
    
    Route::resource('invoices',App\Http\Controllers\InvoiceController::class);
});
Route::get('/call_back',[App\Http\Controllers\fatoorahontroller::class,'paymentCallBack'])->name('pay.call_back');
Route::get('auth/google', [App\Http\Controllers\GoogleController::class,'redirectToGoogle']);

Route::get('auth/google/callback', [App\Http\Controllers\GoogleController::class,'handleGoogleCallback']);

