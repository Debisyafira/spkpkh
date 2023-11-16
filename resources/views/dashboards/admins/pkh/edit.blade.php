@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Data PKH')

@section('content')
  <form action="{{ route('admin.pkh.update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-7 align-self-center">
          <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Penduduk</h4>
          <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.pkh') }}" class="text-muted">Home</a>
                </li>
                <li class="breadcrumb-item text-muted active" aria-current="page">Edit PKH</li>
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
                <div class="form-group">
                  <label>Nik</label>
                  <input name="nik" class="form-control" value="{{ $data->nik }}">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input name="nama" class="form-control" value="{{ $data->nama }}">
                </div>
                <div class="form-group">
                  <label> Alamat </label>
                  <input name="alamat" class="form-control" value="{{ $data->alamat }}">
                </div>
                <div class="form-group mt-3">
                  <a href="{{ route('admin.pkh') }}" class="btn btn-primary btn-sm">kembali</a>
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
