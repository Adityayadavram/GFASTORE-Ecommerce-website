<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('index');
// });

// // Route::get('/products', [ProductController::class, 'products'])->name('products');

// Route::get('/products', [ProductController::class, 'showAll'])->name('products');

// // Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
// Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// // Route::get('/productDis', function () {    return view('productDis'); });
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



use App\Http\Controllers\CartController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('index');
});

Route::get('/products', [ProductController::class, 'showAll'])->name('products');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Email Verification Routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home'); // Redirect to the dashboard or home page
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');


// Route::middleware('auth')->group(function () {
//     Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
//     Route::post('/cart/{productId}', [CartController::class, 'store'])->name('cart.store');
//     Route::delete('/cart/{cartId}', [CartController::class, 'destroy'])->name('cart.destroy');
// });

Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/{cartId}', [CartController::class, 'removeFromCart'])->name('cart.remove');




