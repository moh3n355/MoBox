<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');



Route::get('/login', function () {
    return view('login.login');
})->name('login');


Route::get('/login/verify-phone', function () {
    return view('login.verify-phone');
})->name('verify-phone');

