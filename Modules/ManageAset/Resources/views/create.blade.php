@extends('layouts.layout_main')
@section('title', 'Tambah Aset Tetap')
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
                            <h1 class="m-0">Tambah Data Aset</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header d-flex p-0">
                            <h3 class="card-title p-3">Aset Tetap</h3>
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tambah
                                        Aset</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tambah Aset
                                        Masal</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <form action="{{ route('manageaset.store') }}" enctype="multipart/form-data"
                                        method="post">
                                        @csrf

                                            @if(session('success'))
                                            <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif

                                        @if($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <input type="hidden" id="id_fa">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Instansi</label>
                                                    <select id="instansi" name="instansi" class="form-control" style="width: 100%;" required>
                                                        <option value="">- Pilih Instansi -</option>
                                                        <option value="yayasan">Yayasan</option>
                                                        <option value="mikael">SMK Mikael</option>
                                                        <option value="politeknik">Politeknik</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Lokasi</label>
                                                    <select id="lokasi" name="id_lokasi" class="form-control select2" style="width: 100%;" required>
                                                        <option value="">- Pilih Lokasi -</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Ruang</label>
                                                    <select id="ruang" name="id_ruang" class="form-control select2" style="width: 100%;" required>
                                                        <option value="">- Pilih Ruang -</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Tipe</label>
                                                    <select id="tipe" name="id_tipe" class="form-control select2" style="width: 100%;" required>
                                                        <option value="">- Pilih Tipe -</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Kelompok</label>
                                                    <select id="kelompok" name="id_kelompok" class="form-control select2" style="width: 100%;" required >
                                                        <option value="">- Pilih Kelompok -</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Jenis</label>
                                                    <select id="jenis" name="id_jenis" class="form-control select2" style="width: 100%;" data-placeholder="- Pilih Jenis -" required >
                                                        <option value="">- Pilih Jenis -</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="nama_barang" class="control-label">Nama Barang</label>
                                                    <input type="text" class="form-control" name="nama_barang"
                                                        id="nama_barang" required>
                                                    <div class="alert alert-danger mt-2 d-none" role="alert"
                                                        id="alert-nama">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Tahun Diterima</label>
                                                    <input type="text" class="form-control" name="tahun_diterima"
                                                        data-inputmask='"mask": "9999"' data-mask>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="no_permaintaan" class="control-label">No Surat
                                                        Permintaan
                                                        (SPA)</label>
                                                    <input type="text" class="form-control" name="no_permaintaan"
                                                        id="no_permaintaan" required>
                                                    <div class="alert alert-danger mt-2 d-none" role="alert"
                                                        id="alert-no">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="formdes_barang" class="control-label">Deskripsi Detail
                                                Barang</label>
                                            <textarea class="form-control" rows="3" name="des_barang" id="formdes_barang"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Status Transaksi Barang</label>
                                                    <select id="status_transaksi" class="form-control"
                                                        name="status_transaksi" style="width: 100%;" required>
                                                        <option value="Pengadaan Baru">Pengadaan Baru</option>
                                                        <option value="Penjualan">Penjualan</option>
                                                        <option value="Pemindahan">Pemindahan</option>
                                                        <option value="Pemindahan">Perbaikan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Status Kondisi Barang</label>
                                                    <select id="status_barang" class="form-control" name="status_barang"
                                                        style="width: 100%;" required>
                                                        <option value="baik(100%)">baik(100%)</option>
                                                        <option value="cukup(50%)">cukup(50%)</option>
                                                        <option value="rusak">rusak</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputFile">File Foto Barang</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile"
                                                    name="foto_barang" required>
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
                                    </form>
                                </div>
                               
                            </div>
                             <!-- /.tab-pane -->
                             <div class="tab-pane" id="tab_2">
                                <p>Download Template :
                                    <a class="text-info"
                                        href="{{ asset('upload_masal_fixed_asset.csv') }}">upload_masal_fixed_asset.csv</a>
                                </p>
                                <form action="{{ route('manageaset.uploadmasal') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="InputFile">File Excel</label>
                                        <div class="custom-file">
                                            <input type="file" name="file" accept=".xls, .xlsx"
                                                class="custom-file-input form-control-file" id="customFile" required>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-success btn-block">Import User Data</button>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- ./card -->
                </div>
            </div>
            <!-- /.content -->
        </div>
    </div>
@endsection
@section('scripttambahan')
    <!-- InputMask -->
    <script>
        const lokasiYayasan = [
            @foreach ($lokasi as $lk)
                { id: '{{ $lk->id_lokasi }}', nama: '{{ $lk->nama_lokasi_yayasan }}' },
            @endforeach
        ];
    
        const lokasiMikael = [
            @foreach ($lokasi as $lk)
                { id: '{{ $lk->id_lokasi }}', nama: '{{ $lk->nama_lokasi_mikael }}' },
            @endforeach
        ];
    
        const lokasiPoliteknik = [
            @foreach ($lokasi as $lk)
                { id: '{{ $lk->id_lokasi }}', nama: '{{ $lk->nama_lokasi_politeknik }}' },
            @endforeach
        ];
    
        const ruangYayasan = [
            @foreach ($ruang as $rg)
                { id: '{{ $rg->id_ruang }}', nama: '{{ $rg->nama_ruang_yayasan }}' },
            @endforeach
        ];
    
        const ruangMikael = [
            @foreach ($ruang as $rg)
                { id: '{{ $rg->id_ruang }}', nama: '{{ $rg->nama_ruang_mikael }}' },
            @endforeach
        ];
    
        const ruangPoliteknik = [
            @foreach ($ruang as $rg)
                { id: '{{ $rg->id_ruang }}', nama: '{{ $rg->nama_ruang_politeknik }}' },
            @endforeach
        ];
    
        const tipeYayasan = [
            @foreach ($tipe as $tp)
                { id: '{{ $tp->id_tipe }}', nama: '{{ $tp->nama_tipe_yayasan }}' },
            @endforeach
        ];
    
        const tipeMikael = [
            @foreach ($tipe as $tp)
                { id: '{{ $tp->id_tipe}}', nama: '{{ $tp->nama_tipe_mikael }}' },
            @endforeach
        ];
    
        const tipePoliteknik = [
            @foreach ($tipe as $tp)
                { id: '{{ $tp->id_tipe }}', nama: '{{ $tp->nama_tipe_politeknik }}' },
            @endforeach
        ];
    
        const kelompokYayasan = [
            @foreach ($kelompok as $kp)
                { id: '{{ $kp->id_kelompok }}', nama: '{{ $kp->nama_kelompok_yayasan }}' },
            @endforeach
        ];
    
        const kelompokMikael = [
            @foreach ($kelompok as $kp)
                { id: '{{ $kp->id_kelompok }}', nama: '{{ $kp->nama_kelompok_mikael }}' },
            @endforeach
        ];
    
        const kelompokPoliteknik = [
            @foreach ($kelompok as $kp)
                { id: '{{ $kp->id_kelompok }}', nama: '{{ $kp->nama_kelompok_politeknik }}' },
            @endforeach
        ];
    
        const jenisYayasan = [
            @foreach ($jenis as $jn)
                { id: '{{ $jn->id_jenis }}', nama: '{{ $jn->nama_jenis_yayasan }}' },
            @endforeach
        ];
    
        const jenisMikael = [
            @foreach ($jenis as $jn)
                { id: '{{ $jn->id_jenis }}', nama: '{{ $jn->nama_jenis_mikael }}' },
            @endforeach
        ];
    
        const jenisPoliteknik = [
            @foreach ($jenis as $jn)
                { id: '{{ $jn->id_jenis }}', nama: '{{ $jn->nama_jenis_politeknik }}' },
            @endforeach
        ];
    
        document.getElementById('instansi').addEventListener('change', function () {
            const instansi = this.value;
            const lokasiSelect = document.getElementById('lokasi');
            const ruangSelect = document.getElementById('ruang');
            const tipeSelect = document.getElementById('tipe');
            const kelompokSelect = document.getElementById('kelompok');
            const jenisSelect = document.getElementById('jenis');
    
            // Update Lokasi
            lokasiSelect.innerHTML = '<option value="">- Pilih Lokasi -</option>';
            let lokasiOptions = [];
    
            if (instansi === 'yayasan') {
                lokasiOptions = lokasiYayasan;
            } else if (instansi === 'mikael') {
                lokasiOptions = lokasiMikael;
            } else if (instansi === 'politeknik') {
                lokasiOptions = lokasiPoliteknik;
            }
    
            lokasiOptions.forEach(function (lokasi) {
                const option = document.createElement('option');
                option.value = lokasi.id;
                option.textContent = lokasi.nama;
                lokasiSelect.appendChild(option);
            });
    
            // Update Ruang
            ruangSelect.innerHTML = '<option value="">- Pilih Ruang -</option>';
            let ruangOptions = [];
    
            if (instansi === 'yayasan') {
                ruangOptions = ruangYayasan;
            } else if (instansi === 'mikael') {
                ruangOptions = ruangMikael;
            } else if (instansi === 'politeknik') {
                ruangOptions = ruangPoliteknik;
            }
    
            ruangOptions.forEach(function (ruang) {
                const option = document.createElement('option');
                option.value = ruang.id;
                option.textContent = ruang.nama;
                ruangSelect.appendChild(option);
            });
    
            // Update Tipe
            tipeSelect.innerHTML = '<option value="">- Pilih Tipe -</option>';
            let tipeOptions = [];
    
            if (instansi === 'yayasan') {
                tipeOptions = tipeYayasan;
            } else if (instansi === 'mikael') {
                tipeOptions = tipeMikael;
            } else if (instansi === 'politeknik') {
                tipeOptions = tipePoliteknik;
            }
    
            tipeOptions.forEach(function (tipe) {
                const option = document.createElement('option');
                option.value = tipe.id;
                option.textContent = tipe.nama;
                tipeSelect.appendChild(option);
            });
    

    
            // Update Kelompok
            kelompokSelect.innerHTML = '<option value="">- Pilih Kelompok -</option>';
            let kelompokOptions = [];
    
            if (instansi === 'yayasan') {
                kelompokOptions = kelompokYayasan;
            } else if (instansi === 'mikael') {
                kelompokOptions = kelompokMikael;
            } else if (instansi === 'politeknik') {
                kelompokOptions = kelompokPoliteknik;
            }
    
            kelompokOptions.forEach(function (kelompok) {
                const option = document.createElement('option');
                option.value = kelompok.id;
                option.textContent = kelompok.nama;
                kelompokSelect.appendChild(option);
            });
    
            // Update Jenis
            jenisSelect.innerHTML = '<option value="">- Pilih Jenis -</option>';
            let jenisOptions = [];
    
            if (instansi === 'yayasan') {
                jenisOptions = jenisYayasan;
            } else if (instansi === 'mikael') {
                jenisOptions = jenisMikael;
            } else if (instansi === 'politeknik') {
                jenisOptions = jenisPoliteknik;
            }
    
            jenisOptions.forEach(function (jenis) {
                const option = document.createElement('option');
                option.value = jenis.id;
                option.textContent = jenis.nama;
                jenisSelect.appendChild(option);
            });
        });
    </script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


@endsection
