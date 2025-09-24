<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;   
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\GuestbookController as AdminGuestbookController;
use App\Models\Product;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

// Guestbook public
Route::post('/guestbook', [GuestbookController::class, 'store'])->name('guestbook.store');

// ====================
// Route untuk Admin
// ====================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Kelola Produk & Kategori
    Route::resource('/products', AdminProductController::class);
    Route::resource('/categories', CategoryController::class);

    // Kelola Order
    // routes/web.php
    Route::resource('/orders', AdminOrderController::class);
    Route::post('/orders/{id}/ship', [AdminOrderController::class, 'ship'])->name('orders.ship');
    Route::post('/orders/{id}/cancel', [AdminOrderController::class, 'cancel'])->name('orders.cancel');

    // Kelola User (Customer Database)
    Route::resource('/users', UserController::class);

    // Guestbook
    Route::get('/guestbook', [AdminGuestbookController::class, 'index'])->name('guestbook.index');
    Route::delete('/guestbook/{id}', [AdminGuestbookController::class, 'destroy'])->name('guestbook.destroy');

    // Shop Approval
    Route::resource('/shops', ShopController::class);
    Route::delete('/guestbook/{id}', [GuestbookController::class, 'destroy'])
    ->middleware('auth')
    ->name('guestbook.destroy');
});

//customer
Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer/home', [CustomerController::class, 'index'])->name('customer.home');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/cart/{id}', [App\Http\Controllers\CartController::class, 'update'])
    ->name('cart.update');
    Route::get('/customer/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/customer/cart/{productId}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/customer/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    // Order / Checkout
    Route::get('/customer/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
    Route::post('/customer/checkout', [OrderController::class, 'processCheckout'])->name('orders.process');
    Route::get('/customer/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::put('/orders/{id}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');

    // Feedback
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('/feedback/{productId}', [FeedbackController::class, 'index'])->name('feedback.index');

    // daftar semua produk
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    // Untuk customer ajukan toko
    Route::get('/shops/request', [ShopController::class, 'requestForm'])->name('shops.request');
    Route::post('/shops/request', [ShopController::class, 'requestStore'])->name('shops.request.store');

    // detail produk
    Route::get('/customer/products/{id}', [ProductController::class, 'show'])->name('customer.products.show');
});
require __DIR__.'/auth.php';
