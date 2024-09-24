@extends('layouts.layout_main')
@section('title', 'Data Ruang')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-6">
                            <h1 class="m-0">Data Ruang</h1>
                        </div><!-- /.col -->
                        <div class="col-6">
                            <a href="javascript:void(0)" class="btn btn-sm btn-info float-right" id="btn-create-ruang">
                                <i class="fas fa-plus"></i> Ruang
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
                                    <h5 class="m-0">Ruang</h5>
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
                            <table id="tbl_ruang" class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Ruang</th>
                                        <th>Kode Ruang</th>
                                        <th class="w-1"><i class="fas fa-bars"></i></th>
                                    </tr>
                                </thead>
                                <tbody id="ruang-body">
                                    @foreach ($ruang as $rg)
                                        <tr id="index_{{ $rg->id_ruang }}" data-iteration="{{ $loop->iteration }}" 
                                            data-nama-ruang-yayasan="{{ $rg->nama_ruang_yayasan }}" 
                                            data-nama-ruang-smkmikael="{{ $rg->nama_ruang_mikael }}" 
                                            data-nama-ruang-politeknik="{{ $rg->nama_ruang_politeknik }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="nama-ruang">{{ $rg->nama_ruang_yayasan }}</td>
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
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
    </div>
    @include('manageruang::modal-create')

@endsection

@section('scripttambahan')
    <script>
        $(document).ready(function() {
            // Handle mode change event
            $('#mode-selector').change(function() {
                let selectedMode = $(this).val();

                // Loop through each row and update the "Nama Ruang" column based on the selected mode
                $('#ruang-body tr').each(function() {
                    let namaRuang;
                    switch (selectedMode) {
                        case 'yayasan':
                            namaRuang = $(this).data('nama-ruang-yayasan');
                            break;
                        case 'smkmikael':
                            namaRuang = $(this).data('nama-ruang-smkmikael');
                            break;
                        case 'politeknik':
                            namaRuang = $(this).data('nama-ruang-politeknik');
                            break;
                    }
                    $(this).find('.nama-ruang').text(namaRuang);
                });
            });

            // Detail button event
            $('body').on('click', '#btn-detail-ruang', function() {
                let kode = $(this).data('di');

                $.ajax({
                    type: "GET",
                    success: function(response) {
                        window.location.href = `/ruang/manageruang/detail/${kode}`;
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

        // DataTables initialization
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
