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
                            <span class="badge bg-info float-right">{{ $fa->kode_fa }}</span>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                                </div>
                            @endif
                            <form action="{{ route('manageaset.update', $fa->id_fa) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="id_fa">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Instansi</label>
                                            <select id="instansi" name="instansi" class="form-control" required>
                                                <option value="">- Pilih Instansi -</option>
                                                <option value="1">Yayasan</option>
                                                <option value="2">SMK Mikael</option>
                                                <option value="3">Politeknik</option>
                                            </select>
                                        </div>
                                    </div>
                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <select id="lokasi" name="id_lokasi" class="form-control select2" required>
                                                <option value="">- Pilih Lokasi -</option>
                                            </select>
                                        </div>
                                    </div>
                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Ruang</label>
                                            <select id="ruang" name="id_ruang" class="form-control select2" required>
                                                <option value="">- Pilih Ruang -</option>
                                            </select>
                                        </div>
                                    </div>
                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Tipe</label>
                                            <select id="tipe" name="id_tipe" class="form-control select2" required>
                                                <option value="">- Pilih Tipe -</option>
                                            </select>
                                        </div>
                                    </div>
                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Kelompok</label>
                                            <select id="kelompok" name="id_kelompok" class="form-control select2" required>
                                                <option value="">- Pilih Kelompok -</option>
                                            </select>
                                        </div>
                                    </div>
                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Jenis</label>
                                            <select id="jenis" name="id_jenis" class="form-control select2" required>
                                                <option value="">- Pilih Jenis -</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="nama_barang">Nama Barang</label>
                                            <input type="text" class="form-control" name="nama_barang" value="{{ $fa->nama_barang }}" id="nama_barang" required>
                                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Tahun Diterima</label>
                                            <input type="text" class="form-control" name="tahun_diterima" value="{{ $fa->tahun_diterima }}" data-inputmask='"mask": "9999"' data-mask>
                                        </div>
                                    </div>
                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="no_permintaan">No Surat Permintaan (SPA)</label>
                                            <input type="text" class="form-control" name="no_permintaan" value="{{ $fa->no_permintaan }}" id="no_permintaan">
                                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-no"></div>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="form-group">
                                    <label for="formdes_barang">Deskripsi Detail Barang</label>
                                    <textarea class="form-control" rows="3" name="des_barang" id="formdes_barang">{!! $fa->des_barang !!}</textarea>
                                </div>
                    
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status Transaksi Barang</label>
                                            <select id="status_transaksi" class="form-control" name="status_transaksi" required>
                                                <option value="Pengadaan Baru" {{ 'Pengadaan Baru' == $fa->status_transaksi ? 'selected' : '' }}>Pengadaan Baru</option>
                                                <option value="Penjualan" {{ 'Penjualan' == $fa->status_transaksi ? 'selected' : '' }}>Penjualan</option>
                                                <option value="Pemindahan" {{ 'Pemindahan' == $fa->status_transaksi ? 'selected' : '' }}>Pemindahan</option>
                                            </select>
                                        </div>
                                    </div>
                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status Kondisi Barang</label>
                                            <select id="status_barang" class="form-control" name="status_barang" required>
                                                <option value="baik(100%)" {{ 'baik (100%)' == $fa->status_barang ? 'selected' : '' }}>Baik (100%)</option>
                                                <option value="cukup(50%)" {{ 'cukup (50%)' == $fa->status_barang ? 'selected' : '' }}>Cukup (50%)</option>
                                                <option value="rusak" {{ 'rusak' == $fa->status_barang ? 'selected' : '' }}>Rusak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="row">
                                    <div class="col-3">
                                        <img src="{{ $fa->foto_barang ? asset('uploads/photos/' . basename($fa->foto_barang)) : asset('boxs.png') }}" class="product-image" alt="Foto Barang Aset">
                                    </div>
                                    <div class="col-9">
                                        <div class="form-group">
                                            <label for="InputFile">File Foto Barang</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="foto_barang">
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
        const ruangYayasan = [
            @foreach ($ruang as $rg)
                { id: '{{ $rg->id_ruang }}', nama: '{{ $rg->nama_ruang_yayasan }}' },
            @endforeach
        ];
        const lokasiYayasan = [
        @foreach ($lokasi as $lk)
            { id: '{{ $lk->id_lokasi }}', nama: '{{ $lk->nama_lokasi_yayasan }}' },
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
                { id: '{{ $rg->id_tipe }}', nama: '{{ $tp->nama_tipe_yayasan }}' },
            @endforeach
        ]; // Populate with actual data
      
    
        const kelompokYayasan = [
            @foreach ($kelompok as $klp)
                { id: '{{ $klp->id_kelompok }}', nama: '{{ $klp->nama_kelompok_yayasan }}' },
            @endforeach
        ]; // Populate with actual data
      
    
        const jenisYayasan = [
            @foreach ($jenis as $jn)
                { id: '{{ $jn->id_jenis }}', nama: '{{ $jn->nama_jenis_yayasan }}' },
            @endforeach
        ]; // Populate with actual data
       
    
        document.getElementById('instansi').addEventListener('change', function () {
            const instansi = this.value;
            const lokasiSelect = document.getElementById('lokasi');
            const ruangSelect = document.getElementById('ruang');
            const tipeSelect = document.getElementById('tipe');
            const kelompokSelect = document.getElementById('kelompok');
            const jenisSelect = document.getElementById('jenis');
    
            // Clear the previous options
            ruangSelect.innerHTML = '<option value="">- Pilih Ruang -</option>';
            tipeSelect.innerHTML = '<option value="">- Pilih Tipe -</option>';
            kelompokSelect.innerHTML = '<option value="">- Pilih Kelompok -</option>';
            jenisSelect.innerHTML = '<option value="">- Pilih Jenis -</option>';
            lokasiSelect.innerHTML = '<option value="">- Pilih Lokasi -</option>';

            let ruangOptions = [];
            let tipeOptions = tipeYayasan;
            let kelompokOptions = kelompokYayasan;
            let jenisOptions = jenisYayasan;
            let lokasiOptions = lokasiYayasan;

            // Check which instansi is selected and load the corresponding data
            if (instansi === '1') {
                ruangOptions = ruangYayasan;
               
            } else if (instansi === '2') {
                ruangOptions = ruangMikael;
             
            } else if (instansi === '3') {
                ruangOptions = ruangPoliteknik;
             
            }
    
              // Populate Lokasi dropdown
        lokasiOptions.forEach(function (lokasi) {
            const option = document.createElement('option');
            option.value = lokasi.id;
            option.textContent = lokasi.nama;
            lokasiSelect.appendChild(option);
        });
            // Populate Ruang dropdown
            ruangOptions.forEach(function (ruang) {
                const option = document.createElement('option');
                option.value = ruang.id;
                option.textContent = ruang.nama;
                ruangSelect.appendChild(option);
            });
    
            // Populate Tipe dropdown
            tipeOptions.forEach(function (tipe) {
                const option = document.createElement('option');
                option.value = tipe.id;
                option.textContent = tipe.nama;
                tipeSelect.appendChild(option);
            });
    
            // Populate Kelompok dropdown
            kelompokOptions.forEach(function (kelompok) {
                const option = document.createElement('option');
                option.value = kelompok.id;
                option.textContent = kelompok.nama;
                kelompokSelect.appendChild(option);
            });
    
            // Populate Jenis dropdown
            jenisOptions.forEach(function (jenis) {
                const option = document.createElement('option');
                option.value = jenis.id;
                option.textContent = jenis.nama;
                jenisSelect.appendChild(option);
            });
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
