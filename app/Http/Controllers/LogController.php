<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    function index()
    {
        $logs = Log::with('user')->orderBy('log_date', 'desc')->paginate(20);
        return view('log.index', compact('logs'));
    }

    function show($id)
    {
        $log = Log::with('user')->find($id);
        return view('log.detail', compact('log'));
    }

    function destroy(Request $request)
    {
        Log::findOrFail($request->id);
        return redirect()->route('admin.log')->with('success', 'Log telah dihapus!');
    }

    function truncate()
    {
        Log::truncate();
        return redirect()->route('admin.log')->with('success', 'Log telah dibersihkan!');
    }
}
