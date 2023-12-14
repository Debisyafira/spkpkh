@extends('layouts.pkmpkh')
@section('title', 'Data PKH')

@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data KPM PKH</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.pkh') }}" class="text-muted">Home</a>
                            </li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Data KPM PKH</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <style>
        .flex {
            display: flex;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if(auth()->user()->role->value == "ADMIN" || auth()->user()->role->value == "USER" )
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.pkh.create') }}" type="submit" class="btn btn-primary"
                                    style="margin-bottom:10px">Tambah Data</a>
                                {{-- Add form of Input type file, excel --}}
                                <!-- <form action="{{ route('admin.pkh.excel') }}" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3 flex">
                                        @csrf
                                        <input type="file" name="excel_file" class="form-control">
                                        <button type="submit" class="btn btn-primary ">Import</button>
                                        {{-- <button id="deleteAllSelectedRecord" class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash"></i> Delete ALL</button> --}}
                                    </div>
                                </form> -->
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        {{-- <th><input type="checkbox" name="ids" id="select_all_ids"> </th> --}}
                                        <th scope="col">Nama</th>
                                        <th scope="col">Alamat</th>
                                        @if(\Gate::allows('isUser') || \Gate::allows('isAdmin'))
                                            <th scope="col">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($data as $item)
                                        <tr data-id="{{ $item->id }}">
                                            {{-- <th><input type="checkbox" name="ids" class="checbox_ids"
                                                    value="{{ $item['id'] }}" id=""></th> --}}
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            @if(\Gate::allows('isUser') || \Gate::allows('isAdmin'))
                                                <td>
                                                    <a href="{{ route('admin.pkh.edit', ['id' => $item->id]) }}"
                                                        class="btn btn-success btn-sm">Edit</a>
                                                    <button onclick="destroy({{ $item->id }})"
                                                        class="btn btn-danger btn-sm">Delete</button>
                                                </td>
                                            @endif

                                        </tr>
                                        @if(\Gate::allows('isUser') || \Gate::allows('isAdmin'))
                                            <script>
                                                function destroy(id) {
                                                    if (confirm('Anda yakin ingin menghapus data ?')) {
                                                        $.ajax({
                                                            url: "{{ route('admin.pkh.delete') }}?id=" + id,
                                                            type: 'DELETE',
                                                            // headers: {
                                                            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            // }
                                                            data: {
                                                                "_token": "{{ csrf_token() }}",
                                                                "id": id,
                                                            },
                                                            success: function(response) {
                                                                $(`tr[data-id=${id}]`).remove();
                                                                Swal.fire({
                                                                    position: "top-end",
                                                                    icon: "success",
                                                                    title: "Berhasil dihapus",
                                                                    showConfirmButton: false,
                                                                    timer: 2000
                                                                });
                                                            }
                                                        });
                                                    }
                                                }
                                            </script>
                                        @endif
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
