@extends('layouts.pkmpkh')
@section('title', 'Edit User')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit User Role</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user') }}" class="text-muted">User
                                    Management</a>
                            </li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Edit Role</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="role">Role</label>
                                <select name="role" class="form-select" aria-label="Default select example" required>
                                    <option value="ADMIN" {{ $user->role->name == 'ADMIN' ? 'selected' : '' }}>Admin
                                    </option>
                                    <option value="USER" {{ $user->role->name == 'USER' ? 'selected' : '' }}>User
                                    </option>
                                    <option value="OPT" {{ $user->role->name == 'OPT' ? 'selected' : '' }}>Operator
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
