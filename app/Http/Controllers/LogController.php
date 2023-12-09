<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::with('user')->orderBy('log_date', 'desc')->paginate(20);
        return view('log.index', compact('logs'));
    }

    public function show($id)
    {
        $log = Log::with('user')->findOrFail($id);
        return view('log.detail', compact('log'));
    }

    public function destroy(Request $request)
    {
        $log = Log::findOrFail($request->id);
        $log->delete();
        return redirect()->route('log.index')->with('success', 'Log telah dihapus!');
    }

    public function prune()
    {
        Log::truncate();
        return redirect()->route('log.index')->with('success', 'Log telah dibersihkan!');
    }
}
