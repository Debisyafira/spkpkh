<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use Illuminate\Http\Request;
use App\Models\Calon_pkh;
use App\Models\Log;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function add(){
        return view('users.add');   
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' =>$request->email,
            'role' => RoleEnum::from($request->role),
            'password'=> Hash::make($request->password),
        ]);

        return redirect()->route('admin.user')->with('success', 'User telah di tambahkan');

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
        $user->name = $request->name;
        $user->save();

        return redirect()->route('admin.user')->with('success', 'Role telah diperbarui!');
    }

    function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return redirect()->route('users.index');
    }

    
    // function profile()
    // {
    //     return view('dashboards.admins.profile.profile');
    // }
}
