@extends('layout.main')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update', ['id' => $data->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Enter full name"
                                    value="{{ old('name', $data->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Enter email"
                                    value="{{ old('email', $data->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control @error('role_id') is-invalid @enderror" id="role_id"
                                    name="role_id" aria-placeholder="Pilih role">
                                    <option disabled selected>Pilih role</option>
                                    @foreach ($roles as $value)
                                        <option value="{{ $value->id_roles }}"
                                            {{ $value->id_roles == $data->role_id ? 'selected' : '' }}>
                                            {{ $value->name_role }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="old_password">Old Password</label>
                                <input type="password" class="form-control" id="old_password" name="old_password"
                                    placeholder="*****">
                                <p class="text-danger">Kosongkan jika tidak ingin mengganti password</p>
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                    id="new_password" name="new_password" placeholder="*****">
                                @error('new_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a onclick="window.location='{{ URL('user') }}'" class="btn btn-light">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
