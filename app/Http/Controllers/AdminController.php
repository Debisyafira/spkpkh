<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calon_pkh;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $count = Calon_pkh::count();
        return view('dashboards.admins.dashboard.index', compact('count'));
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
