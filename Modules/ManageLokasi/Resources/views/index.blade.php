@extends('layouts.layout_main')
@section('title', 'Data Lokasi')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-6">
                            <h1 class="m-0">Data Lokasi</h1>
                        </div><!-- /.col -->
                        <div class="col-6">
                            <a href="javascript:void(0)" class="btn btn-sm btn-info float-right" id="btn-create-lokasi">
                                <i class="fas fa-plus"></i> Lokasi
                            </a>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="m-0">Lokasi</h5>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <select class="form-control form-control-sm" id="mode-selector">
                                            <option value="yayasan">Yayasan</option>
                                            <option value="smkmikael">SMK Mikael</option>
                                            <option value="politeknik">Politeknik</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-sm" id="tbl_lokasi">
                                <thead>
                                    <tr>
                                        <th>Kode Lokasi</th>
                                        <th>Nama</th>
                                        <th>Keterangan</th>
                                        <th class="w-1"><i class="fas fa-bars"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lokasi as $lok)
                                    <tr id="index_{{ $lok->id_lokasi  }}" data-iteration="{{ $loop->iteration }}" 
                                        data-nama-lokasi-yayasan="{{ $lok->nama_lokasi_yayasan }}" 
                                        data-nama-lokasi-smkmikael="{{ $lok->nama_lokasi_mikael }}" 
                                        data-nama-lokasi-politeknik="{{ $lok->nama_lokasi_politeknik }}">
                                            <td class="text-center lead">
                                                <span class="badge bg-yellow">{{ $lok->kode_lokasi }} </span>
                                            </td>
                                            <td class="nama-lokasi">{{ $lok->nama_lokasi_yayasan }}</td>
                                            <td >{{ $lok->keterangan_lokasi }}</td>

                                            <td>
                                                <a href="javascript:void(0)" id="btn-detail-lokasi"
                                                    data-di = "{{ $lok->id_lokasi }}" title="Detail Lokasi"
                                                    class="btn btn-sm btn-light">
                                                    <i class="far fa-folder-open"></i> Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Kode Lokasi</th>
                                        <th>Nama</th>
                                        <th class="w-1"><i class="fas fa-bars"></i></th>
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
    @include('managelokasi::modal-create')

@endsection
@section('scripttambahan')
    <script>
        $(document).ready(function() {
            // Handle mode change event
            $('#mode-selector').change(function() {
                let selectedMode = $(this).val();

                // Loop through each row and update the "Nama" column based on the selected mode
                $('#tbl_lokasi tbody tr').each(function() {
                    let namaLokasi;
                    switch (selectedMode) {
                        case 'yayasan':
                            namaLokasi = $(this).data('nama-lokasi-yayasan');
                            break;
                        case 'smkmikael':
                            namaLokasi = $(this).data('nama-lokasi-smkmikael');
                            break;
                        case 'politeknik':
                            namaLokasi = $(this).data('nama-lokasi-politeknik');
                            break;
                    }
                    $(this).find('.nama-lokasi').text(namaLokasi);
                });
            });

            // Button detail post event
            $('body').on('click', '#btn-detail-lokasi', function() {
                let kode = $(this).data('di');

                $.ajax({
                    type: "GET",
                    success: function(response) {
                        // Redirect ke URL yang diterima dalam respons
                        window.location.href =
                            `/lokasi/managelokasi/detail/${kode}`;
                    },
                    error: function(xhr, status, error) {
                        // Tangani kesalahan jika diperlukan
                        console.error(xhr.responseText);
                    }
                });

            });
        });

        $(function() {
            $("#tbl_lokasi").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tbl_lokasi_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
