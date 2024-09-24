@extends('layouts.layout_main')
@section('title', 'Data Detail Lokasi')
@section('content')
    <!-- Content Wrapper. Contatipe page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail Lokasi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('managelokasi.index') }}">Lokasi</a></li>
                            <li class="breadcrumb-item active">Detail Lokasi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h3 class="m-0 text-center" id="nama_lokasi"><i class="fas fa-building"></i>
                                    {{ $lokasi->nama_lokasi }}
                                </h3>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="m-0 text-center">
                                            <span class="badge badge-primary"><i class="fas fa-barcode"></i> Kode :
                                                {{ $lokasi->kode_lokasi }}</span>
                                        </h4>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0)" id="btn-edit-lokasi" title="Ubah Lokasi"
                                            data-di="{{ $lokasi->id_lokasi }}" class="btn btn-sm btn-secondary float-right">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="card card-primary-outline">
                    <div class="card-header">
                        <h3 class="card-title">Ruang</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tbl_ruang" class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Ruang</th>
                                    <th>Kode Ruang</th>
                                    <th class="w-1"><i class="fas fa-bars"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ruang as $rg)
                                    <tr id="index_{{ $rg->id_ruang }}" data-iteration="{{ $loop->iteration }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rg->nama_ruang }}</td>
                                        <td class="text-center lead">
                                            <span class="badge badge-danger">{{ $rg->kode_ruang }}</span>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" id="btn-detail-ruang"
                                                data-di = "{{ $rg->id_ruang }}" title="Detail Ruang"
                                                class="btn btn-sm btn-light">
                                                <i class="far fa-folder-open"></i> Detail
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Ruang</th>
                                    <th>Kode Ruang</th>
                                    <th><i class="fas fa-bars"></i></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.content -->
            </div>
        </section>
    </div>

    @include('managelokasi::modal-edit')
@endsection
@section('scripttambahan')
    <script>
        $(document).ready(function() {
            //button create post event
            $('body').on('click', '#btn-detail-ruang', function() {
                let kode = $(this).data('di');

                $.ajax({
                    type: "GET",
                    success: function(response) {
                        // Redirect ke URL yang diterima dalam respons
                        window.location.href =
                            `/ruang/manageruang/detail/${kode}`;
                    },
                    error: function(xhr, status, error) {
                        // Tangani kesalahan jika diperlukan
                        console.error(xhr.responseText);
                    }
                });

            });
        });
    </script>
    <script>
        $(function() {
            $("#tbl_ruang").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tbl_ruang_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
