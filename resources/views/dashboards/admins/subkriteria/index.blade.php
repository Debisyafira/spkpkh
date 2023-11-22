@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Sub Kriteria')

@section('content')
  <div class="container-fluid">
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-7 align-self-center">
          <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Sub Kriteria </h4>
          <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('admin.criteria') }}" class="text-muted">Criteria</a>
                </li>
                <li class="breadcrumb-item">{{ $criteria->name }}</li>
                <li class="breadcrumb-item text-muted active" aria-current="page">Tambah Subkriteria</li>

              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              {{-- show validation error --}}
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form action="{{ route('admin.addSubCriteria') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="criteria_id" value="{{ $criteria->id }}">
                <div class="form-group">
                  <label for="lbl_nama">Nama Sub Kriteria</label>
                  <input name="name" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Nilai</label>
                  <input name="nilai" class="form-control" required>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-sm">simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              {{-- show validation error --}}
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form action="{{ route('admin.editCriteria') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="criteria_id" value="{{ $criteria->id }}">
                <div class="form-group">
                  <label for="lbl_nama">Nama Kriteria</label>
                  <input name="name" class="form-control" required value="{{ $criteria->name }}">
                </div>
                <div class="form-group">
                  <label for="lbl_kode">Kode Kriteria</label>
                  <input name="code" class="form-control" required value="{{ $criteria->code }}">
                </div>
                <div class="form-group">
                  <label>Type</label>
                  <select class="form-control" id="type" placeholder="Nama Kriteria" name="type">
                    <option value="1" @if ($criteria->type == 1) selected @endif>Benefit</option>
                    <option value="0" @if ($criteria->type == 0) selected @endif>Cost</option>
                  </select>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-sm">simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-6 mx-6">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Nilai</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($subcriteria as $sub)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $sub['name'] }}</td>
              <td>{{ $sub['nilai'] }}</td>
              <td>
                <a href="{{ route('admin.deleteSubCriteria', $sub['id']) }}" class="btn btn-danger btn-circle">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
