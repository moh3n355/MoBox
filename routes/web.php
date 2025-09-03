<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');








Route::get('/auth', function () {
    return view('auth.auth');
})->name('auth');
