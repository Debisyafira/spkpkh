@extends('layouts.pkmpkh')
@section('title', 'User Logs')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">User Log Detail</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('log.index') }}"
                                    class="text-muted">User Logs</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">User Log Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>User ID</td>
                                <td>{{ $log->user_id ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td>{{ $log->user->role->name ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Action</td>
                                <td>{{ $log->log_type }}</td>
                            </tr>
                            <tr>
                                <td>Table Name</td>
                                <td>{{ $log->table_name }}</td>
                            </tr>
                            <tr>
                                <td>Data</td>
                                <td>
                                    @isset(json_decode($log->data)->id)
                                        changing user <b>{{ json_encode(json_decode($log->data)->id) }}</b> with role
                                        <b>{{ json_encode(json_decode($log->data)->role) }}</b>.
                                    @endisset
                                    @isset(json_decode($log->data)->user_agent)
                                        Login from <b>{{ json_encode(json_decode($log->data)->user_agent) }}</b>.
                                    @endisset
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
