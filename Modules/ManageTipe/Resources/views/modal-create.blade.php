<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH DATA TIPE </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-tipe" method="POST" action="/tipe/managetipe">
                    @csrf <!-- Include CSRF token for Laravel -->
                    <input type="hidden" id="id_tipe" name="id_tipe">
                    <div class="form-group">
                        <label for="nama_tipe" class="control-label">Tipe Barang Yayasan</label>
                        <input type="text" class="form-control" id="nama_tipe" name="nama_tipe">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>
                    </div>
                  
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

