<?php

namespace App\Http\Controllers;

use App\Models\Calon_pkh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;



class PkhController extends Controller
{
    public function index()
    {
        $data = Calon_pkh::get();
        // dd($data);
        return view('dashboards.admins.pkh.index', compact('data'));
    }



    public function create()
    {
        return view('dashboards.admins.pkh.add');
    }
    public function store(Request $request)
    {
        $input = Calon_pkh::insert([
            // kalau id auto increment, ga usah d tambahin disini
            'nik' => $request->nik,
            'nama' => $request->nama_lengkap,
            'alamat' => $request->alamat,
        ]);
        if ($input) {
            return redirect()->route('admin.pkh')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kembali data dengan bener');
            window.location = '" . route('admin.pkh') . "';
            </script>";
        }
    }
    public function edit(Request $req)
    {
        $data = DB::table('calon_pkhs')
            ->where('id', $req->id)
            ->first();
        // dd($data);
        return view('dashboards.admins.pkh.edit', compact('data'));
    }
    public function update(Request $request)
    {
        $update =  DB::table('calon_pkhs')
            ->where('id', $request->id)
            ->update([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'alamat' => $request->alamat
            ]);
        if ($update) {
            return redirect(route('admin.pkh'))->with('pesan', 'Data PKH berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gaga; diinput, masukkan kembali data dengan benar');
                window.location = '/dashboards.admins.pkh.index';
                </script>";
        }
    }
    public function destroy(Request $req)
    {

        $data = Calon_pkh::findOrFail($req->id); //ganti dengan model dan nama tabel yang sesuai
        $data->delete();
        return json_encode([
            'status' => 'success'
        ]);
        // return redirect()->route('admin.pkh')->with('success', 'Data PKH berhasil dihapus');
    }
}
