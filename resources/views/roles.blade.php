@extends('layout.main')
@section('content')
    @push('custom_style')
        <link href="{{ asset('/') }}assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    @endpush
    <div class="container-fluid pl-5 pr-5">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Roles</h1>
            <button data-toggle="modal" data-target="#addModal"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fa-solid fa-plus text-white-50"></i> Tambah Data
            </button>
        </div>

        <!-- Content Row -->
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $key->name_role }}</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#editModal{{ $key->id }}"><i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#deleteModal{{ $key->id }}">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- add modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Role Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" name="name_role" id="name_role"
                            value="{{ old('name_role') }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal delete-->
    @foreach ($data as $key)
        <!-- Logout Modal-->
        <div class="modal fade" id="editModal{{ $key->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="{{ route('roles.update', ['id' => $key->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Role Data</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control" name="name_role" id="name_role"
                                value="{{ $key->name_role }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal delete-->
    @foreach ($data as $key)
        <!-- Logout Modal-->
        <div class="modal fade" id="deleteModal{{ $key->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="{{ route('roles.delete', ['id' => $key->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi hapus data</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Yakin kamu ingin menghapus data dengan nama <b>{{ $key->name }}</b>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Iya, saya yakin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('custom_scripts')
    {{-- data table --}}
    <script src="{{ asset('/') }}assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}assets/js/demo/datatables-demo.js"></script>
@endpush
