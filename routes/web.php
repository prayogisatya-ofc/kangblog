<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])
        ->name('admin.dashboard');
        
    Route::get('categories/serverside', [CategoryController::class, 'serverside'])
        ->name('admin.categories.serverside');
    Route::resource('categories', CategoryController::class)
        ->names('admin.categories')
        ->except('create', 'edit');
});

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
