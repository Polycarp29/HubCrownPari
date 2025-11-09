<?php

use App\Livewire\Pages\Auth\Login;
use App\Livewire\Pages\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Auth\VerifyOTP;
use App\Livewire\Pages\Auth\ForgotPassword;
use App\Http\Controllers\Pages\Auth\GoogleController;
use App\Livewire\Pages\Onboarding\SelectAccountType;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware('guest')->group(
    function () {
        Route::get('/', Login::class)->name('login');
        Route::get('/register', Register::class)->name('register');
        Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
        Route::get('/auth/redirect/google', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
        Route::get('/auth/callback/google', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
    },


    /**
     * Route Middleware
     */

    Route::middleware('auth')->group(
        function () {
            Route::get('/onboarding', SelectAccountType::class)->name('account.type');
            Route::get('/verify_otp', VerifyOTP::class)->name('otp.verify');
            Route::middleware('email.verified')->group(
                function () {
                    //Pages after Verification
                    Route::middleware('account.type:Affiliate')->group(
                        function(){
                            // Affiliates Dashboard
                        }
                    );

                     Route::middleware('account.type:Creator')->group(
                        function(){
                            // Affiliates Dashboard
                        }
                    );

                     Route::middleware('account.type:Organization')->group(
                        function(){
                            // Affiliates Dashboard
                        }
                    );
                }
            );
        }
    ),



);
