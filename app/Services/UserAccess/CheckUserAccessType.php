<?php

namespace App\Services\UserAccess;

use Illuminate\Support\Facades\Auth;

class CheckUserAccessType
{



    public function checkUserValidity($userType)
    {

        $user = Auth::user();

        if (!$user) {
            return false;
        }

        // Normalize both stored and requested types for a reliable match
        $normalizedUserTypes = $user->usertypes
            ->pluck('user_type_name')
            ->map(fn($type) => strtolower(trim($type)));

        return $normalizedUserTypes->contains(strtolower(trim($userType)));
    }
}
