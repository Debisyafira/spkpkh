<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Ratio_criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $criteria = Criteria::all()->toArray();
            $ratio = RatioCriteriaController::data();
            $data = (object) [
                'criteria' => $criteria,
                'ratio' => $ratio,
            ];
        } catch (\Throwable $th) {
            $data = null;
        }

        // dd($data);
        return view('dashboards.admins.kriteria.criteria')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'type' => 'required|integer',
        ]);

        Criteria::create([
            'name' => $request->name,
            'code' => $request->code,
            'type' => $request->type,
        ]);

        return redirect()->back()->with('success', 'Insert Data Criteria Success');
    }

    public function update(Request $request)
    {
        // dd($request);
        $id = $request->criteria_id;
        $criteria = Criteria::where('id', $id)->first();
        // dd($criteria);
        if ($criteria != null) {
            $criteria->update([
                'name' => $request->name,
                'code' => $request->code,
                'type' => $request->type
            ]);
            return redirect(route('admin.subcriteria', $request->criteria_id))->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->route('admin.subcriteria', $request->criteria_id)->with('error', 'Gagal ditambahkan');
        }
    }

    public function storeRatio(Request $request)
    {
        $request->validate([
            'v_criteria' => 'required|different:h_criteria',
            'h_criteria' => 'required|different:V_criteria',
            'value' => 'numeric',
        ]);
        $cek_kriteria = Ratio_criteria::where('v_criteria_id', $request->v_criteria)
            ->where('h_criteria_id', $request->h_criteria)
            ->count();

        if ($cek_kriteria > 0) {
            return redirect()->back()->with('success', 'Data Sudah Pernah disimpan');
        }
        // else {
        //     return redirect()->back()->with('error', 'Data gagal disimpan');
        // }

        Ratio_criteria::create(
            [
                'v_criteria_id' => $request->v_criteria,
                'h_criteria_id' => $request->h_criteria,
                'value' => $request->value,
            ]
        );
        Ratio_criteria::create([
            'h_criteria_id' => $request->v_criteria,
            'v_criteria_id' => $request->h_criteria,
            'value' => (1 / $request->value),
        ]);

        return redirect()->back()->with('success', 'Input Data Sukses');
    }

    public function massUpdate(Request $request)
    {
        foreach ($request->except(['_token', 'row']) as $key => $value) {
            $keyID = Criteria::getIdfromName($key);
            $rowID = Criteria::getIdfromName($request->row);
            if ($keyID == $rowID) {
                continue;
            }
            Ratio_criteria::where([
                ['h_criteria_id', '=', $keyID],
                ['v_criteria_id', '=', $rowID],
            ])->update([
                'value' => $value,
            ]);
            Ratio_criteria::where([
                ['h_criteria_id', '=', $rowID],
                ['v_criteria_id', '=', $keyID],
            ])->update([
                'value' => (1 / $value),
            ]);
        }

        return redirect()->back()->with('success', 'Input Data Sukses');
    }



    public function destroy(Criteria $criteria)
    {
        $existance = Ratio_criteria::where('v_criteria_id', $criteria->id)
            ->orWhere('h_criteria_id', $criteria->id)
            ->count();
        if ($existance > 1) {
            return redirect()->back()->with(['error' => 'Info : Kriteria memiliki relasi perbandingan!']);
        } else {
            $criteria->delete();

            return redirect()->back()->with(['success' => 'Delete Data sukses']);
        }
    }
}
