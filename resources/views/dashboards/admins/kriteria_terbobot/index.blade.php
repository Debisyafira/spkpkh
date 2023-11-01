@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Data Kriteria Terbobot')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Kriteria Terbobot</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.kriteria_terbobot') }}"
                                    class="text-muted">Home</a>
                            </li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Data Kriteria Terbobot</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.kriteria_terbobot.create') }}" type="submit" class="btn btn-primary"
                            style="margin-bottom:10px">Tambah Kriteria</a>

                        <div class="table-responsive">
                            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">kode kriteria</th>
                                        <th scope="col">Nama Kriteria</th>
                                        <th scope="col">Bobot Kriteria</th>
                                        <th scope="col">Jenis Kriteria</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($data as $item)
                                        <tr data-id="{{ $item->id }}">
                                            <td>{{ $item->kode }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->bobot }}</td>
                                            <td>{{ $item->type }}</td>
                                            <td>
                                                <a href="{{ route('admin.kriteria_terbobot', ['id' => $item->id]) }}"
                                                    class="btn btn-success btn-sm">Edit</a>
                                                <button onclick="destroy({{ $item->id }})"
                                                    class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>

                                        <script>
                                            function destroy(id) {

                                                console.log(id);

                                                if (confirm('Anda yakin ingin menghapus data ?')) {
                                                    $.ajax({
                                                        type: 'delete',
                                                        url: "{{ route('admin.kriteria_terbobot.delete') }}?id=" + id,
                                                        // headers: {
                                                        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                        // }
                                                        data: {
                                                            "_token": "{{ csrf_token() }}",
                                                            "id": id,
                                                        },
                                                        success: function(response) {
                                                            $(`tr[data-id=${id}]`).remove();
                                                        }
                                                    });
                                                }
                                            }
                                        </script>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>




    <link rel="stylesheet" href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">
    <!-- Custom CSS -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>


    <!--This page plugins -->
    <script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>


@endsection
