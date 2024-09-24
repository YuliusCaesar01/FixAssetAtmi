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
                <input type="hidden" id="id_tipe">
                <div class="form-group">
                    <label for="nama_tipe" class="control-label">Tipe Barang Yayasan</label>
                    <input type="text" class="form-control" id="nama_tipe">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>
                </div>
                <div class="form-group">
                    <label for="nama_tipe" class="control-label">Tipe Barang Mikael</label>
                    <input type="text" class="form-control" id="nama_tipe">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>
                </div>
                <div class="form-group">
                    <label for="nama_tipe" class="control-label">Tipe Barang Politeknik</label>
                    <input type="text" class="form-control" id="nama_tipe">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>
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
        $('body').on('click', '#btn-create-tipe', function() {

            //open modal
            $('#modal-create').modal('show');
        });

        //action create post
        $('#store').click(function(e) {
            e.preventDefault();

            //define variable
            let nama = $('#nama_tipe').val();
            let token = $("meta[name='csrf-token']").attr("content");

            //ajax
            $.ajax({

                url: `/tipe/managetipe`,
                type: "POST",
                cache: false,
                data: {
                    "nama_tipe": nama,
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
                    let post =
                        `<tr id="index_${response.data.id_tipe}"> 
                                <td>${$('#index_' + response.data.id_tipe).data('iteration')}</td> 
                                <td class="text-center lead">
                                    <span class="badge bg-green">${response.data.kode_tipe}</span>
                                </td>
                                <td> ${response.data.nama_tipe} </td> 
                                <td>
                                    <a href="javascript:void(0)" id="btn-detail-tipe"
                                                    data-di = "${response.data.id_tipe}" title="Detail Institusi"
                                                    class="btn btn-sm btn-light">
                                                    <i class="far fa-folder-open"></i>
                                                </a>
                                                <a href="javascript:void(0)" id="btn-edit-tipe" title="Ubah Institusi"
                                                    data-di="${response.data.id_tipe}" class="btn btn-sm btn-light">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                </td> 
                            </tr>`;

                    //append to table
                    $('#tbl_tipe').load(document.URL + ' #tbl_tipe');
                    $('#tbl_tipe').append(post);
                    //clear form
                    $('#nama_tipe').val('');

                    //close modal
                    $('#modal-create').modal('hide');
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
