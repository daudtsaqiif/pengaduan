<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Category;

Route::get('/', [App\Http\Controllers\UserController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function() {
    Route::get("/index", [AdminController::class, "index"])->name('index');
    Route::put("/status/{id}", [AdminController::class, "status"])->name('status');
    Route::put("/reply/{id}", [AdminController::class, "reply"])->name('reply');
    Route::delete("/delete/{id}", [AdminController::class, "delete"])->name('delete');
    Route::resource("/category", Category::class);
});

Route::name('user.')->prefix('user')->group(function() {
    Route::get('/index', [UserController::class, 'index'])->name('index');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::post('/requestcategory', [UserController::class, 'requestCategory'])->name('category');
});

Route::get('/artisan-call', function(){
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return 'success';
});
