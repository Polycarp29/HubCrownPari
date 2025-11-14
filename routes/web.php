<?php

use App\Livewire\Pages\Auth\Login;
use App\Livewire\Pages\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Auth\VerifyOTP;
use App\Livewire\Pages\Auth\ForgotPassword;
use App\Livewire\Pages\Onboarding\SelectAccountType;
use App\Http\Controllers\Pages\Auth\GoogleController;
use App\Http\Controllers\Pages\Auth\AuthController;
use App\Http\Controllers\Pages\Users\Affiliates\Pages\Dashboard;

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
    Route::get('/auth/redirect/google', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('/auth/callback/google', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/onboarding', SelectAccountType::class)->name('account.type');
    Route::get('/verify_otp', VerifyOTP::class)->name('otp.verify');
    Route::post('/logout', [Dashboard::class, 'logout'])->name('system.logout');
    
    // Email verified routes
    Route::middleware('email.verified')->group(function () {
        
        // Affiliates
        Route::middleware('account.type:Affiliates')->group(function () {
            Route::get('/affiliate', [Dashboard::class, 'index'])->name('affiliates.dashboard');
        });

        // Creators
        Route::middleware('account.type:Creators')->group(function () {
            Route::get('/creators', [Dashboard::class, 'index'])->name('creators.dashboard');
        });

        // Organizations
        Route::middleware('account.type:Organizations')->group(function () {
            Route::get('/organization', [Dashboard::class, 'index'])->name('organization.dashboard');
        });

        // Admin
        // Route::middleware('account.type:Admin')->group(function () {
        //     Route::get('/admin', [Dashboard::class, 'index'])->name('admin.dashboard');
        // });
    });
});