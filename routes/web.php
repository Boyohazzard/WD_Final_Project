<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {

    return view('home');
})->name("home");

Route::get('contact', function () {
    return view('contact');
})->name("contact");

Route::get('practice', function () {
    return view("practice");
})->name("practice");

Route::get('login', function () {
    return view('login');
})->name("login");

Route::get('logout', function () {
    return view('logout');
})->name("logout");

Route::get('products', function () {
    return view('products');
})->name("products");

Route::get('register', function () {
    return view('register');
})->name("register");

//Route::post('product', function () {
//    return view('product');
//})->name("product");

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'view']);
    Route::post('/cart', [CartController::class, 'add']);
    Route::delete('/cart/{product}', [CartController::class, 'remove']);

    Route::post('/checkout', [OrderController::class, 'checkout']);
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{order}', [OrderController::class, 'show'])->can('view', 'order');
});