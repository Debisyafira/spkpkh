@extends('layouts.pkmpkh')
@section('title', 'Edit User')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Add User</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/" class="text-muted">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user') }}" class="text-muted">User
                                    Management</a>
                            </li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Add User</li>
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
                        <form action="{{ route('admin.user.add') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control" value="" require>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="" require>
                            </div>
                            <div class="mb-3">
                                <label for="role">Role</label>
                                <select name="role" class="form-select" aria-label="Default select example" required>
                                    <option value="ADMIN">Admin
                                    </option>
                                    <option value="USER">User
                                    </option>
                                    <option value="OPT">Operator
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" value="" require>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
