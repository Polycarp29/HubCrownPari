<?php

use Illuminate\Support\Facades\Auth;

/**
 * Universal access checker
 *
 */
if (!function_exists('userHasAccess')) {
    function userHasAccess($accessType){
        return app(App\Services\UserAccess\CheckUserAccessType::class)->checkUserValidity($accessType);
    }
}
