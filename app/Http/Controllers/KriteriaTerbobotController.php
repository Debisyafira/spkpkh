<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\kriteria_terbobot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaTerbobotController extends Controller
{
    public function index()
    {
        $data = Kriteria_terbobot::get();

        // dd($data);
        return view('dashboards.admins.kriteria_terbobot.index', compact('data'));
    }

    public function create()
    {
        
        $criterias = Criteria::leftJoin('kriteria_terbobots', function ($join) {
            $join->on('criterias.id', '=', 'kriteria_terbobots.criteria_id');
        })
        ->whereNull('kriteria_terbobots.criteria_id')
        ->select('criterias.*')
        ->get();
        dd($criterias);
        return view('dashboards.admins.kriteria_terbobot.add', compact('criterias'));
    }

    public function store(Request $request)
    {
        $input = Kriteria_terbobot::insert([
            // kalau id auto increment, ga usah d tambahin disini
            'kode' => $request->kode,
            'name' => $request->name,
            'bobot' => $request->bobot,
            'type' => $request->type,
        ]);
        if ($input) {
            return redirect()->route('admin.kriteria_terbobot')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kembali data dengan bener');
            window.location = '".route('admin.kriteria_terbobot')."';
            </script>";
        }
    }

    public function edit(Request $req)
    {
        $data = DB::table('kriteria_bobot')
            ->where('id', $req->id)
            ->first();

        // dd($data);
        return view('dashboards.admins.kriteria_terbobot.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $update = DB::table('kriteria_terbobot')
            ->where('id', $request->id)
            ->update([
                'kode' => $request->kode,
                'name' => $request->nama,
                'bobot' => $request->bobot,
                'type' => $request->type,
            ]);
        if ($update) {
            return redirect(route('admin.kriteria_terbobot'))->with('pesan', 'Data Kriteria berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gaga; diinput, masukkan kembali data dengan benar');
                window.location = '/dashboards.admins.kriteria_terbobot.index';
                </script>";
        }
    }

    public function destroy(Request $req)
    {
        $data = Kriteria_terbobot::findOrFail($req->id); // ganti dengan model dan nama tabel yang sesuai
        $data->delete();

        return json_encode([
            'status' => 'success',
        ]);
        // return redirect()->route('admin.pkh')->with('success', 'Data PKH berhasil dihapus');
    }
}
