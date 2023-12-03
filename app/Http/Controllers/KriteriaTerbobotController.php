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
        // dd($sumValues);
        // foreach ($calonPkhs as $cpkh) {
        //     echo $cpkh->nama;
        //     print_r($cpkh->pkhSubcriteria);
        //     echo '<br/>=============<br/>';
        // }

        // exit;

        return view('dashboards.admins.kriteria_terbobot.index', compact('data', 'criteria', 'calonPkhs', 'minimumValues', 'maxValues', 'sumValues'));
    }
}
