<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');



Route::get('/register', function () {
    return view('auth.register');
})->name('register');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::get('/login/verify-phone', function () {
    return view('auth.verify-phone');
})->name('verify-phone');










Route::get('/auth', function () {
    return view('auth.auth');
})->name('auth');
