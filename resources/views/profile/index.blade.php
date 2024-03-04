@extends('layout.main')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profil</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h1 class="h4 text-gray-900 mb-2">Informasi Profil</h1>
                        <p class="mb-4">Perbarui informasi profil dan alamat email akun Anda.</p>
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Nama Lengkap" value="{{ old('name', $user->name) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Alamat Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email" value="{{ old('email', $user->email) }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="image">Photo Profil</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    id="image" name="image">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h1 class="h4 text-gray-900 mb-2">Ganti Password</h1>
                        <p class="mb-4">Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.
                        </p>
                        <form method="POST" action="{{ route('password.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="password">Kata Sandi Lama</label>
                                <input type="current_password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    id="current_password" name="current_password" placeholder="Curent Password">
                                @error('current_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Kata Sandi Baru</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="New Password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Kata Sandi Konfirmasi</label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h1 class="h4 text-gray-900 mb-2">Hapus Akun</h1>
                        <p class="mb-4">Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara
                            permanen akan dihapus secara permanen. Sebelum menghapus akun Anda, silakan unduh data atau
                            informasi apa pun yang ingin Anda yang ingin Anda simpan.</p>
                        <button data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Hapus Akun</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- delete modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('profile.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-circle-info"></i> Apakah Anda
                            yakin ingin menghapus akun Anda?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara
                        permanen secara permanen. Masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus
                        akun Anda secara permanen.
                    </div>
                    <div class="form_password_delete">
                        <label for="password">Kata Sandi</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
