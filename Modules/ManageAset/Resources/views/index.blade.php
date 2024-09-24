@extends('layouts.layout_main')
@section('title', 'Data Aset Tetap')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-6">
                            <h1 class="m-0">Data Aset</h1>
                        </div><!-- /.col -->
                        <div class="col-6">
                            @can('addfa')
                                <a href="{{ route('manageaset.create') }}" class="btn btn-sm btn-info float-right"
                                    id="btn-create-aset">
                                    <i class="fas fa-plus"></i> Aset Tetap
                                </a>
                            @endcan
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card card-info card-outline collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">Pilih Kategori Aset Tetap (Fixed Asset)</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        cltaass="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('manageaset.index') }}" method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Institusi</label>
                                            <select id="institusi" name="id_institusi" class="form-control select2"
                                                style="width: 100%;">
                                                <option value="">- Pilih Institusi -</option>
                                                @foreach ($institusi as $ins)
                                                    <option value="{{ $ins->id_institusi }}">
                                                        {{ $ins->nama_institusi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Divisi</label>
                                            <select id="divisi" name="id_divisi" class="form-control select2"
                                                style="width: 100%;">
                                                <option value=''>- Pilih Divisi -</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <select id="lokasi" name="id_lokasi" class="form-control select2"
                                                style="width: 100%;">
                                                <option value="">- Pilih Lokasi -</option>
                                                @foreach ($lokasi as $lk)
                                                    <option value="{{ $lk->id_lokasi }}">
                                                        {{ $lk->nama_lokasi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Ruang</label>
                                            <select id="ruang" name="id_ruang" class="form-control select2"
                                                style="width: 100%;">
                                                <option value=''>- Pilih Ruang -</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Tipe</label>
                                            <select id="tipe" name="id_tipe" class="form-control select2"
                                                style="width: 100%;">
                                                <option value=''>- Pilih Tipe -</option>
                                                @foreach ($tipe as $tp)
                                                    <option value="{{ $tp->id_tipe }}">
                                                        {{ $tp->nama_tipe }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Kelompok</label>
                                            <select id="kelompok" name="id_kelompok" class="form-control select2"
                                                style="width: 100%;">
                                                <option value=''>- Pilih Kelompok -</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Jenis</label>
                                            <select id="jenis" name="id_jenis" class="form-control select2"
                                                style="width: 100%;" data-placeholder="- Pilih Jenis -">
                                                <option value=''>- Pilih Jenis -</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nama_barang" class="control-label">Nama Barang</label>
                                            <input type="text" class="form-control" name="nama_barang" id="nama_barang">
                                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="control-label">Tahun Diterima</label>
                                            <input type="text" class="form-control" name="tahun_diterima"
                                                data-inputmask='"mask": "9999"' data-mask>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-info">CARI <i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Semua Aset Tetap (Fixed Asset)</h3>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                                </div>
                            @endif
                            <table id="tbl_permintaanfa" class="table table-striped table-sm" id="tbl_fa">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Fixed Asset</th>
                                        <th>Nama Aset</th>
                                        <th>Tahun</th>
                                        <th>Transaksi</th>
                                        <th>Kondisi</th>
                                        <th class="w-1"><i class="fas fa-bars"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aset as $ast)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-center lead">
                                                <span class="badge bg-primary">{{ $ast->kode_fa }} </span>
                                            </td>
                                            <td>{{ $ast->nama_barang }}</td>
                                            <td>{{ $ast->tahun_diterima }}</td>
                                            <td>{{ $ast->status_transaksi }}</td>
                                            <td>{{ $ast->status_barang }}</td>
                                            <td>
                                                <a href="{{ route('manageaset.detail', $ast->kode_fa) }}"
                                                    title="Detail Aset" class="btn btn-sm btn-light">
                                                    <i class="far fa-folder-open"></i> Detail
                                                </a>
                                                @role('superadmin')
                                                    @if ($ast->status_fa == 0)
                                                        <button id="validateButton"
                                                            class="btn btn-sm btn-danger validate-asset"
                                                            data-id="{{ $ast->kode_fa }}" title="Valid Aset">
                                                            <i class="fa fa-check"></i> Cek Aset
                                                        </button>
                                                    @endif
                                                @endrole
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Fixed Asset</th>
                                        <th>Nama Aset</th>
                                        <th>Tahun</th>
                                        <th>Transaksi</th>
                                        <th>Kondisi</th>
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
@endsection
@section('scripttambahan')
    <!-- InputMask -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            //button create post event
            $('body').on('click', '#btn-detail-aset', function() {
                let kode = $(this).data('di');

                $.ajax({
                    type: "GET",
                    success: function(response) {
                        // Redirect ke URL yang diterima dalam respons
                        window.location.href = `/aset/manageaset/detail/${kode}`;
                    },
                    error: function(xhr, status, error) {
                        // Tangani kesalahan jika diperlukan
                        console.error(xhr.responseText);
                    }
                });

            });

            $('#institusi').on('change', function() {
                let institusiId = $(this).val();

                $.ajax({
                    url: '{{ route('getDivisi') }}',
                    type: 'GET',
                    data: {
                        'id_institusi': institusiId
                    },
                    success: function(data) {
                        if (data) {
                            let all_option = "<option value=''>- Pilih Divisi -</option>";
                            $('#divisi').empty();
                            $.each(data, function(key, value) {
                                all_option += "<option value='" + value.id_divisi +
                                    "'>" + value.nama_divisi + "</option>";
                                // $('#divisi').append('<option value="' + value.id_divisi +
                                //     '">' + value.nama_divisi + '</option>');
                            });
                            $('#divisi').html(all_option);
                        }
                    }
                });
            });

            $('#tipe').on('change', function() {
                let tipeId = $(this).val();

                $.ajax({
                    url: '{{ route('getKelompok') }}',
                    type: 'GET',
                    data: {
                        'id_tipe': tipeId
                    },
                    success: function(data) {
                        if (data) {
                            let all_option = "<option value=''>- Pilih Kelompok -</option>";
                            $('#kelompok').empty();
                            $.each(data, function(key, value) {
                                all_option += "<option value='" + value.id_kelompok +
                                    "'>" + value.nama_kelompok + "</option>";
                            });
                            $('#kelompok').html(all_option);
                        }
                    }
                });
            });

            $('#kelompok').on('change', function() {
                let kelompokId = $(this).val();

                $.ajax({
                    url: '{{ route('getJenis') }}',
                    type: 'GET',
                    data: {
                        'id_kelompok': kelompokId
                    },
                    success: function(data) {
                        if (data && data.length > 0) {
                            let all_option = "<option value=''>- Pilih Jenis -</option>";
                            $('#jenis').empty();
                            $.each(data, function(key, value) {
                                all_option += '<option value="' +
                                    value.id_jenis +
                                    '">' + value.nama_jenis + '</option>';
                            });
                            $('#jenis').html(all_option);
                        }
                    }
                });
            });

            $('#lokasi').on('change', function() {
                let lokasiId = $(this).val();
                let divisiId = $('#divisi').val();

                $.ajax({
                    url: '{{ route('getRuang') }}',
                    type: 'GET',
                    data: {
                        'id_lokasi': lokasiId,
                        'id_divisi': divisiId
                    },
                    success: function(data) {
                        if (data && data.length > 0) {
                            let all_option = "<option value=''>- Pilih Ruang -</option>";
                            $('#ruang').empty();
                            $.each(data, function(key, value) {
                                all_option += '<option value="' +
                                    value.id_ruang +
                                    '">' + value.nama_ruang + '</option>';
                            });
                            $('#ruang').html(all_option);
                        } else {
                            $('#ruang').empty();
                        }
                    }
                });
            });
            $('[data-mask]').inputmask()
        });
    </script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#tbl_fa").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tbl_fa_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        //message with toastr
        @if (session()->has('notification'))

            var isi = @json(session('notification'));
            Swal.fire({
                icon: 'success',
                title: 'Hei...',
                text: isi,
                showConfirmButton: false,
                timer: 2500
            });
        @endif
    </script>
    <script>
        $(document).ready(function() {
            $('.validate-asset').click(async function() {
                var assetId = $(this).data('id');

                const confirmed = await confirmValidation();

                if (confirmed) {
                    await performValidation(assetId);
                }
            });

            async function confirmValidation() {
                const result = await Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Anda tidak dapat mengembalikan ini!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Validasi!'
                });

                return result.isConfirmed;
            }

            async function performValidation(assetId) {
                try {
                    const response = await $.ajax({
                        type: 'POST',
                        url: '{{ route('manageaset.valid_fa', ['kode_fa' => '__assetId__']) }}'
                            .replace('__assetId__', assetId),
                        data: {
                            'assetId': assetId,
                            '_token': '{{ csrf_token() }}'
                        },
                    });

                    // Tampilkan SweetAlert jika validasi berhasil
                    Swal.fire({
                        icon: 'success',
                        title: 'Hei...',
                        text: 'Validasi berhasil',
                        showConfirmButton: false,
                        timer: 2500
                    });

                    // Sembunyikan tombol setelah validasi berhasil
                    $('#validateButton').hide();
                } catch (error) {
                    // Handle the error response
                    console.log(error);

                    // Tampilkan SweetAlert jika validasi gagal
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Validasi gagal',
                    });
                }
            }
        });
    </script>

@endsection
