@extends('layouts.layout_main')
@section('title', 'Data Detail Ruang')
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
                        <li class="breadcrumb-item active">Userdetails</li>
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
                            ID User: {{ str_pad($userDetail->id_userdetail, 2, '0', STR_PAD_LEFT) }}
                        </h4>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-right">
                            <a href="javascript:void(0)" id="btn-edit-ruang" title="Ubah Ruang" class="btn btn-sm btn-secondary">
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
                                    @if($userDetail->foto && $userDetail->foto !== 'default.png')
                                        <img src="{{ asset('/storage/photos/' . $userDetail->foto) }}" alt="Profile Photo" class="rounded-circle" style="width: 80px; height: 80px;">
                                    @else
                                        <img src="https://as2.ftcdn.net/v2/jpg/00/64/67/27/1000_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg" alt="Profile Photo" class="rounded-circle" style="width: 80px; height: 80px;">
                                    @endif
                                </td>
                                <td class="text-left" style="vertical-align: middle;">{{ $userDetail->nama_lengkap }}</td>
                                <td class="text-left" style="vertical-align: middle;">{{ $userDetail->jenis_kelamin }}</td>
                                <td class="text-left" style="vertical-align: middle;">{{ $userDetail->no_induk_karyawan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" action="{{ route('manage-user.edituserdetails', ['id' => $userDetail->id_userdetail]) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="no_induk_karyawan" class="form-label">No Induk Karyawan</label>
                            <input type="text" class="form-control" id="no_induk_karyawan" name="no_induk_karyawan" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#btn-edit-ruang').on('click', function() {
            $('#nama_lengkap').val('{{ $userDetail->nama_lengkap }}');
            $('#jenis_kelamin').val('{{ $userDetail->jenis_kelamin }}');
            $('#no_induk_karyawan').val('{{ $userDetail->no_induk_karyawan }}');
            $('#editUserModal').modal('show');
        });

        $('#saveChanges').on('click', function() {
    // Submit the form
    $('#editUserForm').submit();
});
    });
</script>

@endsection
