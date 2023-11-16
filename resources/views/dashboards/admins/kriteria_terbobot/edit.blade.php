@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Data Kriteria Terbobot')

@section('content')
  <form action="{{ route('admin.pkh.update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-7 align-self-center">
          <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Kriteria Terbobot</h4>
          <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.kriteria_terbobot') }}" class="text-muted">Home</a>
                </li>
                <li class="breadcrumb-item text-muted active" aria-current="page">Edit Kriteria Terbobot
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    @csrf
    @method('PUT')
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <div class="form-group">
                  <label>Kode Kriteria</label>
                  <input name="kode" class="form-control" value="{{ $data->kode_kriteria }}">
                </div>
                <div class="form-group">
                  <label>Nama Kriteria</label>
                  <input name="name" class="form-control" value="{{ $data->name }}">
                </div>
                <div class="form-group">
                  <label>Bobot Kriteria</label>
                  <input name="bobot" class="form-control" value="{{ $data->bobot }}">
                </div>
                <div class="form-group">
                  <label>Jenis Kriteria</label>
                  <input name="type" class="form-control" value="{{ $data->type }}">
                  {{-- <select class="form-control" name="kategori">
                                    <option value="benefit"->benefit</option>
                                    <option value="cost"->cost</option>
                                </select> --}}
                </div>
                <div class="form-group mt-3">
                  <a href="{{ route('admin.kriteria_terbobot') }}" class="btn btn-primary btn-sm">kembali</a>
                  <button type="submit" class="btn btn-success btn-sm">Update</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </form>
@endsection
