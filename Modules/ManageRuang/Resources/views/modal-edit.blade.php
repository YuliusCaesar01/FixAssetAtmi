<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UBAH DATA RUANG </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_ruang">
                <div class="form-group">
                    <label for="nama-edit" class="control-label">Nama Ruang Yayasan</label>
                    <input type="text" placeholder="{{$ruang->nama_ruang_yayasan}}" class="form-control" id="nama-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-edit"></div>
                </div>
                <div class="form-group">
                    <label for="nama-edit" class="control-label">Nama Ruang Mikael</label>
                    <input type="text" placeholder="{{$ruang->nama_ruang_mikael}}" class="form-control" id="nama-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-edit"></div>
                </div>
                <div class="form-group">
                    <label for="nama-edit" class="control-label">Nama Ruang Politeknik</label>
                    <input type="text" placeholder="{{$ruang->nama_ruang_politeknik}}" class="form-control" id="nama-edit">
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
        //button create ruang event
        $('body').on('click', '#btn-edit-ruang', function() {

            let id_ruang = $(this).data('di');
            //fetch detail post with ajax
            $.ajax({
                url: `/ruang/manageruang/${id_ruang}`,
                type: "GET",
                cache: false,
                success: function(response) {

                    //fill data to form
                    $('#id_ruang').val(response.data.id_ruang);
                    $('#nama-edit').val(response.data.nama_ruang);

                    //open modal
                    $('#modal-edit').modal('show');
                }
            });
        });

        //action update post
        $('#update').click(function(e) {
            e.preventDefault();

            //define variable
            let id_ruang = $('#id_ruang').val();
            let nama_ruang = $('#nama-edit').val();
            let token = $("meta[name='csrf-token']").attr("content");

            //ajax
            $.ajax({
                url: `/ruang/manageruang/${id_ruang}`,
                type: "PUT",
                cache: false,
                data: {
                    "nama_ruang": nama_ruang,
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
                        `<h3 class="m-0 text-center" id="nama_ruang"><i class="fas fa-building"></i>
                                    ${response.data.nama_ruang}</h3>`;
                    //append to post data
                    $('#nama_ruang').replaceWith(replace_name);
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
