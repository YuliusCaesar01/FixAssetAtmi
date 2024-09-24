@extends('layouts.layout_main')
@section('title', 'Data Detail Kelompok')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail Kelompok</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('managekelompok.index') }}">Kelompok</a></li>
                            <li class="breadcrumb-item active">Detail Kelompok</li>
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
                                <h4 class="m-0 text-center text-purple lead">Tipe :
                                    <span class="badge bg-purple">{{ $tipe->kode_tipe }}</span> {{ $tipe->nama_tipe }}
                                </h4>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="m-0 text-center" id="nama_kelompok"><i class="fas fa-building"></i>
                                            {{ $kelompok->nama_kelompok }}
                                        </h3>
                                        <h4 class="m-0 text-center">
                                            <span class="badge badge-primary"><i class="fas fa-barcode"></i> Kode :
                                                {{ $kelompok->kode_kelompok }}</span>
                                        </h4>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0)" id="btn-edit-kelompok" title="Ubah Kelompok"
                                            data-di="{{ $kelompok->id_kelompok }}" class="btn btn-sm btn-secondary float-right">
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
                        <div class="row">
                            <div class="col-6">
                                <h3 class="card-title">Jenis</h3>
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
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tbl_jenis" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Jenis</th>
                                    <th>Kode Jenis</th>
                                    <th><i class="fas fa-bars"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenis as $jn)
                                    <tr id="index_{{ $jn->id_jenis }}"
                                        data-nama-jenis-yayasan="{{ $jn->nama_jenis_yayasan }}"
                                        data-nama-jenis-smkmikael="{{ $jn->nama_jenis_mikael }}"
                                        data-nama-jenis-politeknik="{{ $jn->nama_jenis_politeknik }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="nama-jenis">{{ $jn->nama_jenis }}</td>
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
                                    <th>Nama Jenis</th>
                                    <th>Kode Jenis</th>
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

    @include('managekelompok::modal-edit')
@endsection

@section('scripttambahan')
    <script>
        $(document).ready(function() {
            // Handle mode change event
            $('#mode-selector').change(function() {
                let selectedMode = $(this).val();

                // Update the "Nama Jenis" column based on the selected mode
                $('#tbl_jenis tbody tr').each(function() {
                    let namaJenis;
                    switch (selectedMode) {
                        case 'yayasan':
                            namaJenis = $(this).data('nama-jenis-yayasan');
                            break;
                        case 'smkmikael':
                            namaJenis = $(this).data('nama-jenis-smkmikael');
                            break;
                        case 'politeknik':
                            namaJenis = $(this).data('nama-jenis-politeknik');
                            break;
                    }
                    $(this).find('.nama-jenis').text(namaJenis);
                });
            });

            // Trigger the mode change event to initialize table with the default mode
            $('#mode-selector').trigger('change');

            $("#tbl_jenis").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tbl_jenis_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection

