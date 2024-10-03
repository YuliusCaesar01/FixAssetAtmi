@extends('layouts.layout_main')
@section('title', 'Data Detail Ruang')
@section('content')
    <!-- Content Wrapper. Contatipe page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail Ruang</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('manageruang.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Detail Ruang</li>
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
                                <h4 class="m-0 text-center text-purple lead">Ruang:
                                    <span class="badge bg-purple">{{ $ruang->kode_ruang }}</span>
                                    <b>{{ $ruang->nama_ruang }}</b>
                                </h4>
                                
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="m-0 text-center" id="nama_ruang"><i class="fas fa-tags"></i>
                                            {{ $ruang->nama_ruang }}
                                        </h3>
                                        <h4 class="m-0 text-center">
                                            <span class="badge badge-primary"><i class="fas fa-barcode"></i> Kode :
                                                {{ $ruang->kode_ruang }}</span>
                                        </h4>
                                    </div>
                                    @if(auth()->user()->role_id == 19)
                                    <div class="col-6">
                                        <a href="javascript:void(0)" id="btn-edit-tipe" title="Ubah Tipe"
                                            data-di="{{ $ruang->id_ruang}}" class="btn btn-sm btn-secondary float-right">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
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
                                        <th>Keterangan</th>
                                        <th class="w-1"><i class="fas fa-bars"></i></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
            </div>
        </section>
    </div>
    @include('manageruang::modal-edit')

@endsection
