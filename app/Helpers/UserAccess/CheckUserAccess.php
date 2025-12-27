<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('userHasAccess')) {
    function userHasAccess(string $requestedType)
    {
        $user = Auth::user();
        if (!$user) return false;

        return $user->usertypes
            ->contains(fn($type) => strtolower($type->type) === strtolower($requestedType));
    }
}
