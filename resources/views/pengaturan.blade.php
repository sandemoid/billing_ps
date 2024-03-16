@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('Pengaturan Aplikasi') }}</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('pengaturan.app') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Nama Rental</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="title" name="title" placeholder="Masukan Nama Rental"
                                    value="{{ @old('title', $title->value) }}">
                                @error('title')
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
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('pengaturan.jadwal') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="hari">Nama Hari</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="hari" name="hari" placeholder="Masukan Nama Hari"
                                    value="{{ @old('hari', $data->hari) }}">
                                @error('hari')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="waktu_buka">Waktu Buka</label>
                                <input type="date" class="form-control @error('name') is-invalid @enderror"
                                    id="waktu_buka" name="waktu_buka" placeholder="Masukan Waktu Buka"
                                    value="{{ @old('waktu_buka', $data->waktu_buka) }}">
                                @error('waktu_buka')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="waktu_tutup">Waktu tutup</label>
                                <input type="date" class="form-control @error('name') is-invalid @enderror"
                                    id="waktu_tutup" name="waktu_tutup" placeholder="Masukan Waktu Buka"
                                    value="{{ @old('waktu_tutup', $data->waktu_tutup) }}">
                                @error('waktu_tutup')
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
