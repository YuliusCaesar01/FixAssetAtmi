@extends('layouts.layout_main')
@section('title', 'Data Kelompok Barang')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-6">
                            <h1 class="m-0">Data Kelompok</h1>
                        </div><!-- /.col -->
                        <div class="col-6">
                            <a href="javascript:void(0)" class="btn btn-sm btn-info float-right" id="btn-create-kelompok">
                                <i class="fas fa-plus"></i> Kelompok
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
                                    <h5 class="m-0">Kelompok</h5>
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
                            <table id="tbl_kelompok" class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tipe</th>
                                        <th>Nama</th>
                                        <th>Kode Kelompok</th>
                                        <th class="w-1"><i class="fas fa-bars"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kelompok as $kl)
                                        <tr id="index_{{ $kl->id_kelompok }}" data-iteration="{{ $loop->iteration }}"
                                            data-nama-tipe-yayasan="{{ $kl->tipe->nama_tipe_yayasan }}"
                                            data-nama-tipe-smkmikael="{{ $kl->tipe->nama_tipe_mikael }}"
                                            data-nama-tipe-politeknik="{{ $kl->tipe->nama_tipe_politeknik }}"
                                            data-nama-kelompok-yayasan="{{ $kl->nama_kelompok_yayasan }}"
                                            data-nama-kelompok-smkmikael="{{ $kl->nama_kelompok_mikael }}"
                                            data-nama-kelompok-politeknik="{{ $kl->nama_kelompok_politeknik }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="nama-tipe">{{ $kl->tipe->nama_tipe_yayasan }}</td>
                                            <td class="nama-kelompok">{{ $kl->nama_kelompok_yayasan }}</td>
                                            <td class="text-center lead">
                                                <span class="badge bg-pink">{{ $kl->kode_kelompok }}</span>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" id="btn-detail-kelompok"
                                                    data-di="{{ $kl->id_kelompok }}" title="Detail Kelompok"
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
                                        <th>Tipe</th>
                                        <th>Nama</th>
                                        <th>Kode Kelompok</th>
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
    @include('managekelompok::modal-create')
@endsection

@section('scripttambahan')
    <script>
        $(document).ready(function() {
            // Handle mode change event
            $('#mode-selector').change(function() {
                let selectedMode = $(this).val();

                // Loop through each row and update the "Nama" and "Tipe" columns based on the selected mode
                $('#tbl_kelompok tbody tr').each(function() {
                    let namaKelompok;
                    let namaTipe;
                    switch (selectedMode) {
                        case 'yayasan':
                            namaKelompok = $(this).data('nama-kelompok-yayasan');
                            namaTipe = $(this).data('nama-tipe-yayasan');
                            break;
                        case 'smkmikael':
                            namaKelompok = $(this).data('nama-kelompok-smkmikael');
                            namaTipe = $(this).data('nama-tipe-smkmikael');
                            break;
                        case 'politeknik':
                            namaKelompok = $(this).data('nama-kelompok-politeknik');
                            namaTipe = $(this).data('nama-tipe-politeknik');
                            break;
                    }
                    $(this).find('.nama-kelompok').text(namaKelompok);
                    $(this).find('.nama-tipe').text(namaTipe);
                });
            });

            // Button create post event
            $('body').on('click', '#btn-detail-kelompok', function() {
                let kode = $(this).data('di');

                $.ajax({
                    type: "GET",
                    success: function(response) {
                        // Redirect to the URL received in the response
                        window.location.href = `/kelompok/managekelompok/detail/${kode}`;
                    },
                    error: function(xhr, status, error) {
                        // Handle errors if needed
                        console.error(xhr.responseText);
                    }
                });
            });

            // Trigger the mode change event to initialize table with the default mode
            $('#mode-selector').trigger('change');
        });

        $(function() {
            $("#tbl_kelompok").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tbl_kelompok_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
