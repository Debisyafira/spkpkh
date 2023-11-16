@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Data PKH')

@section('content')

  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-7 align-self-center">
        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Penduduk</h4>
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
              <li class="breadcrumb-item"><a href="{{ route('admin.pkh') }}" class="text-muted">Home</a>
              </li>
              <li class="breadcrumb-item text-muted active" aria-current="page">Data Penduduk</li>
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
            <div class="flex">
              <a href="{{ route('admin.pkh.create') }}" type="submit" class="btn btn-primary"
                style="margin-bottom:10px">Tambah Data</a>
              {{-- Add form of Input type file, excel --}}
              <form action="{{ route('admin.pkh.excel') }}" method="POST" enctype="multipart/form-data">
                <div class="mb-3 flex">
                  @csrf
                  <input type="file" name="excel_file" class="form-control">
                  <button type="submit" class="btn btn-primary">Import</button>
                </div>
              </form>
            </div>
            <div class="table-responsive">
              <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                <thead>
                  <tr>
                    <th scope="col">Nik </th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  @foreach ($data as $item)
                    <tr data-id="{{ $item->id }}">
                      <td>{{ $item->nik }}</td>
                      <td>{{ $item->nama }}</td>
                      <td>{{ $item->alamat }}</td>
                      <td>
                        <a href="{{ route('admin.pkh.edit', ['id' => $item->id]) }}"
                          class="btn btn-success btn-sm">Edit</a>
                        <button onclick="destroy({{ $item->id }})" class="btn btn-danger btn-sm">Delete</button>
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
