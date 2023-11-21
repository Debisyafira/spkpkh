@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Data PKH')

@section('content')
  <form action="{{ route('admin.pkh.simpan') }}" method="POST" enctype="multipart/form-data">
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-7 align-self-center">
          <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Penduduk</h4>
          <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.pkh') }}" class="text-muted">Home</a>
                </li>
                <li class="breadcrumb-item text-muted active" aria-current="page">Tambah PKH</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    @csrf
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-6 md-col-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <div class="form-group">
                  <label> Nik</label>
                  <input name="nik" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="lbl_nama">Nama</label>
                  <input id="lbl_nama" name="nama_lengkap" class="form-control" required>
                </div>
                <div class="form-group">
                  <label> Alamat </label>
                  <input name="alamat" class="form-control" required>
                </div>
                <div class="form-group mt-3">
                  <a href="{{ route('admin.pkh') }}" class="btn btn-primary btn-sm">kembali</a>
                  <button type="submit" class="btn btn-success btn-sm">simpan</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                @foreach ($criterias as $criteria)
                  {{-- {{ dd($criteria->pivot) }} --}}
                  <div class="form-group">
                    <label> {{ $criteria->name }} </label>
                    <select name="criteria_values[{{ $criteria->id }}]" class="form-control">
                      <option selected disabled>-- Pilih -</option>
                      @foreach ($criteria->subCriteria as $sub)
                        <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                      @endforeach
                    </select>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
