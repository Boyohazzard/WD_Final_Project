<?php

use Illuminate\Support\Facades\Route;

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

Route::get('cart', function () {
    return view('cart');
})->name("cart");

Route::get('orders', function () {
    return view('orders');
})->name("orders");

//Route::post('product', function () {
//    return view('product');
//})->name("product");