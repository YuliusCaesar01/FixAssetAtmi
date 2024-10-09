<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UBAH DATA RUANG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit" action="" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="id_ruang" name="id_ruang">
                    <div class="form-group">
                        <label for="nama-yayasan" class="control-label">Nama Ruang Yayasan</label>
                        <input type="text" name="nama_ruang_yayasan" class="form-control" id="nama-yayasan">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-yayasan"></div>
                    </div>
                    <div class="form-group">
                        <label for="nama-mikael" class="control-label">Nama Ruang Mikael</label>
                        <input type="text" name="nama_ruang_mikael" class="form-control" id="nama-mikael">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-mikael"></div>
                    </div>
                    <div class="form-group">
                        <label for="nama-politeknik" class="control-label">Nama Ruang Politeknik</label>
                        <input type="text" name="nama_ruang_politeknik" class="form-control" id="nama-politeknik">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-politeknik"></div>
                    </div>
                    {{ csrf_field() }} <!-- Menambahkan CSRF Token -->
                    {{ method_field('PUT') }} <!-- Menyatakan bahwa ini adalah permintaan PUT -->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Button edit ruang event
        $('body').on('click', '#btn-edit-ruang', function() {
            let id_ruang = $(this).data('di');
            // Fetch detail ruang dengan AJAX
            $.ajax({
                url: `/ruang/manageruang/${id_ruang}`,
                type: "GET",
                cache: false,
                success: function(response) {
                    // Isi data ke dalam form
                    $('#id_ruang').val(response.data.id_ruang);
                    $('#nama-yayasan').val(response.data.nama_ruang_yayasan);
                    $('#nama-mikael').val(response.data.nama_ruang_mikael);
                    $('#nama-politeknik').val(response.data.nama_ruang_politeknik);

                    // Tentukan URL action form berdasarkan ID ruang
                    $('#form-edit').attr('action', `{{ route('manage-ruang.update', '') }}/${id_ruang}`);

                    // Tampilkan modal
                    $('#modal-edit').modal('show');
                },
                error: function() {
                    alert('Gagal mengambil data. Silakan coba lagi.');
                }
            });
        });
    });
</script>
