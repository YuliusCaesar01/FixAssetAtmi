<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UBAH DATA JENIS </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_jenis">
                <div class="form-group">
                    <label for="nama-edit" class="control-label">Nama Jenis Yayasan</label>
                    <input type="text" placeholder="{{$jenis->nama_jenis_yayasan}}" class="form-control" id="nama-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-edit"></div>
                </div>
                <div class="form-group">
                    <label for="nama-edit" class="control-label">Nama Jenis Mikael</label>
                    <input type="text" placeholder="{{$jenis->nama_jenis_mikael}}" class="form-control" id="nama-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-edit"></div>
                </div>
                <div class="form-group">
                    <label for="nama-edit" class="control-label">Nama Jenis Politeknik</label>
                    <input type="text" placeholder="{{$jenis->nama_jenis_politeknik}}" class="form-control" id="nama-edit">
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
        //button create jenis event
        $('body').on('click', '#btn-edit-jenis', function() {

            let id_jenis = $(this).data('di');
            //fetch detail post with ajax
            $.ajax({
                url: `/jenis/managejenis/${id_jenis}`,
                type: "GET",
                cache: false,
                success: function(response) {

                    //fill data to form
                    $('#id_jenis').val(response.data.id_jenis);
                    $('#nama-edit').val(response.data.nama_jenis);

                    //open modal
                    $('#modal-edit').modal('show');
                }
            });
        });

        //action update post
        $('#update').click(function(e) {
            e.preventDefault();

            //define variable
            let id_jenis = $('#id_jenis').val();
            let nama_jenis = $('#nama-edit').val();
            let token = $("meta[name='csrf-token']").attr("content");

            //ajax
            $.ajax({
                url: `/jenis/managejenis/${id_jenis}`,
                type: "PUT",
                cache: false,
                data: {
                    "nama_jenis": nama_jenis,
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
                        `<h3 class="m-0 text-center" id="nama_jenis"><i class="fas fa-building"></i>
                                    ${response.data.nama_jenis}</h3>`;
                    //append to post data
                    $('#nama_jenis').replaceWith(replace_name);
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
