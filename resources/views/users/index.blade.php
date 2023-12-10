@extends('layouts.pkmpkh')
@section('title', 'User Management')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">User Management</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">User Management</li>
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
                        <a href="{{ route('admin.user.add') }}"
                            class="btn btn-success btn-sm my-2">Tambah User</a>
                        <div class="table-responsive">
                            {{-- Alerting --}}
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td scope="row">{{ $user->name }}</td>
                                            <td scope="row">{{ $user->role->name }}</td>
                                            <td scope="row">
                                                <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}"
                                                    class="btn btn-success btn-sm">Edit</a>
                                                <button onclick="destroy({{ $user->id }})"
                                                    class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                        <script>
                                            function destroy(id) {
                                                if (confirm('Anda yakin ingin menghapus data ?')) {
                                                    $.ajax({
                                                        url: "{{ route('admin.user.delete') }}?id=" + id,
                                                        type: 'DELETE',
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
                                                    location.reload()
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
@endsection
