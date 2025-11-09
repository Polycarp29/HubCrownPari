<?php

use App\Livewire\Pages\Auth\Login;
use App\Livewire\Pages\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Auth\VerifyOTP;
use App\Livewire\Pages\Auth\ForgotPassword;
use App\Livewire\Pages\Onboarding\SelectAccountType;
use App\Http\Controllers\Pages\Auth\GoogleController;
use App\Http\Controllers\Pages\Users\Affiliates\Pages\Dashboard;

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
                    Route::middleware('account.type:Affiliates')->group(
                        function () {
                            // Affiliates Dashboard
                            Route::get('/affiliate', [Dashboard::class, 'index'])->name('affiliates.dashboard');
                        }
                    );

                    Route::middleware('account.type:Creators')->group(
                        function () {
                            // Creators Dashboard
                            Route::get('/creators', [Dashboard::class, 'index'])->name('creators.dashboard');
                        }
                    );

                    Route::middleware('account.type:Organizations')->group(
                        function () {
                            // Organization Dashboard
                            Route::get('/organization', [Dashboard::class, 'index'])->name('organizations.dashboard');
                        }
                    );


                    Route::middleware('account.type:Admin')->group(
                        function () {
                            // Admin Dashboard
                        }
                    );
                }
            );
        }
    ),



);
