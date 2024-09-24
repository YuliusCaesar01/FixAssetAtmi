<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH DATA LOKASI </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_lokasi">
                <div class="form-group">
                    <label for="nama-lokasi-yayasan" class="control-label">Nama Lokasi Yayasan</label>
                    <input type="text"  class="form-control" id="nama-lokasi-yayasan">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-lokasi-yayasan"></div>
                </div>
            
                <div class="form-group">
                    <label for="nama-lokasi-mikael" class="control-label">Nama Lokasi Mikael</label>
                    <input type="text" class="form-control" id="nama-lokasi-mikael">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-lokasi-mikael"></div>
                </div>
            
                <div class="form-group">
                    <label for="nama-lokasi-politeknik" class="control-label">Nama Lokasi Politeknik</label>
                    <input type="text"  class="form-control" id="nama-lokasi-politeknik">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-lokasi-politeknik"></div>
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
        $('body').on('click', '#btn-create-lokasi', function() {

            //open modal
            $('#modal-create').modal('show');
        });

        //action create post
        $('#store').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');

            //define variable
            let nama = $('#nama_lokasi').val();
            let token = $("meta[name='csrf-token']").attr("content");

            //ajax
            $.ajax({

                url: `/lokasi/managelokasi`,
                type: "POST",
                cache: false,
                data: {
                    "nama_lokasi": nama,
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
                    //close modal
                    $('#modal-create').modal('hide');

                    setTimeout(function() { // wait for 3 secs
                        location.reload(); // then reload the page
                    }, 3000);


                },
                error: function(error) {

                    if (error.responseJSON.nama_lokasi[0]) {

                        //show alert
                        $('#alert-nama').removeClass('d-none');
                        $('#alert-nama').addClass('d-block');

                        //add message to alert
                        $('#alert-nama').html(error.responseJSON.nama_lokasi[0]);
                    }

                }

            });

        });

    });
</script>
