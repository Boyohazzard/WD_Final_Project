<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {

    return view('home');
})->name("home");

Route::get('contact', function () {
    return view('contact');
})->name("contact");


Route::get('register', function () {
    return view('register');
})->name("register");

Route::get('login', function () {
    return view('login');
})->name("login");

Route::get('profile', function () {
    return view('profile');
})->name("profile");


Route::get('logout', function () {
    return view('logout');
})->name("logout");


Route::get('/products', [ProductController::class, 'index']);


Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'view']);
    Route::post('/cart', [CartController::class, 'add']);
    Route::delete('/cart/{product}', [CartController::class, 'remove'])->name('cart.remove');
    ;

    Route::post('/checkout', [OrderController::class, 'checkout']);
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{order}', [OrderController::class, 'show'])->can('view', 'order');

    //Route::post('/register', [UserController::class, 'checkout']);
    //Route::post('/login', [UserController::class, 'index']);
    //Route::get('/profile/{user}', [UserController::class, 'show']);
});