<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

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

// Public Store Routes
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::post('/add-to-cart', [ProductController::class, 'addToCart'])->name('cart.add');
Route::post('/remove-from-cart', [ProductController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/checkout', [ProductController::class, 'checkout'])->name('cart.checkout');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/login', [AdminController::class, 'index'])->name('admin.login'); // Show login form
    Route::post('/login', [AdminController::class, 'login'])->name('admin.attempt_login');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::post('/products', [AdminController::class, 'addProduct'])->name('admin.products.add');
    Route::post('/products/delete', [AdminController::class, 'deleteProduct'])->name('admin.products.delete');
});

