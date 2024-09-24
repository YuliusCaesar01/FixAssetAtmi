<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UBAH DATA INSTITUSI </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_institusi">
                <div class="form-group">
                    <label for="nama-edit" class="control-label">Institusi</label>
                    <input type="text" class="form-control" id="nama-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-edit"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="update">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        //button create institusi event
        $('body').on('click', '#btn-edit-institusi', function() {

            let id_institusi = $(this).data('di');
            //fetch detail post with ajax
            $.ajax({
                url: `/institusi/manageinstitusi/${id_institusi}`,
                type: "GET",
                cache: false,
                success: function(response) {

                    //fill data to form
                    $('#id_institusi').val(response.data.id_institusi);
                    $('#nama-edit').val(response.data.nama_institusi);

                    //open modal
                    $('#modal-edit').modal('show');
                }
            });
        });

        //action update post
        $('#update').click(function(e) {
            e.preventDefault();

            //define variable
            let id_institusi = $('#id_institusi').val();
            let nama_institusi = $('#nama-edit').val();
            let token = $("meta[name='csrf-token']").attr("content");

            //ajax
            $.ajax({
                url: `/institusi/manageinstitusi/${id_institusi}`,
                type: "PUT",
                cache: false,
                data: {
                    "nama_institusi": nama_institusi,
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
                    //data post
                    //append to post data
                    let replace_name =
                        `<h3 class="m-0 text-center" id="nama_institusi"><i class="fas fa-building"></i>
                                    ${response.data.nama_institusi}</h3>`;
                    //append to post data
                    $('#nama_institusi').replaceWith(replace_name);
                    //$('#nama-edit').val(response.data.nama_institusi);
                    //close modal
                    $('#modal-edit').modal('hide');
                },
                error: function(error) {

                    if (error.responseJSON.nama_edit[0]) {

                        //show alert
                        $('#alert-nama-edit').removeClass('d-none');
                        $('#alert-nama-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-nama-edit').html(error.responseJSON.nama_edit[0]);
                    }

                }

            });

        });
    });
</script>
