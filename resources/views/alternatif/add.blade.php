@extends('layouts.pkmpkh')
@section('title', 'Data Data Kriteria Terbobot')

@section('content')
    <form action="{{ route('admin.alternatif.simpan') }}" method="POST" enctype="multipart/form-data">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Kriteria Terbobot</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.alternatif') }}"
                                        class="text-muted">Home</a>
                                </li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">Edit PKH</li>
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
                                <label>Kode Alternatif</label>
                                <input name="kode_alternatif" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="lbl_nama">Nama Alternatif</label>
                                <input name="nama_alternatif" class="form-control" required>
                                {{-- <select name="criterias_id" class="from-control">
                                    <option value="">- Pilih -</option>
                                    @foreach ($criterias as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                </select> --}}
                            </div>
                            <div class="form-group">
                                <a href="{{ route('admin.alternatif') }}" class="btn btn-primary btn-sm">kembali</a>
                                <button type="submit" class="btn btn-success btn-sm">simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
