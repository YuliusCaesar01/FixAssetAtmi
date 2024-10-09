<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Ubah Data Jenis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit" action="{{ route('manage-jenis.update', $jenis->id_jenis) }}" method="POST">
                @csrf
                @method('PUT') <!-- Karena ini method PUT sesuai resource update -->
                <input type="hidden" id="id_jenis" value="{{$jenis->id_jenis}}" name="id_jenis">
                <div class="form-group">
                    <label for="nama-jenis" class="control-label">Nama Jenis</label>
                    <input type="text" name="nama_jenis" class="form-control" id="nama-jenis" value="{{ $jenis->nama_jenis_yayasan }}">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#btn-edit-tipe').on('click', function() {
        let id_jenis = $(this).data('id'); // Ambil data-id dari tombol

    
        // Tampilkan modal
        $('#modal-edit').modal('show');
    });
});

</script>
