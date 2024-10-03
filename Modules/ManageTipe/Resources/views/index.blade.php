@extends('layouts.layout_main')
@section('title', 'Data Tipe')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-6">
                            <h1 class="m-0">Data Tipe</h1>
                        </div><!-- /.col -->
                        @if(auth()->user()->role_id == 19)

                        <div class="col-6">
                            <a href="javascript:void(0)" class="btn btn-sm btn-info float-right" id="btn-create-kelompok">
                                <i class="fas fa-plus"></i> Tipe
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
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="m-0">Tipe</h5>
                                </div>
                              
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="tbl_tipe" class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Tipe</th>
                                        <th>Nama</th>
                                        <th class="w-1"><i class="fas fa-bars"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipe as $tp)
                                        <tr id="index_{{ $tp->id_tipe }}" data-iteration="{{ $loop->iteration }}"
                                            data-nama-tipe-yayasan="{{ $tp->nama_tipe_yayasan }}"
                                            data-nama-tipe-mikael="{{ $tp->nama_tipe_mikael }}"
                                            data-nama-tipe-politeknik="{{ $tp->nama_tipe_politeknik }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-center lead">
                                                <span class="badge bg-green">{{ $tp->kode_tipe }}</span>
                                            </td>
                                            <td class="nama-tipe">{{ $tp->nama_tipe_yayasan }}</td>
                                            <td>
                                                <a href="javascript:void(0)" id="btn-detail-tipe"
                                                    data-di="{{ $tp->id_tipe }}" title="Detail Tipe"
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
                                        <th>Kode Tipe</th>
                                        <th>Nama</th>
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
    @include('managetipe::modal-create')
@endsection

@section('scripttambahan')
    <script>
        $(document).ready(function() {
            // Handle mode change event
            $('#mode-selector').change(function() {
                let selectedMode = $(this).val();

                // Loop through each row and update the "Nama" column based on the selected mode
                $('#tbl_tipe tbody tr').each(function() {
                    let namaTipe;
                    switch (selectedMode) {
                        case 'yayasan':
                            namaTipe = $(this).data('nama-tipe-yayasan');
                            break;
                        case 'mikael':
                            namaTipe = $(this).data('nama-tipe-mikael');
                            break;
                        case 'politeknik':
                            namaTipe = $(this).data('nama-tipe-politeknik');
                            break;
                    }
                    $(this).find('.nama-tipe').text(namaTipe);
                });
            });

            // Button create post event
            $('body').on('click', '#btn-detail-tipe', function() {
                let kode = $(this).data('di');

                $.ajax({
                    type: "GET",
                    success: function(response) {
                        // Redirect ke URL yang diterima dalam respons
                        window.location.href = `/tipe/managetipe/detail/${kode}`;
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
            $("#tbl_tipe").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tbl_tipe_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection

