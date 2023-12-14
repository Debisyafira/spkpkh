@extends('layouts.pkmpkh')
@section('title', 'User Logs')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">User Logs</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">User Logs</li>
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
                        <a href="{{ route('log.prune') }}" class="btn btn-danger">Truncate logs</a>
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
                                    <th scope="col">User ID</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Log Date</th>
                                    <th scope="col">Log Type</th>
                                    <th scope="col">Table Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($logs as $log)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td scope="row">{{ $log->user_id }}</td>
                                        <td scope="row">{{ $log->user->role->name ?? '' }}</td>
                                        <td scope="row">{{ $log->log_date }}</td>
                                        <td scope="row">{{ $log->log_type }}</td>
                                        <td scope="row">{{ $log->table_name }}</td>
                                        <td scope="row">
                                            <a href="{{ route('log.show', ['id' => $log->id]) }}"
                                                class="btn btn-success btn-sm">Show</a>
                                            <button onclick="destroy({{ $log->id }})"
                                                class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <script>
                                        function destroy(id) {
                                            if (confirm('Anda yakin ingin menghapus data ?')) {
                                                $.ajax({
                                                    url: "{{ route('log.destroy') }}?id=" + id,
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
                                            }
                                        }
                                    </script>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        {!! $logs->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
