<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calon_pkh;
use App\Models\Criteria;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = Calon_pkh::count();
        $count = Criteria::count();
        return view('dashboards.admins.dashboard.index', compact('count'));
    }
}
