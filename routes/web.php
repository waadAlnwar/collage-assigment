<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CertificateCreate;
use App\Http\Livewire\CertificatePay;
use App\Http\Livewire\CertificateTrack;

/* Web Routes */

Route::get(
    '/',
    function () {
        return view('front.banner');
    }
);


Route::get('/create-certificate', CertificateCreate::class)->name('create');
Route::get('/track-certificate/{ref?}', CertificateTrack::class)->name('track');
Route::get('/pay-certificate/{ref?}', CertificatePay::class)->name('pay');


Route::get('login', function () {
    return redirect()->to('/admin');
})->name('login');
