<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH DATA RUANG </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_ruang">
               
              
                <div class="form-group">
                    <label for="nama-edit" class="control-label">Nama Ruang Yayasan</label>
                    <input type="text" class="form-control" id="nama-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-edit"></div>
                </div>
                <div class="form-group">
                    <label for="nama-edit" class="control-label">Nama Ruang Mikael</label>
                    <input type="text"  class="form-control" id="nama-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-edit"></div>
                </div>
                <div class="form-group">
                    <label for="nama-edit" class="control-label">Nama Ruang Politeknik</label>
                    <input type="text" class="form-control" id="nama-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-edit"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        //button create post event
        $('body').on('click', '#btn-create-ruang', function() {

            //open modal
            $('#modal-create').modal('show');
        });

        //action create post
        $('#store').click(function(e) {
            e.preventDefault();

            //define variable
            let nama = $('#nama_ruang').val();
            let id_divisi = $('#id_divisi').val();
            let id_lokasi = $('#id_lokasi').val();
            let token = $("meta[name='csrf-token']").attr("content");
            
            //ajax
            $.ajax({

                url: `{{ route('manage-ruang.store') }}`,
                type: "POST",
                cache: false,
                data: {
                    "nama_ruang": nama,
                    "id_divisi": id_divisi,
                    "id_lokasi": id_lokasi,
                    "_token": token
                },
                success: function(response) {

                    //show success message
                    Swal.fire({
                        icon: 'success',
                        title: `${response.message}`,
                        showConfirmButton: false,
                        timer: 3000
                    });

                    $('#modal-create').modal('hide');

                    setTimeout(function() { // wait for 3 secs
                        location.reload(); // then reload the page
                    }, 3000);
                },
                error: function(error) {

                    if (error.responseJSON.nama_tipe[0]) {

                        //show alert
                        $('#alert-nama').removeClass('d-none');
                        $('#alert-nama').addClass('d-block');

                        //add message to alert
                        $('#alert-nama').html(error.responseJSON.nama_tipe[0]);
                    }

                }

            });

        });

    });
</script>
