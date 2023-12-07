<?php

namespace App\Http\Controllers;

use App\Models\Calon_pkh;
use App\Models\Criteria;
use App\Models\kriteria_terbobot;
use App\Models\PkhCriteria;

class KriteriaTerbobotController extends Controller
{
    public function index()
    {
        $data = Kriteria_terbobot::get();
        $criteria = Criteria::all();
        $calonPkhs = Calon_pkh::all();
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
        return view('kriteria_terbobot.index', compact('data', 'criteria', 'calonPkhs', 'minimumValues', 'maxValues', 'sumValues', 'sumValuesCost'));
    }

    public function export()
    {
        /// TOLONG EDIT DULU TAMPILANNYA BUAT LAYOUT PDF, AKU MAGER :)
        $data = Kriteria_terbobot::get();
        $criteria = Criteria::all();
        $calonPkhs = Calon_pkh::all();
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

        return view('kriteria_terbobot.pdf', compact('data', 'criteria', 'calonPkhs', 'minimumValues', 'maxValues', 'sumValues', 'sumValuesCost'));
    }
}
