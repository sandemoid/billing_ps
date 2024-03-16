@extends('gamers.layout.main')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0 text-gray-800">Selamat datang di {{ pengaturan('title') }}</h1>
            <a href="javascript:;" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-2" data-toggle="modal"
                data-target="#infoModal">
                <span><i class="fa-solid fa-circle-info"></i> Informasi cara pemesanan</span>
            </a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-6 col-sm-3">
                <a href="#">
                    <img src="{{ asset('/') }}assets/img/monitor.png" class="img_monitor">
                    <span class="text_monitor">BERMAIN</span>
                    <span class="dot top-right green-dot"></span>
                </a>
            </div>
            <div class="col-6 col-sm-3">
                <a href="#">
                    <img src="{{ asset('/') }}assets/img/monitor.png" class="img_monitor">
                    <span class="text_monitor">PS 2</span>
                    <span class="dot top-right red-dot"></span>
                </a>
            </div>
            <div class="col-6 col-sm-3">
                <a href="#">
                    <img src="{{ asset('/') }}assets/img/monitor.png" class="img_monitor">
                    <span class="text_monitor">PS 3</span>
                    <span class="dot top-right red-dot"></span>
                </a>
            </div>
            <div class="col-6 col-sm-3">
                <a href="#">
                    <img src="{{ asset('/') }}assets/img/monitor.png" class="img_monitor">
                    <span class="text_monitor">BERMAIN</span>
                    <span class="dot top-right green-dot"></span>
                </a>
            </div>
            <div class="col-6 col-sm-3">
                <a href="#">
                    <img src="{{ asset('/') }}assets/img/monitor.png" class="img_monitor">
                    <span class="text_monitor">BERMAIN</span>
                    <span class="dot top-right green-dot"></span>
                </a>
            </div>
            <div class="col-6 col-sm-3">
                <a href="#">
                    <img src="{{ asset('/') }}assets/img/monitor.png" class="img_monitor">
                    <span class="text_monitor">PS 6</span>
                    <span class="dot top-right red-dot"></span>
                </a>
            </div>
            <div class="col-6 col-sm-3">
                <a href="#">
                    <img src="{{ asset('/') }}assets/img/monitor.png" class="img_monitor">
                    <span class="text_monitor">PS 7</span>
                    <span class="dot top-right red-dot"></span>
                </a>
            </div>
            <div class="col-6 col-sm-3">
                <a href="#">
                    <img src="{{ asset('/') }}assets/img/monitor.png" class="img_monitor">
                    <span class="text_monitor">BERMAIN</span>
                    <span class="dot top-right green-dot"></span>
                </a>
            </div>
        </div>
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col ml-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Member Sejak</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">20 Desember 2023</div>
                            </div>
                            <div class="col-auto mr-2">
                                <i class="fas fa-calendar-day fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col ml-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Bermain</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">20 Jam</div>
                            </div>
                            <div class="col-auto mr-2">
                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-circle-info"></i> Informasi Cara
                        Pemesanan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>1. Pilih gambar TV yang anda ingin mainkan, titik merah</p>
                    <p>2. Isi form pemesanan</p>
                    <p>3. Pilih metode pembayaran</p>
                    <p>4. Konfirmasi pemesanan</p>
                    <p>5. Tunggu konfirmasi dari pihak kami</p>
                    <p class="text-danger">[Penting!] Datang 15 menit sebelum bermain</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
