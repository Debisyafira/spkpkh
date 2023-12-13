<?php

namespace App\Http\Controllers;

use App\Models\Calon_pkh;
use App\Models\Criteria;
use App\Models\PkhCriteria;
use App\Models\kriteria_terbobot;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;


class PkhController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $data = Gate::allows('isAdmin') ? Calon_pkh::all() : Calon_pkh::where('id_user', $userId)->get();
        return view('pkh.index', compact('data'));
    }

    public function create()
    {
        $criterias = Criteria::all();

        return view('pkh.add', compact('criterias'));
    }

    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $calonPkh = new Calon_pkh([
            'nama' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'id_user' => $userId
        ]);

        $calonPkh->save();

        if ($calonPkh) {
            if (is_array($request->criteria_values) || is_object($request->criteria_values)) {
                foreach ($request->criteria_values as $criteriaId => $subCriteriaValues) {
                    $criteria = Criteria::find($criteriaId);

                    if ($criteria) {
                        $subCriteria = Subkriteria::find($subCriteriaValues);

                        if ($subCriteria) {
                            $calonPkh->subCriterias()->attach($subCriteria, ['value' => $subCriteria->nilai, 'criteria_id' => $criteria->id, 'subkriteria_id' => $subCriteria->id]);
                        }
                    }
                }
            }

            return redirect()->route('admin.pkh')->with('success', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kembali data dengan benar');
            window.location = '" . route('admin.pkh') . "';
            </script>";
        }
    }

    public function edit(Request $req)
    {
        $data = Calon_pkh::where('id', $req->id)->first();
        $criterias = Criteria::get();
        return view('pkh.edit', compact('data', 'criterias'));
    }

    public function update(Request $request)
    {
        $calonPkh = Calon_pkh::where('id', $request->id)->first();
        if (!$calonPkh) {
            return redirect(route('admin.pkh'))->with('error', 'User tidak ditemukan');
        }
        $calonPkh->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        PkhCriteria::where('calon_pkh_id', $calonPkh->id)->delete();

        if ($calonPkh) {
            if (is_array($request->criteria_values) || is_object($request->criteria_values)) {
                foreach ($request->criteria_values as $criteriaId => $subCriteriaValues) {
                    $criteria = Criteria::find($criteriaId);

                    if ($criteria) {
                        $subCriteria = Subkriteria::find($subCriteriaValues);

                        if ($subCriteria) {
                            $calonPkh->subCriterias()->attach($subCriteria, ['value' => $subCriteria->nilai, 'criteria_id' => $criteria->id, 'subkriteria_id' => $subCriteria->id]);
                        }
                    }
                }
            }
            return redirect()->route('admin.pkh')->with('success', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kembali data dengan benar');
            window.location = '" . route('admin.pkh') . "';
            </script>";
        }

        return redirect(route('admin.pkh'))->with('success', 'Data PKH berhasil disimpan');
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
                    'nama' => $row[1],
                    'alamat' => $row[2],
                ]);
                // $col = 3;
                // $criterias = Criteria::all();
                // foreach ($criterias as $criteria) {
                //     $subCriteria = Subkriteria::where('name', $row[$col]);
                //     ++$col;
                //     print_r($subCriteria);
                // }
            }

            return redirect()->route('admin.pkh')->with('success', 'Data PKH imported successfully');
        } else {
            return redirect()->route('admin.pkh')->with('error', 'Please select a file to import');
        }
    }

    // public function deleteAll(Request $request)
    // {
    //     $ids = $request->ids;
    //     Calon_pkh::whereIn('id', $ids)->delete();
    //     return response()->json(["success" => "berhasil"]);
    // }

    public function result()
    {
        $userId = Auth::user()->id;
        $data = Kriteria_terbobot::get();
        $criteria = Criteria::all();
        $calonPkhs = Calon_pkh::where('id_user', $userId)->get();
        $minimumValues = PkhCriteria::select('criteria_id', \DB::raw('MIN(value) as value'))
            ->groupBy('criteria_id')
            ->get();
        $maxValues = PkhCriteria::select('criteria_id', \DB::raw('MAX(value) as value'))
            ->groupBy('criteria_id')
            ->get();
        $sumValues = PkhCriteria::select('criteria_id', \DB::raw('SUM(value) as sum'))
            ->groupBy('criteria_id')
            ->get();
        $sumValuesCost = PkhCriteria::select('criteria_id', \DB::raw('SUM(1/value) as sum'))
            ->groupBy('criteria_id')
            ->get();
        return view('pkh.result', compact('data', 'criteria', 'calonPkhs', 'minimumValues', 'maxValues', 'sumValues', 'sumValuesCost'));
    }
}
