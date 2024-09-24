@extends('layouts.layout_main')
@section('title', 'Edit Aset Tetap')
@section('scriptheadtambahan')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-6">
                            <h1 class="m-0">Edit Data Aset</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Aset Tetap (Fixed Asset)</h3>
                            <span class="badge bg-info float-right">{{ $fa->kode_fa }} </span>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                                </div>
                            @endif
                            <form action="{{ route('manageaset.update', $fa->id_fa) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="id_fa">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Institusi</label>
                                            <select id="institusi" name="id_institusi" class="form-control select2"
                                                style="width: 100%;" required>
                                                <option value="">- Pilih Institusi -</option>
                                                @foreach ($institusi as $ins)
                                                    <option value="{{ $ins->id_institusi }}"
                                                        {{ $ins->id_institusi == $fa->id_institusi ? 'selected' : '' }}>
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
                                                style="width: 100%;" required>
                                                <option value=''>- Pilih Divisi -</option>
                                                @foreach ($divisi as $dv)
                                                    <option value="{{ $dv->id_divisi }}"
                                                        {{ $dv->id_divisi == $fa->id_divisi ? 'selected' : '' }}>
                                                        {{ $dv->nama_divisi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <select id="lokasi" name="id_lokasi" class="form-control select2"
                                                style="width: 100%;" required>
                                                <option value="">- Pilih Lokasi -</option>
                                                @foreach ($lokasi as $lk)
                                                    <option value="{{ $lk->id_lokasi }}"
                                                        {{ $lk->id_lokasi == $fa->id_lokasi ? 'selected' : '' }}>
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
                                                style="width: 100%;" required>
                                                <option value=''>- Pilih Ruang -</option>
                                                @foreach ($ruang as $r)
                                                    <option value="{{ $r->id_ruang }}"
                                                        {{ $r->id_ruang == $fa->id_ruang ? 'selected' : '' }}>
                                                        {{ $r->nama_ruang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Tipe</label>
                                            <select id="tipe" name="id_tipe" class="form-control select2"
                                                style="width: 100%;" required>
                                                <option value=''>- Pilih Tipe -</option>
                                                @foreach ($tipe as $tp)
                                                    <option value="{{ $tp->id_tipe }}"
                                                        {{ $tp->id_tipe == $fa->id_tipe ? 'selected' : '' }}>
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
                                                style="width: 100%;" required>
                                                <option value=''>- Pilih Kelompok -</option>
                                                @foreach ($kelompok as $kl)
                                                    <option value="{{ $kl->id_kelompok }}"
                                                        {{ $kl->id_kelompok == $fa->id_kelompok ? 'selected' : '' }}>
                                                        {{ $kl->nama_kelompok }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Jenis</label>
                                            <select id="jenis" name="id_jenis" class="form-control select2"
                                                style="width: 100%;" data-placeholder="- Pilih Jenis -" required>
                                                <option value=''>- Pilih Jenis -</option>
                                                @foreach ($jenis as $jn)
                                                    <option value="{{ $jn->id_jenis }}"
                                                        {{ $jn->id_jenis == $fa->id_jenis ? 'selected' : '' }}>
                                                        {{ $jn->nama_jenis }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="nama_barang" class="control-label">Nama Barang</label>
                                            <input type="text" class="form-control" name="nama_barang"
                                                value="{{ $fa->nama_barang }}" id="nama_barang" required>
                                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="control-label">Tahun Diterima</label>
                                            <input type="text" class="form-control" name="tahun_diterima"
                                                value="{{ $fa->tahun_diterima }}" data-inputmask='"mask": "9999"'
                                                data-mask>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="no_permintaan" class="control-label">No Surat Permintaan
                                                (SPA)</label>
                                            <input type="text" class="form-control" name="no_permintaan"
                                                value="{{ $fa->no_permintaan }}" id="no_permintaan">
                                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-no">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="formdes_barang" class="control-label">Deskripsi Detail Barang</label>
                                    <textarea class="form-control" rows="3" name="des_barang" id="formdes_barang"> {!! $fa->des_barang !!}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status Transaksi Barang</label>
                                            <select id="status_transaksi" class="form-control" name="status_transaksi"
                                                style="width: 100%;" required>
                                                <option value="Pengadaan Baru"
                                                    {{ 'Pengadaan Baru' == $fa->status_transaksi ? 'selected' : '' }}>
                                                    Pengadaan Baru</option>
                                                <option value="Penjualan"
                                                    {{ 'Penjualan' == $fa->status_transaksi ? 'selected' : '' }}>Penjualan
                                                </option>
                                                <option value="Pemindahan"
                                                    {{ 'Pemindahan' == $fa->status_transaksi ? 'selected' : '' }}>
                                                    Pemindahan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status Kondisi Barang</label>
                                            <select id="status_barang" class="form-control" name="status_barang"
                                                style="width: 100%;" required>
                                                <option value="baik(100%)"
                                                    {{ 'baik (100%)' == $fa->status_barang ? 'selected' : '' }}>Baik (100%)
                                                </option>
                                                <option value="cukup(50%)"
                                                    {{ 'cukup (50%)' == $fa->status_barang ? 'selected' : '' }}>Cukup (50%)
                                                </option>
                                                <option value="rusak"
                                                    {{ 'rusak' == $fa->status_barang ? 'selected' : '' }}>Rusak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <img src="{{ asset('storage/foto_barang/' . $fa->foto_barang) }}"
                                            class="product-image" alt="Foto Barang Aset">
                                    </div>
                                    <div class="col-9">
                                        <div class="form-group">
                                            <label for="InputFile">File Foto Barang</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile"
                                                    name="foto_barang">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
                            </form>
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
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#institusi').on('change', function() {
                let institusiId = $(this).val();
                if (institusiId == "") {
                    $("#divisi").html("<option value=''>- Pilih Divisi -</option>");
                }

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
                            });

                            $('#divisi').html(all_option);
                        }
                    }
                });
            });

            $('#tipe').on('change', function() {
                let tipeId = $(this).val();
                if (tipeId == "") {
                    $("#kelompok").html("<option value=''>- Pilih Kelompok -</option>");
                }

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
                if (kelompokId == "") {
                    $("#jenis").html("<option value=''>- Pilih Jenis -</option>");
                }

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
                if (lokasiId == "") {
                    $("#ruang").html("<option value=''>- Pilih Ruang -</option>");
                }

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
            $('#formdes_barang').summernote({
                height: 100, //set editable area's height,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['para', ['ul', 'ol']],
                ],
                placeholder: 'Spesifikasi, warna, bahan, nomor barang lainnya ...'
            });
            bsCustomFileInput.init();
        });
    </script>
    @if (session('notification'))
        <script>
            var isi = @json(session('notification'));
            Swal.fire({
                icon: 'success',
                title: 'Hei...',
                text: isi,
                showConfirmButton: false,
                timer: 2500
            });
        </script>
    @endif
@endsection
