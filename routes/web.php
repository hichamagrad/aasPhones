<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductListController;




Route::get('/', [HomeController::class,"index"]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('product',ProductController::class);
Route::resource('category',CategoryController::class);
Route::resource('products', ProductListController::class);
Route::resource('cart', CartController::class)->only(['index', 'store', 'destroy']);
Route::post('/cart/{id}', [CartController::class, 'store'])->name('cart.store');
Route::get('/products/search', 'ProductListController@search')->name('products.search');


require __DIR__.'/auth.php';
