<?php

use Illuminate\Support\Facades\Route;

/* Web Routes */

Route::get('/', function () {
    return view('register');
});

Route::get('login', function () {
    return redirect()->to('/admin');
})->name('login');
