<?php

namespace App\Http\Controllers\Pages\Users\Affiliates\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    //

    public function index(){
        return view('pages.affiliates.dashboard.dashboard');
    }
}
