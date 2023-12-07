<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        $log = Log::all();
    }

    public function dashboard()
    {
        return view('dashboards.admins.dashboard.index');
    }

    public function pkh()
    {
        return view('dashboards.admins.pkh.index');
    }

    // function profile()
    // {
    //     return view('dashboards.users.profile.profile');
    // }
}
