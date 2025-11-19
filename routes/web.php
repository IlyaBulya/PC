<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// страница ТИПОВ (PC, Mouse, Keyboard, GPU...)
Route::get('/products', [ProductController::class, 'types'])
    ->name('products.types');

// товары по типу (например, все PC)
Route::get('/products/type/{type}', [ProductController::class, 'byType'])
    ->name('products.byType');

Route::get('/dashboard', function () {
    return view('userzone.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'destroy'])->name('profile.destroy');
});

// удалено /products/all — используем /products (types) и /products/type/{type}

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');

Route::middleware('auth')->group(function () {
    Route::post('/checkout', [CheckoutController::class, 'store'])
        ->name('checkout.store');

    Route::get('/orders', [OrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/orders/{order}', [OrderController::class, 'show'])
        ->name('orders.show');
});

require __DIR__.'/auth.php';
