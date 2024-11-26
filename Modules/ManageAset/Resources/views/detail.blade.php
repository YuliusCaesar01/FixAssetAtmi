@extends('layouts.layout_main')
@section('title', 'Data Detail Aset Tetap')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail Aset Tetap</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('manageaset.index') }}">Aset Tetap</a></li>
                            <li class="breadcrumb-item active">Detail Aset Tetap</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block"> <b>Fix Asset {{ ucfirst($fa->nama_barang) }} </b></h3>
                            <div class="col-12">
                                <img src="{{ $fa->foto_barang ? asset('uploads/photos/' . basename($fa->foto_barang)) : asset('boxs.png') }}" class="product-image" alt="Foto Barang Aset">
                                
                                <p class="float-right">Dibuat Oleh: <b>{{ ucfirst($fa->user->username) }}</b></p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            {{-- <a href="{{ route('manageaset.edit', $fa->id_fa) }}"
                                class="btn btn-xs btn-default float-right text-info" id="btn-create-aset">
                                <i class="fas fa-pen-square"></i> Aset
                            </a> --}}
                            <h4 class="my-3">Kode : <span class="badge bg-info">{{ $fa->kode_fa }} </span></h4>
                            <hr>
                            <h5>Kategori Barang</h5>
                            <dl class="row">
                                <dt class="col-sm-4">Lokasi</dt>
                                <dd class="col-sm-8">{{ $fa->lokasi->kode_lokasi . ' - ' . $fa->lokasi->nama_lokasi_yayasan }}</dd>
                                <dt class="col-sm-4">Institusi</dt>
                                <dd class="col-sm-8">
                                    {{ $fa->institusi->kode_institusi . ' - ' . $fa->institusi->nama_institusi }}</dd>
                                <dt class="col-sm-4">Kelompok</dt>
                                <dd class="col-sm-8">
                                        {{ $fa->kelompok->kode_kelompok . ' - ' . $fa->kelompok->nama_kelompok_yayasan }}
                                </dd>
                                <dt class="col-sm-4">Jenis</dt>
                                <dd class="col-sm-8">{{ $fa->jenis->kode_jenis . ' - ' . $fa->jenis->nama_jenis_yayasan }}</dd>
                                <dt class="col-sm-4">Ruang</dt>
                                <dd class="col-sm-8">{{ $fa->ruang->kode_ruang . ' - ' . $fa->ruang->nama_ruang_yayasan }}</dd>
                                <dt class="col-sm-4">Tipe</dt>
                                <dd class="col-sm-8">{{ $fa->tipe->kode_tipe . ' - ' . $fa->tipe->nama_tipe_yayasan }}</dd>
                                
                                @if ($fa->no_permintaan)
                                    <dt class="col-sm-4">No Surat Permintaan (SPA)</dt>
                                    <dd class="col-sm-8">{{ $fa->no_permintaan }}</dd>
                                @endif
                            </dl>
                        </div>
                    </div>
                    
                    <!-- QR Code in Bottom-Right Corner -->
                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <div class="qr-code-container">
                                <center>
                                <img src="data:image/png;base64,{{ $barcode }}" alt="QR Code" id="qrcode">
                                </center>
                                <div class="button-group">
                                    <a href="data:image/png;base64,{{ $barcode }}" download="barcode.png">
                                            <button type="submit" class="btn btn-primary">Download QR Code</button>
                                        
                                        
                                                                            </a>
                                                                            <a href="{{ route('aset.detailbarcode', ['kode_fa' => $fa->kode_fa]) }}" class="btn btn-info">AfterScan</a>
                                                                            <button class="btn btn-secondary" onclick="printQRCode()">Print QR Code</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                    href="#product-desc" role="tab" aria-controls="product-desc"
                                    aria-selected="true">Description</a>
                                <a class="nav-item nav-link" id="product-history-tab" data-toggle="tab"
                                    href="#product-history" role="tab" aria-controls="product-history"
                                    aria-selected="false">History Ajuan</a>
                              
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                                aria-labelledby="product-desc-tab">
                                <p class="lead">Deskripsi :</p>
                                <p>{!! $fa->des_barang !!}</p>
                            </div>
                            <div class="tab-pane fade" id="product-history" role="tabpanel"
                                aria-labelledby="product-history-tab">
                                <dl class="row">
                                    
                                    <dt class="col-sm-4">STATUS :</dt>
                                    <dd class="col-sm-8">: {{ $fa->status_transaksi}}</dd>
                                    <br>
                                    @if($fa->no_permintaan != null)
                                    <dt class="col-sm-4">Pengajuan ID</dt>
                                    <dd class="col-sm-4">: {{ $fa->no_permintaan }}</dd>
                                    @endif
                                    <br>
                                    <dt class="col-sm-4">Jumlah Unit</dt>
                                    <dd class="col-sm-4">: {{ $fa->jumlah_unit }}</dd>
                                    <br>
                                    @if($fa->unit_asal != null)
                                    <dt class="col-sm-4">Unit Asal Aset</dt>
                                    <dd class="col-sm-8">: {{ ucfirst($fa->unit_asal) }}</dd>
                                   
                              
                                    @endif
                                   
                                    
                                
                                </dl>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                <!-- /.card-body -->
            </div>
        </section>
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
    <!-- Page specific script -->
    <script>
        $(document).ready(function() {
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

        function printQRCode() {
            var qrCodeImg = document.getElementById('qrcode');
            var printWindow = window.open('', '', 'height=400,width=600');
            printWindow.document.write('<html><head><title>Print QR Code</title></head><body>');
            printWindow.document.write('<img src="' + qrCodeImg.src + '" style="width: 100%;">');
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
        }
    </script>
  
@endsection


