<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Ratio_criteria;
use App\Models\kriteria_terbobot;
use App\Models\PkhCriteria;

class RatioCriteriaController extends Controller
{
    const IR = array(
        0.01,
        0.58,
        0.90,
        1.12,
        1.24,
        1.32,
        1.41,
        1.46,
        1.49,
        1.51,
        1.48,
    );


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = self::generate();
        } catch (\Throwable $th) {
            return redirect('criteria')->with(['message' => "data belum lengkap"]);
            $data = null;
        }
        return view('kriteria.ratioCriteria')->with('data', $data);
    }

    public function save(Request $request)
    {
        $success = false;
        foreach ($request->total_eigen as $key => $tot) {
            $name = Str::remove("'", $key);
            $criteria = Criteria::where('name', $name)->first();
            if ($criteria !== null) {
                $kriteria_terbobot_check = kriteria_terbobot::where('criteria_id', $criteria->id)->first();
                if ($kriteria_terbobot_check == null) {
                    $kriteria_terbobot = new kriteria_terbobot();
                    $kriteria_terbobot->criteria_id = $criteria->id;
                    $kriteria_terbobot->total = $tot;
                    $kriteria_terbobot->average = $request->average_eigen[$key];
                    $kriteria_terbobot->save();
                    $success = true;
                } else {
                    $kriteria_terbobot_check->update([
                        'total' => $tot,
                        'average' => $request->average_eigen[$key]
                    ]);
                    $success = true;
                }
            }
        }
        if (!$success) {
            return redirect()->route('admin.ratioCriteria')->with('error', 'Gagal');
        }
        return redirect()->route('admin.ratioCriteria')->with('success', 'Data Total dan Average untuk Eigen sudah tersimpan');
    }

    /**
     *
     * @param array Matrix Source
     * @param array Matrix Eigen
     *
     * @return array Matrix data array
     *
     */

    public static function lamda($arraysumCOl, $arrayEigen)
    {
        $sumCol = $arraysumCOl;
        $avgEigen = array();
        $sumLamda = 0;
        foreach ($arrayEigen as $nameCriteria => $value) {
            if ($nameCriteria == 'sumEigen') {
                continue;
            }
            $dataQuantity = (count($value) - 1);
            $avgEigen[$nameCriteria] = $value['totalEigen'] / $dataQuantity;
            $lamda[$nameCriteria] = $avgEigen[$nameCriteria] * $sumCol[$nameCriteria];
            $sumLamda += $lamda[$nameCriteria];
            $CI = ($sumLamda - $dataQuantity) / ($dataQuantity - 1);
            $constant = $CI / self::IR[$dataQuantity - 2];
        }



        return [
            "avgEigen" => $avgEigen,
            "sumCol" => $sumCol,
            "rawlamda" => $lamda,
            "sumLamda" => $sumLamda,
            "CI" => $CI,
            "constant" =>  $constant,
            "IR" => self::IR[$dataQuantity - 2]
        ];
    }

    public static function generate()
    {
        $matrix    = RatioCriteriaController::showCriteria();
        $eigen     = RatioCriteriaController::eigen($matrix);
        $lamda     = self::lamda($matrix['sumCol'], $eigen);
        $data = (object)[
            'matrix'    => $matrix,
            'eigen'     => $eigen,
            'lamda'     => $lamda
        ];

        return $data;
    }

    /**
     * Show the data from resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function data()
    {
        $data = Ratio_criteria::join('criterias as v_criterias', 'ratio_criterias.v_criteria_id', '=', 'v_criterias.id')
            ->join('criterias as h_criterias', 'ratio_criterias.h_criteria_id', '=', 'h_criterias.id')
            ->select('ratio_criterias.id as id', 'ratio_criterias.value', 'v_criterias.name as v_name', 'h_criterias.name as h_name', 'v_criterias.id as v_id', 'h_criterias.id as h_id')
            ->orderBy('v_name', 'ASC')->get()->toArray();

        return $data;
    }


    /**
     * Display the matrix resource.
     *
     * @return array
     */
    public static function showCriteria()
    {
        $criteria = Criteria::all();
        $matrix = array();
        $eigen = array();
        foreach ($criteria as $matrixColumn) {
            $column = $matrixColumn['id'];
            $nameColumn = $matrixColumn['name'];
            $sumCol = 0;
            $validate_exist = Ratio_criteria::Where('v_criteria_id', $column)
                ->orWhere('h_criteria_id', $column)->count();
            if ($validate_exist < 1) {
                continue;
            }
            foreach ($criteria as $matrixRow) {
                $row = $matrixRow['id'];
                $nameRow = $matrixRow['name'];
                $dataRatio = Ratio_criteria::where('v_criteria_id', $column)
                    ->where('h_criteria_id', $row);

                if ($column == $row) {
                    $value = 1;
                } else if ($dataRatio->count() == 0) {
                    continue;
                }

                if ($column != $row) {
                    $value = $dataRatio->select('value')->first();
                    $value = $value->value;
                }
                $matrix[$nameRow][$nameColumn] = $value;
            }
        }
        foreach ($matrix as $columnName => $columnVal) {
            $devider = self::sumMatrix($columnVal);

            foreach ($columnVal as $valueName => $valueMatrix) {
                $count =  $valueMatrix / (int)$devider;
                $eigen[$columnName][$valueName] =  $count;
            }
            $matrix[$columnName] = array_merge($columnVal, array('sumCol' => $devider));
        }
        return self::reverseMatrix($matrix);
    }

    /**
     * Count Row array data
     *
     * @param  Array
     * @return Array
     */
    public static function eigen($array): array
    {
        $data = array();

        foreach (self::reverseMatrix($array) as $key => $value) {
            $sumEigen = 0;
            $devieder = $value['sumCol'];
            foreach ($value as $name => $eigenVal) {
                if ($name == 'sumCol') {
                    continue;
                }
                $counted = $eigenVal / $devieder;
                $data[$key][$name] = $counted;
                $sumEigen += $counted;
            }
            $data[$key]['sumEigen'] = $sumEigen;
        }

        foreach (self::reverseMatrix($data) as $columnName => $columnVal) {
            $devider = self::sumMatrix($columnVal);

            $data[$columnName] = array_merge($columnVal, array('totalEigen' => $devider));
        }

        return $data;
    }

    /**
     * Count Row array data
     *
     * @param  Array
     * @return interger
     */
    public static function sumMatrix($array)
    {
        $total = 0;
        foreach ($array as $key => $value) {
            $total += $value;
        }

        return $total;
    }


    /**
     * Reverse array data
     *
     * @param  Array
     * @return Array
     */
    public static function reverseMatrix($array)
    {
        $newArray = array();
        foreach ($array as $keyCol => $data) {
            foreach ($data as $keyRow => $value) {
                $newArray[$keyRow][$keyCol] = $value;
            }
        }

        return $newArray;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ratio_criteria  $ratio_criteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        $ratio = Ratio_criteria::where('id', $req->id)->first();
        $criteria = Criteria::all()->toArray();
        $data = (object) [
            'criteria' => $criteria,
            'ratio' => $ratio,
        ];
        return view('kriteria.edit_ratio', compact('data'));
    }

    public function updateRatio(Request $request,$id)
    {
        $request->validate([
            'v_criteria' => 'required|different:h_criteria',
            'h_criteria' => 'required|different:V_criteria',
            'value' => 'numeric|between:1,9',
        ]);

        $rt = Ratio_criteria::find($id);
        $rt->v_criteria_id = $request->v_criteria;
        $rt->h_criteria_id = $request->h_criteria;
        $rt->value =  $request->value;
        $rt->save();

        return redirect('/admin/criteria')->with('success', 'Data berhasil di ubah');
    }

    public function destroy($v_id, $h_id)
    {

        $ratio = Ratio_criteria::where("v_criteria_id", $v_id)
            ->where("h_criteria_id", $h_id)->first();
        $reverseratio = Ratio_criteria::where("v_criteria_id", $h_id)
            ->where("h_criteria_id", $v_id)->first();

        $ratio->delete();
        $reverseratio->delete();

        return redirect()->back()->with(["message" => "delete data perbanfdingan " . $ratio->value . " dan " . $reverseratio->value]);
    }
}
