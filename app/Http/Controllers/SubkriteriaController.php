<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Subkriteria;
use Illuminate\Http\Request;

class SubkriteriaController extends Controller
{
    public function create($id)
    {
        $criteria = Criteria::find($id);
        $subcriteria = Subkriteria::where('criteria_id', $id)->get();

        return view('dashboards.admins.subkriteria.index', compact('criteria', 'subcriteria'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'criteria_id' => 'required',
            'nilai' => 'required',
        ]);
        $data = new Subkriteria();
        $data->name = $request->name;
        $data->criteria_id = $request->criteria_id;
        $data->nilai = $request->nilai;

        // save
        if ($data->save()) {
            return redirect(route('admin.subcriteria', $request->criteria_id))->with('success', 'Data berhasil di tambahkan');
        }

        return redirect()->route('admin.subkriteria.create', ['id' => $request->criteria_id])->with('error', 'Gagal ditambahkan');
    }

    public function destroy($id)
    {
        $data = Subkriteria::find($id);
        if ($data->delete()) {
            return redirect()->back()->with('success', 'Data Berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data Gagal di hapus');
        }
    }
}
