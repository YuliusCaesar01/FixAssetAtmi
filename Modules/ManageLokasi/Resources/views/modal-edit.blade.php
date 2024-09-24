<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UBAH DATA LOKASI </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_lokasi">
                <div class="form-group">
                    <label for="nama-lokasi-yayasan" class="control-label">Nama Lokasi Yayasan</label>
                    <input type="text" value="{{$lokasi->nama_lokasi_yayasan}}" class="form-control" id="nama-lokasi-yayasan">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-lokasi-yayasan"></div>
                </div>
            
                <div class="form-group">
                    <label for="nama-lokasi-mikael" class="control-label">Nama Lokasi Mikael</label>
                    <input type="text" value="{{$lokasi->nama_lokasi_mikael}}" class="form-control" id="nama-lokasi-mikael">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-lokasi-mikael"></div>
                </div>
            
                <div class="form-group">
                    <label for="nama-lokasi-politeknik" class="control-label">Nama Lokasi Politeknik</label>
                    <input type="text" value="{{$lokasi->nama_lokasi_politeknik}}" class="form-control" id="nama-lokasi-politeknik">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-lokasi-politeknik"></div>
                </div>
                {{-- <div class="form-group">
                    <label>Tipe</label>
                    <select name="id_tipe" id="idtipe-edit" class="form-control select2" style="width: 100%;" required>
                        <option value="">- Pilih Tipe -</option>
                        @foreach ($tipe as $tp)
                            <option value="{{ $tp->id_tipe }}">{{ $tp->nama_tipe }}</option>
                        @endforeach
                    </select>
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="update">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        //button create lokasi event
        $('body').on('click', '#btn-edit-lokasi', function() {

            let id_lokasi = $(this).data('di');
            //fetch detail post with ajax
            $.ajax({
                url: `/lokasi/managelokasi/${id_lokasi}`,
                type: "GET",
                cache: false,
                success: function(response) {

                    //fill data to form
                    $('#id_lokasi').val(response.data.id_lokasi);
                    $('#nama-edit').val(response.data.nama_lokasi);
                    //$('#idtipe-edit').val(response.data.id_tipe).trigger('change');

                    //open modal
                    $('#modal-edit').modal('show');
                }
            });
        });

        //action update post
        $('#update').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');

            //define variable
            let id_lokasi = $('#id_lokasi').val();
            let nama_lokasi = $('#nama-edit').val();
            let token = $("meta[name='csrf-token']").attr("content");

            //ajax
            $.ajax({
                url: `/lokasi/managelokasi/${id_lokasi}`,
                type: "PUT",
                cache: false,
                data: {
                    "nama_lokasi": nama_lokasi,
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
                        `<h3 class="m-0 text-center" id="nama_lokasi"><i class="fas fa-building"></i>
                                    ${response.data.nama_lokasi}</h3>`;
                    //append to post data
                    $('#nama_lokasi').replaceWith(replace_name);
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
