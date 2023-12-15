@extends('layouts.pkmpkh')
@section('title', 'Data Kriteria Terbobot')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Penilaian Metode ARAS</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted">Home</a>
                            </li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Penilaian Metode ARAS</li>
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
                            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Alternatif</th>
                                        @foreach ($criteria as $crit)
                                            @php
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
                                            @endphp
                                            <th scope="col">{{ $crit->code }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-id="cpkh-0">
                                        <td>A0</td>
                                        @foreach ($nilai as $i => $nil)
                                            <td> {{ $nil['val'] }}</td>
                                        @endforeach
                                    </tr>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($calonPkhs as $item)
                                        @if (isset($item->Subcriterias[0]))
                                            <tr data-id="cpkh{{ $no }}">
                                                <td>A{{ $no }} ({{ $item->nama }})</td>
                                                @foreach ($item->Subcriterias as $sub)
                                                    <td> {{ $sub->nilai }}
                                                        @php
                                                            if (!$nilai[$sub->criteria_id]['type']) {
                                                                $sub->nilai / $nilai[$sub->criteria_id]['sum'];
                                                            }
                                                        @endphp
                                                    </td>
                                                @endforeach
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Normalisasi</th>
                                        @foreach ($criteria as $crit)
                                            <th scope="col">{{ $crit->code }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-id="cpkh-0">
                                        <td>A0</td>
                                        @foreach ($nilai as $i => $nil)
                                            @php
                                                if ($nilai[$i]['type']) {
                                                    $show = round($nil['val'] / $nilai[$i]['sum'], 3);
                                                } else {
                                                    $show = round(1 / $nil['val'] / $nilai[$i]['sum'], 3);
                                                }
                                            @endphp
                                            <td>{{ $show }}</td>
                                        @endforeach

                                    </tr>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($calonPkhs as $item)
                                        @if (isset($item->Subcriterias[0]))
                                            <tr data-id="cpkh{{ $no }}">
                                                <td>A{{ $no }} ({{ $item->nama }})</td>
                                                @foreach ($item->Subcriterias as $sub)
                                                    <td>
                                                        @php

                                                            if ($nilai[$sub->criteria_id]['type']) {
                                                                echo round((float) $sub->nilai / (float) $nilai[$sub->criteria_id]['sum'], 3);
                                                            } else {
                                                                echo round(1 / (float) $sub->nilai / (float) $nilai[$sub->criteria_id]['sum'], 3);
                                                            }
                                                        @endphp
                                                    </td>
                                                @endforeach
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

            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Nomalisasi Tebobot</th>
                                        @foreach ($criteria as $crit)
                                            <th scope="col">{{ $crit->code }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-id="cpkh-0">
                                        <td>A0</td>
                                        @php
                                            $si['0'] = 0;
                                        @endphp

                                        @foreach ($nilai as $i => $nil)
                                            @php
                                                if ($nilai[$i]['type']) {
                                                    $show = round($data->where('criteria_id', $i)->first()->average * round($nil['val'] / $nilai[$i]['sum'], 3), 3);
                                                } else {
                                                    $show = round($data->where('criteria_id', $i)->first()->average * round(1 / $nil['val'] / $nilai[$i]['sum'], 3), 3);
                                                }
                                                $si['0'] += $show;
                                            @endphp
                                            <td>
                                                {{ $show }}
                                            </td>
                                        @endforeach
                                    </tr>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @php
                                        $kl = [];
                                    @endphp
                                    @foreach ($calonPkhs as $item)
                                        @if (isset($item->Subcriterias[0]))
                                            <tr data-id="cpkh{{ $no }}">
                                                <td>A{{ $no }} ({{ $item->nama }})</td>
                                                @php
                                                    $si[$no] = 0;
                                                @endphp
                                                @foreach ($item->Subcriterias as $sub)
                                                    <td>
                                                        @php
                                                            if ($nilai[$sub->criteria_id]['type']) {
                                                                $show = round($data->where('criteria_id', $sub->criteria_id)->first()->average * round((float) $sub->nilai / (float) $nilai[$sub->criteria_id]['sum'], 3), 3);
                                                            } else {
                                                                $show = round($data->where('criteria_id', $sub->criteria_id)->first()->average * round(1 / (float) $sub->nilai / (float) $nilai[$sub->criteria_id]['sum'], 3), 3);
                                                            }
                                                            $si[$no] += $show;
                                                            $kl[$no] = $si['0'] / $si[$no];
                                                            echo $show;
                                                        @endphp
                                                    </td>
                                                @endforeach
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

            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Nilai Utalitas</th>
                                        @foreach ($criteria as $crit)
                                            <th scope="col">{{ $crit->code }}</th>
                                        @endforeach
                                        <th scope="col">Si</th>
                                        <th scope="col">Kl</th>
                                        <th scope="col">Rank</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-id="cpkh-0">
                                        <td>A0</td>
                                        @php
                                            $si['0'] = 0;
                                        @endphp

                                        @foreach ($nilai as $i => $nil)
                                            @php
                                                if ($nilai[$i]['type']) {
                                                    $show = round($data->where('criteria_id', $i)->first()->average * round($nil['val'] / $nilai[$i]['sum'], 3), 3);
                                                } else {
                                                    $show = round($data->where('criteria_id', $i)->first()->average * round(1 / $nil['val'] / $nilai[$i]['sum'], 3), 3);
                                                }
                                                $si['0'] += $show;
                                            @endphp
                                            <td>
                                                {{ $show }}
                                            </td>
                                        @endforeach
                                        <td>
                                            {{ $si['0'] }}
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>

                                    </tr>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @php
                                        // Assuming $kl is the array containing the values to be ranked
                                        $rankedKl = collect($kl)->sortDesc();
                                        $restRank = array_values($rankedKl->toArray());
                                        $rank = 1;
                                    @endphp

                                    @foreach ($calonPkhs as $item)
                                        @if (isset($item->Subcriterias[0]))
                                            <tr data-id="cpkh{{ $no }}">
                                                <td>A{{ $no }} ({{ $item->nama }})</td>
                                                @php
                                                    $si[$no] = 0;
                                                @endphp
                                                @foreach ($item->Subcriterias as $sub)
                                                    <td>
                                                        @php
                                                            if ($nilai[$sub->criteria_id]['type']) {
                                                                $show = round($data->where('criteria_id', $sub->criteria_id)->first()->average * round((float) $sub->nilai / (float) $nilai[$sub->criteria_id]['sum'], 3), 3);
                                                            } else {
                                                                $show = round($data->where('criteria_id', $sub->criteria_id)->first()->average * round(1 / (float) $sub->nilai / (float) $nilai[$sub->criteria_id]['sum'], 3), 3);
                                                            }
                                                            $si[$no] += $show;
                                                            $kln[$no] = $si['0'] / $si[$no];
                                                            echo $show;
                                                        @endphp
                                                    </td>
                                                @endforeach
                                                <td>{{ $si[$no] }}</td>
                                                <td>{{ round($kl[$no], 3) }}</td>
                                                <td>{{ array_search($kl[$no], $restRank) + 1 }}</td>
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
    <link rel="stylesheet" href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
    {{-- Custom plugin --}}
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
@endsection

@section('js')
    {{-- This page plugins --}}
    <script src="{{ asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
    {{-- <script src="{{ asset('dist/js/pages/datatable/datatable-basic.init.js') }}"></script> --}}
@endsection
