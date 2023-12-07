<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calon_pkh;
use App\Models\Criteria;
use Illuminate\Support\Facades\Gate;

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
        if (Gate::allows('isAdmin')) {
            $count = Calon_pkh::count();
            return view('dashboard.index', compact('count'));
        }

        $count = Calon_pkh::count();
        $count = Criteria::count();
        return view('dashboard.index', compact('count'));
    }
}
