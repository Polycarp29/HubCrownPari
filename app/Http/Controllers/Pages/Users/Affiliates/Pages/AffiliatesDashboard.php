<?php

namespace App\Http\Controllers\Pages\Users\Affiliates\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AffiliatesDashboard extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'You have been successfully logged out');
    }

    public function fetchUsers()
    {
        $user = Auth::user();

        return [
            'name'  => $user->name,
            'email' => $user->email,
        ];
    }


    protected function usernameInitials()
    {
        $user = Auth::user();
        $parts = explode(' ', $user->name);
        $initials = '';


        if (count($parts) >= 2) {
            $initials = strtoupper(substr($parts[0], 0, 1) . substr($parts[1], 0, 1));
        } else {
            $initials = strtoupper(substr($user->name, 0, 1));
        }


        return $initials;
    }

    public function index()
    {
        $userData = $this->fetchUsers();
        $initials = $this->usernameInitials();

        return view('pages.affiliates.dashboard.dashboard', compact('userData', 'initials'));
    }
}
