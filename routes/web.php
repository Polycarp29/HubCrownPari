<?php

use App\Livewire\Pages\Auth\Login;
use App\Livewire\Pages\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Auth\VerifyOTP;
use App\Livewire\Pages\Auth\ForgotPassword;
use App\Http\Controllers\Pages\Auth\AuthController;
use App\Livewire\Pages\Onboarding\SelectAccountType;
use App\Http\Controllers\Pages\Auth\GoogleController;
use App\Http\Controllers\Pages\Users\General\Profile;
use App\Http\Controllers\Pages\Users\Creators\Pages\CreatorsDashboard;
use App\Http\Controllers\Pages\Users\Affiliates\Pages\AffiliatesDashboard;
use App\Http\Controllers\Pages\Users\Organizations\Pages\OrganizationDashboard;
use App\Livewire\Pages\User\Profile\ProfileWidgets;

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
    Route::post('/logout', [AffiliatesDashboard::class, 'logout'])->name('system.logout');
    
    // Email verified routes
    Route::middleware('email.verified')->group(function () {

        // General Routes
        Route::get('/profile', ProfileWidgets::class)->name('profile.view');
        
        // Affiliates
        Route::middleware('account.type:Affiliates')->group(function () {
            Route::get('/affiliate', [AffiliatesDashboard::class, 'index'])->name('affiliates.dashboard');
            
        });

        // Creators
        Route::middleware('account.type:Creators')->group(function () {
            Route::get('/creators', [CreatorsDashboard::class, 'index'])->name('creators.dashboard');
        });

        // Organizations
        Route::middleware('account.type:Organizations')->group(function () {
            Route::get('/organization', [OrganizationDashboard::class, 'index'])->name('organization.dashboard');
        });

        // Admin
        // Route::middleware('account.type:Admin')->group(function () {
        //     Route::get('/admin', [Dashboard::class, 'index'])->name('admin.dashboard');
        // });
    });
});