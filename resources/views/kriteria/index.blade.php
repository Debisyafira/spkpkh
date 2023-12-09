@extends('layouts.pkmpkh')
@section('title', 'Data Kriteria')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Perbandingan Kriteria Data</h1>
        </div>


        <!-- Content Row -->
        <div class="row">

            <div class="col-lg-6 mb-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">List Kriteria </h6>
                    </div>
                    <div class="card-body">
                        @can('isUser')
                            <form class="row g-3 mb-3" method="POST" action="{{ route('admin.addCriteria') }}">
                                @csrf
                                <div class="col-12">
                                    <input type="text" class="form-control" id="inputCriteria" placeholder="Nama Kriteria"
                                        name="name">
                                </div>
                                {{-- <div class="col-12">
                                <input type="text" class="form-control" id="code" placeholder="kode" name="kode">
                            </div> --}}
                                <div class="col-12">
                                    <select class="form-control" id="type" placeholder="Nama Kriteria" name="type">
                                        <option value="1">Benefit</option>
                                        <option value="0">Cost</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" id="code" placeholder="code" name="code">
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary mb-3">Tambah</button>
                                </div>
                            </form>
                        @endcan
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Type</th>
                                    @can('isUser')
                                        <th scope="col">Aksi</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->criteria as $criteria)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><a
                                                href="{{ route('admin.subcriteria', $criteria['id']) }}">{{ $criteria['name'] }}</a>
                                        </td>
                                        <td>{{ $criteria['code'] }}</td>
                                        <td>{{ $criteria['type'] ? 'Benefit' : 'Cost' }}</td>
                                        @can('isUser')
                                            <td>
                                                <a href="{{ route('admin.deleteCriteria', ['criteria' => $criteria['id']]) }}"
                                                    class="btn btn-danger btn-circle">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 mb-4">
                <!-- List -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">List Perbandingan Kriteria </h6>
                    </div>
                    <div class="card-body">
                        @can('isUser')
                            <form class="row g-3 mb-3" method="POST" action="{{ route('admin.addRatioCriteria') }}">
                                @csrf
                                <div class="form-group col-4">
                                    <select class="form-control" name="v_criteria">
                                        <option selected>Pilih Kriteria</option>
                                        @foreach ($data->criteria as $criteria)
                                            <option value={{ $criteria['id'] }}>{{ $criteria['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <select class="form-control" name="h_criteria">
                                        <option selected>Pilih Kriteria</option>
                                        @foreach ($data->criteria as $criteria)
                                            <option value={{ $criteria['id'] }}>{{ $criteria['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <input type="decimal" class="form-control" id="inputCriteria" placeholder="Nilai"
                                        name="value">
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-primary mb-3">Tambah</button>
                                </div>
                            </form>
                        @endcan
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kriteria 1</th>
                                    <th scope="col">Kriteria 2</th>
                                    <th scope="col">Value</th>
                                    @can('isUser')
                                        <th scope="col">Aksi</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                <p hidden>{{ $looping = 1 }}</p>
                                {{-- @dd($data->ratio) --}}
                                @foreach ($data->ratio as $ratio)
                                    <tr>
                                        <th scope="row">{{ $looping++ }}</th>
                                        <td>{{ $ratio['v_name'] }}</td>
                                        <td>{{ $ratio['h_name'] }}</td>
                                        <td>{{ $ratio['value'] }}</td>
                                        @can('isUser')
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('admin.deleteRatioCriteria', ['v_id' => $ratio['v_id'], 'h_id' => $ratio['h_id']]) }}"
                                                        class="btn btn-danger btn-circle">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <a href="{{ route('admin.editRatioCriteria', ['id' => $ratio['id']]) }}"
                                                        class="btn btn-info btn-circle">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>
    </div>
    </div>
    <!-- /.container-fluid -->
@endsection
