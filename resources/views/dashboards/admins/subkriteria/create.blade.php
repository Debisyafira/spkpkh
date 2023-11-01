@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Sub Kriteria')

@section('content')
    <form action="{{ route('#') }}" method="POST" enctype="multipart/form-data">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Sub Kriteria </h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ route('#') }}" class="text-muted">Home</a>
                                </li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">Tambah Sub Kriteria</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @csrf
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="form-group">
                                <label for="lbl_nama">Nama Sub Kriteria</label>
                                <input name="nama_subkriteria" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Nilai</label>
                                <input name="nilai_bobot" class="form-control" required>
                            </div>
                            <div class="form-group">
                                {{-- <a href="{{ route('admin.pkh') }}" class="btn btn-primary btn-sm">kembali</a> --}}
                                <button type="submit" class="btn btn-success btn-sm">simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 mx-6">

        </div>
    </form>
@endsection
