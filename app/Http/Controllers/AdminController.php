<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use Illuminate\Http\Request;
use App\Models\Calon_pkh;
use App\Models\Log;
use App\Models\User;

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

    public function users()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->role = RoleEnum::from($request->role);
        $user->save();

        return redirect()->route('admin.user')->with('success', 'Role telah diperbarui!');
    }

    function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return redirect()->route('user.index');
    }
    
    // function profile()
    // {
    //     return view('dashboards.admins.profile.profile');
    // }
}
