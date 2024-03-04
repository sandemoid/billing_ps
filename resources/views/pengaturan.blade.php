@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('Pengaturan Aplikasi') }}</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('pengaturan.update') }}" enctype="multipart/form-data">
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
        </div>

    </div>
@endsection
