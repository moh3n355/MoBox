<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');








Route::get('/auth', function () {
    return view('auth.auth');
})->name('auth');



Route::get('/login', function () {
    return view('auth.auth',[
        'type' => 'login'
     ]);
})->name('login');

Route::get('/register', function () {
    return view('auth.auth',[
        'type' => 'register'
     ]);
})->name('register');

Route::get('/forget-password', function () {
    return view('auth.auth',[
       'type' => 'forgot'
    ]);
})->name('forget');

Route::get('/verify', function () {
    return view('auth.auth',[
       'type' => 'verify'
    ]);
})->name('verify');
