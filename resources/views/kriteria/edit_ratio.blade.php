@extends('layouts.pkmpkh')
@section('title', 'Data PKH')

@section('content')
<div class="container-fluid mt-5">
    <div class="row ">
        <div class="col-lg-6 col-12">
            <form action="{{ route('admin.editRatioCriteria', ['id' => $data->ratio->id],false) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="form-group mb-2">
                                <label> Kriteria 1</label>
                                <select class="form-control" name="v_criteria">
                                    <option>Pilih Kriteria</option>
                                    @foreach ($data->criteria as $criteria)
                                    <option value='{{ $criteria['id'] }}' {{ $criteria['id'] == $data->ratio->v_criteria_id ? ' selected' : '' }}>

                                        {{ $criteria['name'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label> Kriteria 2</label>
                                <select class="form-control" name="h_criteria">
                                    @foreach ($data->criteria as $criteria)
                                    <option value='{{ $criteria['id'] }}' {{ $criteria['id'] == $data->ratio->h_criteria_id ? ' selected' : '' }}>

                                        {{ $criteria['name'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label> Value</label>
                                <input name="value" class="form-control" value="{{ $data->ratio->value }}">
                            </div>
                            <div class="form-group mt-3">
                                <a href="{{ route('admin.criteria') }}" class="btn btn-primary btn-sm">kembali</a>
                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6 col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Nilai Skala Perbandingan Berpasangan AHP</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nilai</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Kriteria/Alternatif A sama penting dengan kriteria/alternatif  B</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>A mendekati sedikit lebih penting dari B</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>A sedikit lebih penting dari B</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>A mendekati lebih penting dari B</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>A lebih penting dari B</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>A mendekati sangat penting dari B</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>A sangat penting dari B</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>A mendekati mutlak sangat penting dari B</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>A mutlak sangat penting dari B.</td>
                            </tr>
                            <tr>
                                <td>Kebalikan</td>
                                <td>Jika alternatif 1 dibandingkan alternatif 2 nilainya 3, maka alternatif 2 dibandingkan dengan alternatif 1 nilainya 1/3</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection