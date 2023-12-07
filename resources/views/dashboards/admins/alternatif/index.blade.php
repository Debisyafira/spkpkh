@extends('layouts.pkmpkh')
@section('title', 'Data Kriteria Terbobot')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.pkh.create') }}" type="submit" class="btn btn-primary"
                            style="margin-bottom:10px">Tambah Alternatif</a>

                        <div class="table-responsive">
                            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode Alternatif</th>
                                        <th scope="col">Nama Alternatif</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($data as $item)
                                        <tr data-id="{{ $item->id }}">
                                            <td>{{ $item->kode_alternatif }}</td>
                                            <td>{{ $item->nama_alternatif }}</td>
                                            <td>
                                                <a href="{{ route('#', ['id' => $item->id]) }}"
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
                                                        url: "{{ route('admin.pkh.delete') }}?id=" + id,
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
