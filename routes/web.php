<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::resource('admin/dashboard', ProductController::class)->middleware('auth');
Route::resource('legos', CustomerController::class);
Route::get('/search', [CustomerController::class, 'search'])->name('search');
Route::get('/admin/search', [ProductController::class, 'search'])->middleware('auth:admin')->name('admin.search');


Route::get('/login',[\App\Http\Controllers\AuthController::class,'viewLogin'])->name('login');

Route::post('/login',[\App\Http\Controllers\AuthController::class,'login']);

Route::post('/logout',[\App\Http\Controllers\AuthController::class,'logout']);

Route::get('/register',[\App\Http\Controllers\AuthController::class,'viewRegister'])->name('register');
Route::post('/register',[\App\Http\Controllers\AuthController::class,'registration']);



