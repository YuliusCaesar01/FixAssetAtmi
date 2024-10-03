@extends('layouts.layout_main')
@section('title', 'Data Jenis')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-6">
                            <h1 class="m-0">Data Jenis</h1>
                        </div><!-- /.col -->
                        @if(auth()->user()->role_id == 19)

                        <div class="col-6">
                            <a href="javascript:void(0)" class="btn btn-sm btn-info float-right" id="btn-create-kelompok">
                                <i class="fas fa-plus"></i> Jenis
                            </a>
                        </div>
                        @endif
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card">
                       
                        <div class="card-body">
                            <table id="tbl_jenis" class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tipe <i class="fas fa-chevron-right"></i> Kelompok</th>
                                        <th>Nama Jenis</th>
                                        <th>Kode Jenis</th>
                                        <th class="w-1"><i class="fas fa-bars"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenis as $jn)
                                        <tr id="index_{{ $jn->id_jenis }}" data-iteration="{{ $loop->iteration }}"
                                            data-nama-jenis-yayasan="{{ $jn->nama_jenis_yayasan }}"
                                            data-nama-jenis-smkmikael="{{ $jn->nama_jenis_mikael }}"
                                            data-nama-jenis-politeknik="{{ $jn->nama_jenis_politeknik }}"
                                            data-nama-tipe-yayasan="{{ $jn->kelompok->tipe->nama_tipe_yayasan }}"
                                            data-nama-tipe-smkmikael="{{ $jn->kelompok->tipe->nama_tipe_mikael }}"
                                            data-nama-tipe-politeknik="{{ $jn->kelompok->tipe->nama_tipe_politeknik }}"
                                            data-nama-kelompok-yayasan="{{ $jn->kelompok->nama_kelompok_yayasan }}"
                                            data-nama-kelompok-smkmikael="{{ $jn->kelompok->nama_kelompok_mikael }}"
                                            data-nama-kelompok-politeknik="{{ $jn->kelompok->nama_kelompok_politeknik }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <span class="nama-tipe">{{ $jn->kelompok->tipe->nama_tipe_yayasan }}</span>
                                                <i class="fas fa-chevron-right"></i> <span class="nama-kelompok">{{ $jn->kelompok->nama_kelompok_yayasan }}</span>
                                            </td>
                                            <td class="nama-jenis">{{ $jn->nama_jenis_yayasan }}</td>
                                            <td class="text-center lead">
                                                <span class="badge badge-warning">{{ $jn->kode_jenis }}</span>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" id="btn-detail-jenis"
                                                    data-di="{{ $jn->id_jenis }}" title="Detail Jenis"
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
                                        <th>Tipe <i class="fas fa-chevron-right"></i> Kelompok</th>
                                        <th>Nama Jenis</th>
                                        <th>Kode Jenis</th>
                                        <th><i class="fas fa-bars"></i></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
    </div>
    @include('managejenis::modal-create')
@endsection

@section('scripttambahan')
    <script>
        $(document).ready(function() {
            // Handle mode change event
            $('#mode-selector').change(function() {
                let selectedMode = $(this).val();

                // Loop through each row and update the "Tipe", "Nama Jenis", and "Nama Kelompok" columns based on the selected mode
                $('#tbl_jenis tbody tr').each(function() {
                    let namaJenis, namaTipe, namaKelompok;
                    switch (selectedMode) {
                        case 'yayasan':
                            namaJenis = $(this).data('nama-jenis-yayasan');
                            namaTipe = $(this).data('nama-tipe-yayasan');
                            namaKelompok = $(this).data('nama-kelompok-yayasan');
                            break;
                        case 'smkmikael':
                            namaJenis = $(this).data('nama-jenis-smkmikael');
                            namaTipe = $(this).data('nama-tipe-smkmikael');
                            namaKelompok = $(this).data('nama-kelompok-smkmikael');
                            break;
                        case 'politeknik':
                            namaJenis = $(this).data('nama-jenis-politeknik');
                            namaTipe = $(this).data('nama-tipe-politeknik');
                            namaKelompok = $(this).data('nama-kelompok-politeknik');
                            break;
                    }
                    $(this).find('.nama-jenis').text(namaJenis);
                    $(this).find('.nama-tipe').text(namaTipe);
                    $(this).find('.nama-kelompok').text(namaKelompok);
                });
            });

            // Button create post event
            $('body').on('click', '#btn-detail-jenis', function() {
                let kode = $(this).data('di');

                $.ajax({
                    type: "GET",
                    success: function(response) {
                        // Redirect ke URL yang diterima dalam respons
                        window.location.href = `/jenis/managejenis/detail/${kode}`;
                    },
                    error: function(xhr, status, error) {
                        // Tangani kesalahan jika diperlukan
                        console.error(xhr.responseText);
                    }
                });
            });

            // Trigger the mode change event to initialize table with the default mode
            $('#mode-selector').trigger('change');
        });

        $(function() {
            $("#tbl_jenis").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tbl_jenis_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
