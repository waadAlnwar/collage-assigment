<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CertificateCreate;

/* Web Routes */

Route::get('/', CertificateCreate::class);

Route::get('login', function () {
    return redirect()->to('/admin');
})->name('login');
