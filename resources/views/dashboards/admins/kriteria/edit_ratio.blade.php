@extends('layouts.pkmpkh')
@section('title', 'Data PKH')

@section('content')
    <form action="{{ route('admin.editRatioCriteria', ['id' => $data->ratio->id]) }}" method="post"
        enctype="multipart/form-data">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"></h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.editRatioCriteria') }}"
                                        class="text-muted">Home</a>
                                </li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @csrf
        @method('PUT')
        <div class="container-fluid mt-5">
            <div class="row ">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="form-group mb-2">
                                    <label> Kriteria 1</label>
                                    <select class="form-control" name="v_criteria">
                                        <option>Pilih Kriteria</option>
                                        @foreach ($data->criteria as $criteria)
                                            <option value='{{ $criteria['id'] }}'
                                                {{ $criteria['id'] == $data->ratio->v_criteria_id ? ' selected' : '' }}>

                                                {{ $criteria['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label> Kriteria 2</label>
                                    <select class="form-control" name="h_criteria">
                                        @foreach ($data->criteria as $criteria)
                                            <option value='{{ $criteria['id'] }}'
                                                {{ $criteria['id'] == $data->ratio->h_criteria_id ? ' selected' : '' }}>

                                                {{ $criteria['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label> Value</label>
                                    <input name="value" class="form-control" value="{{ $data->ratio->value }}">
                                </div>
                                <div class="form-group mt-3">
                                    <a href="{{ route('admin.editRatioCriteria') }}"
                                        class="btn btn-primary btn-sm">kembali</a>
                                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
