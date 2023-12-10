@extends('layouts.pkmpkh')
@section('title', 'Hasil Penilaian Calon PKH')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Hasil Penilaian Calon PKH</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted">Home</a>
                            </li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Hasil Peniliain Calon PKH</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">     
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="rank_pkh" class="table border table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        foreach ($criteria as $crit){
                                            $nilai[$crit->id]['sum'] = 0;
                                                // IF Type = Benefit
                                                if ($crit->type) {
                                                    $nilai[$crit->id]['val'] = $maxValues
                                                        ->where('criteria_id', $crit->id)
                                                        ->pluck('value')
                                                        ->first();
                                                    $nilai[$crit->id]['type'] = true;
                                                    $nilai[$crit->id]['sum'] = $sumValues
                                                        ->where('criteria_id', $crit->id)
                                                        ->pluck('sum')
                                                        ->first();
                                                    $nilai[$crit->id]['sum'] = (int) $nilai[$crit->id]['sum'] + (int) $nilai[$crit->id]['val'];
                                                    $nilai[$crit->id]['bantu'] = 1;
                                                } else {
                                                    $nilai[$crit->id]['val'] = $minimumValues
                                                        ->where('criteria_id', $crit->id)
                                                        ->pluck('value')
                                                        ->first();
                                                    $nilai[$crit->id]['type'] = false;
                                                    $nilai[$crit->id]['sum'] = $sumValuesCost
                                                        ->where('criteria_id', $crit->id)
                                                        ->pluck('sum')
                                                        ->first();
                                                    $nilai[$crit->id]['sum'] = (float) $nilai[$crit->id]['sum'] + 1 / (float) $nilai[$crit->id]['val'];
                                                    $nilai[$crit->id]['bantu'] = 1 / $nilai[$crit->id]['val'];
                                                }
                                        }

                                        $si['0'] = 0;
                                        foreach ($nilai as $i => $nil){
                                                if ($nilai[$i]['type']) {
                                                    $show = round($data->where('criteria_id', $i)->first()->average * round($nil['val'] / $nilai[$i]['sum'], 3), 3);
                                                } else {
                                                    $show = round($data->where('criteria_id', $i)->first()->average * round(1 / $nil['val'] / $nilai[$i]['sum'], 3), 3);
                                                }
                                                $si['0'] += $show;
                                        };
                                        $no = 1;
                                        $kl = [];
                                        $ket = [];
                                        foreach ($calonPkhs as $item){
                                            if (isset($item->Subcriterias[0])){
                                                    $si[$no] = 0;
                                                    foreach ($item->Subcriterias as $sub){
                                                        if ($nilai[$sub->criteria_id]['type']) {
                                                                $show = round($data->where('criteria_id', $sub->criteria_id)->first()->average * round((float) $sub->nilai / (float) $nilai[$sub->criteria_id]['sum'], 3), 3);
                                                            } else {
                                                                $show = round($data->where('criteria_id', $sub->criteria_id)->first()->average * round(1 / (float) $sub->nilai / (float) $nilai[$sub->criteria_id]['sum'], 3), 3);
                                                            }

                                                            $si[$no] += $show;
                                                            $kl[$no] = $si['0'] / $si[$no];
                                                    }
                                                    $no++;
                                            }
                                        }
                                        // Assuming $kl is the array containing the values to be ranked
                                        $rankedKl = collect($kl)->sortDesc();
                                        $restRank = array_values($rankedKl->toArray());
                                        $rank = 1;
                                        $no = 1;
                                     
                                    @endphp

                                    @foreach ($calonPkhs as $item)
                                        @if (isset($item->Subcriterias[0]))
                                            <tr data-id="cpkh{{ $no }}">
                                                @php
                                                    $si[$no] = 0;
                                                    $ket = [];
                                                    foreach($item->Subcriterias as $sub){
                                                            if ($nilai[$sub->criteria_id]['type']) {
                                                                $show = round($data->where('criteria_id', $sub->criteria_id)->first()->average * round((float) $sub->nilai / (float) $nilai[$sub->criteria_id]['sum'], 3), 3);
                                                            } else {
                                                                $show = round($data->where('criteria_id', $sub->criteria_id)->first()->average * round(1 / (float) $sub->nilai / (float) $nilai[$sub->criteria_id]['sum'], 3), 3);
                                                            }

                                                            $si[$no] += $show;
                                                            $kln[$no] = $si['0'] / $si[$no];
                                                            array_push($ket,$sub->name);
                                                        }
                                                @endphp
                                                <td>{{ array_search($kl[$no], $restRank) + 1 }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ round($kl[$no], 3) }}</td>
                                                <td>{{ implode(" , ",$ket)}}</td>
                                            </tr>
                                            @php
                                                $no++;
                                            @endphp
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('css')
    {{-- Custom CSS lain --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/datatables.min.css') }}">
    <!-- {{-- Custom plugin --}}
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script> -->
@endsection

@section('js')
    {{-- This page plugins --}}
    <script src="{{ asset('assets/vendor/datatables/datatables.min.js') }}"></script>
    <script>    
    $(document).ready(function() {

        const table = $('#rank_pkh').DataTable({
        dom: 'Bfrtilp',
        "order":[
          ['0','asc'], //urutkan berdasarkan tahun terakhir
        ],
        "buttons": [
        'pdf'
      ],})

    })
    </script>

@endsection
