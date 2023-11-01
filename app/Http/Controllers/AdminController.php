<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboards.admins.dashboard.index');
    }

    // public function user()
    // {
    //     return view('dashboards.admins.user.index');
    // } 

    // function profile()
    // {
    //     return view('dashboards.admins.profile.profile');
    // }
}
