@extends('layouts.layout_main')
@section('title', 'Data Detail User')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">DETAIL DATA USER</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('manageruang.index') }}">Home</a></li>
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item active">User Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <section class="content">
        <div class="container-fluid">
            <div class="content-header">
                <div class="row mb-2">
                    <div class="col-sm-6 text-center">
                        <h4 class="text-purple lead">
                            ID User: {{ str_pad($userdetailed->id_userdetail, 2, '0', STR_PAD_LEFT) }}
                        </h4>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-right">
                            <a href="javascript:void(0)" id="btn-edit-user" title="Ubah user" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#editModaled">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-sm" id="tbl_lokasi">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>No Induk Karyawan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center lead" style="vertical-align: middle;">
                                    @if($userdetailed->foto && $userdetailed->foto !== 'default.png')
                                    <img src="{{ asset($userdetailed->foto) }}" alt="Profile Photo" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%; object-position: top;">
                                    @else
                                        <img src="https://as2.ftcdn.net/v2/jpg/00/64/67/27/1000_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg" alt="Profile Photo" class="rounded-circle" style="width: 80px; height: 80px;">
                                    @endif
                                </td>
                                <td class="text-left" style="vertical-align: middle;">{{ $userdetailed->nama_lengkap }}</td>
                                <td class="text-left" style="vertical-align: middle;">{{ $userdetailed->jenis_kelamin }}</td>
                                <td class="text-left" style="vertical-align: middle;">{{ $userdetailed->no_induk_karyawan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>



<!-- Edit User Details Modal -->
<div class="modal fade" id="editModaled" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- User Details Form -->
                <form id="editDetailsForm" method="POST" action="{{ route('editprofil', $userdetailed->id_userdetail ?? $null) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $userdetailed->id_userdetail ?? '' }}">
                    
                    <div class="form-group text-center mb-4">
                        <img src="{{ $userdetailed && $userdetailed->foto && $userdetailed->foto !== 'default.png' ? asset($userdetailed->foto) : 'https://as2.ftcdn.net/v2/jpg/00/64/67/27/1000_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg' }}" alt="User Image" class="profile-img" style="border-radius: 50%; width: 100px; height: 100px; object-fit: cover;">
                        <small class="d-block mt-2">Current Profile Photo</small>
                    </div>

                    <div class="form-group">
                        <label for="foto" class="font-weight-bold">Change Profile Photo</label>
                        <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="nama_lengkap" class="font-weight-bold">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" value="{{ $userdetailed->nama_lengkap ?? 'belum ditambahkan' }}" name="nama_lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin" class="font-weight-bold">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required aria-label="Pilih Jenis Kelamin">
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="laki-laki" {{ ($userdetailed->jenis_kelamin ?? '') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="perempuan" {{ ($userdetailed->jenis_kelamin ?? '') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_induk_karyawan" class="font-weight-bold">No Induk Karyawan</label>
                        <input type="text" class="form-control" value="{{ $userdetailed->no_induk_karyawan ?? 'belum ditambahkan' }}" id="no_induk_karyawan" name="no_induk_karyawan" required>
                    </div>

                    <!-- Edit User Data Button -->
                    <button type="button" class="btn btn-warning btn-block show-form" data-target="changeEmailForm">
                        <i class="fas fa-user"></i> Edit User Data
                    </button>
                </form>

                <!-- Change Email Form -->
                <form id="changeEmailForm" method="POST" action="{{ route('change.email') }}" style="display: none;" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <div class="form-group">
                        <label for="old_email" class="font-weight-bold">Old Email</label>
                        <input type="email" class="form-control" id="old_email" name="old_email" value="{{ Auth::user()->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="new_email" class="font-weight-bold">New Email</label>
                        <input type="email" class="form-control" id="new_email" name="new_email" required>
                    </div>
                    <div class="form-group">
                        <label for="ttd" class="font-weight-bold">Upload TTD</label>
                        <input type="file" class="form-control-file" id="ttd" name="ttd" accept="image/*" required>
                        <small>Upload your signature. Background will be automatically removed if white.</small>
                    </div>

                    <!-- Back to Edit User Details Button -->
                    <button type="button" class="btn btn-info btn-block show-form" data-target="editDetailsForm">
                        <i class="fas fa-id-badge"></i> Edit User Details
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="editDetailsForm" class="btn btn-primary">Save User Details</button>
                <button type="submit" form="changeEmailForm" class="btn btn-primary" style="display: none;">Change User Data</button>
            </div>
        </div>
    </div>
</div>



    <script>
    document.querySelectorAll('.show-form').forEach(button => {
    button.addEventListener('click', function() {
        const targetFormId = this.getAttribute('data-target');
        // Sembunyikan semua form
        document.querySelectorAll('form').forEach(form => {
            form.style.display = 'none';
        });
        // Tampilkan form yang dipilih
        document.getElementById(targetFormId).style.display = 'block';
    });
});

      
    </script>
    
</div>
@endsection
