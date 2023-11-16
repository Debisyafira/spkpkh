<?php

namespace App\Http\Controllers;

use App\Models\Calon_pkh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
            window.location = '".route('admin.pkh')."';
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
        $update = DB::table('calon_pkhs')
            ->where('id', $request->id)
            ->update([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
            ]);
        if ($update) {
            return redirect(route('admin.pkh'))->with('success', 'Data PKH berhasil disimpan');
        } else {
            return redirect(route('admin.pkh'))->with('error', 'Data PKH gagal disimpan');
        }
    }

    public function destroy(Request $req)
    {
        $data = Calon_pkh::findOrFail($req->id); // ganti dengan model dan nama tabel yang sesuai
        $data->delete();

        return json_encode([
            'status' => 'success',
        ]);

        // return redirect()->route('admin.pkh')->with('success', 'Data PKH berhasil dihapus');
    }

    public function importExcel(Request $request)
    {
        if ($request->hasFile('excel_file')) {
            $file = $request->file('excel_file');

            // Validate the file
            $validated = $request->validate([
                'excel_file' => 'required|mimes:xlsx,xls,csv',
            ]);

            // Extract data from the file start from row 2
            $data = Excel::toCollection([], $file)[0];

            // Loop through each row and add to calon_pkhs
            foreach ($data as $row) {
                if (!isset($row[0])) {
                    return null;
                }
                Calon_pkh::create([
                    'nik' => $row[0],
                    'nama' => $row[1],
                    'alamat' => $row[2],
                ]);
            }

            return redirect()->route('admin.pkh')->with('success', 'Data PKH imported successfully');
        } else {
            return redirect()->route('admin.pkh')->with('error', 'Please select a file to import');
        }
    }
}
