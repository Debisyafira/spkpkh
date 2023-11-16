@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Data Kriteria Terbobot')

@section('content')
  <form action="{{ route('admin.alternatif.update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-7 align-self-center">
          <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Alternatif</h4>
          <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.pkh') }}" class="text-muted">Home</a>
                </li>
                <li class="breadcrumb-item text-muted active" aria-current="page">Edit Alternatif
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-6 col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <div class="form-group">
                <label>Kode Alternatif</label>
                <input name="kode_Alternatif" class="form-control" value="{{ $data->kode_alternatif }}">
              </div>
              <div class="form-group">
                <label>Nama Alternatif</label>
                <input name="nama_alternatif" class="form-control" value="{{ $data->nama_alternatif }}">
              </div>
              <div class="form-group">
                <a href="{{ route('admin.alternatif') }}" class="btn btn-primary btn-sm">kembali</a>
                <button type="submit" class="btn btn-success btn-sm">Update</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
