<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UBAH DATA TIPE </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_tipe">
                <div class="form-group">
                    <label for="nama-edit" class="control-label">Tipe Yayasan</label>
                    <input type="text" placeholder="{{$tipe->nama_tipe_yayasan}}" class="form-control" id="nama-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-edit"></div>
                </div>
                <div class="form-group">
                    <label for="nama-edit" class="control-label">Tipe Mikael</label>
                    <input type="text" placeholder="{{$tipe->nama_tipe_mikael}}" class="form-control" id="nama-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-edit"></div>
                </div>
                <div class="form-group">
                    <label for="nama-edit" class="control-label">Tipe Politeknik</label>
                    <input type="text" placeholder="{{$tipe->nama_tipe_politeknik}}" class="form-control" id="nama-edit">
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
        //button create tipe event
        $('body').on('click', '#btn-edit-tipe', function() {

            let id_tipe = $(this).data('di');
            //fetch detail post with ajax
            $.ajax({
                url: `/tipe/managetipe/${id_tipe}`,
                type: "GET",
                cache: false,
                success: function(response) {

                    //fill data to form
                    $('#id_tipe').val(response.data.id_tipe);
                    $('#nama-edit').val(response.data.nama_tipe);

                    //open modal
                    $('#modal-edit').modal('show');
                }
            });
        });

        //action update post
        $('#update').click(function(e) {
            e.preventDefault();

            //define variable
            let id_tipe = $('#id_tipe').val();
            let nama_tipe = $('#nama-edit').val();
            let token = $("meta[name='csrf-token']").attr("content");

            //ajax
            $.ajax({
                url: `/tipe/managetipe/${id_tipe}`,
                type: "PUT",
                cache: false,
                data: {
                    "nama_tipe": nama_tipe,
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
                    let replace_name =
                        `<h3 class="m-0 text-center" id="nama_tipe"><i class="fas fa-building"></i>
                                    ${response.data.nama_tipe}</h3>`;
                    //append to post data
                    $('#nama_tipe').replaceWith(replace_name);

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
