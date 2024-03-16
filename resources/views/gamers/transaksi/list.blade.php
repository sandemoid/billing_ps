@extends('gamers.layout.main')
@section('content')
    @push('custom_style')
        <link href="{{ asset('/') }}assets/css/custom.css" rel="stylesheet">
    @endpush
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Pengguna</h1>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header" style="">
                            <div class="card-title">
                                <h6 class="m-0 font-weight-bold text-primary"><i class="fa-solid fa-clock-rotate-left"></i>
                                    {{ __('Riwayat Transaksi') }}</h6>
                            </div>
                            <div class="card-tools">
                                <form action="" method="post">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="keyword" class="form-control float-right"
                                            placeholder="Search" autocomplete="off" autofocus>

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Playstation</th>
                                        <th>Durasi</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Selasa, 20 Oktober 2024 12:00 WIB</td>
                                        <td>3</td>
                                        <td>5 Jam</td>
                                        <td>Rp. 500.000</td>
                                        <td>
                                            <a href="#" class="btn btn-success btn-sm"><i
                                                    class="fa-solid fa-repeat"></i>
                                                Pesan
                                                Lagi</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
