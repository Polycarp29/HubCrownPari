<?php

namespace App\Http\Controllers\Pages\Users\Affiliates\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AffiliatesDashboard extends Controller
{
    //

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'You have been successfully logout');
    }


    public function fetchUsers()
    {
        $user= Auth::user();

        $userData = [
            'name' => $user->name,
            'email' => $user->email,
        ];


        return $userData;

    }

    public function index()
    {
        $userData = $this->fetchUsers();
        return view('pages.affiliates.dashboard.dashboard', compact('userData'));
    }
}
