<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
        return view('home');
    })->name('home');

Route::get('/auth/{type}', function ($type) {
    $allowed = [
        'login'    => 'login',
        'register' => 'register',
        'forgot'   => 'forgot',
        'verify'   => 'verify',
    ];

    if (! array_key_exists($type, $allowed)) {
        abort(404);
    }

    return view('auth.auth', ['type' => $type]);
})->name('auth.dynamic');

Route::get('/auth', function () {
    return view('auth.auth');
})->name('auth');



