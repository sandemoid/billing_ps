@extends('layout.main')
@section('content')
    @push('custom_style')
        <link href="{{ asset('/') }}assets/css/custom.css" rel="stylesheet">
    @endpush
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('Pengaturan & Penjadwalan') }}</h1>
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
                                <div class="row">
                                    @foreach ($jadwal as $value)
                                        <div class="col-6">
                                            <div class="jadwal">
                                                <p>Hari {{ $value->hari }}</p>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="waktu_buka">Waktu Buka</label>
                                                        <input type="time"
                                                            class="form-control @error('waktu_buka') is-invalid @enderror"
                                                            id="waktu_buka" name="waktu_buka"
                                                            placeholder="Masukan Waktu Buka"
                                                            value="{{ @old('waktu_buka', $value->waktu_buka) }}">
                                                        @error('waktu_buka')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="waktu_tutup">Waktu Tutup</label>
                                                        <input type="time"
                                                            class="form-control @error('waktu_tutup') is-invalid @enderror"
                                                            id="waktu_tutup" name="waktu_tutup"
                                                            placeholder="Masukan Waktu Tutup"
                                                            value="{{ @old('waktu_tutup', $value->waktu_tutup) }}">
                                                        @error('waktu_tutup')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
