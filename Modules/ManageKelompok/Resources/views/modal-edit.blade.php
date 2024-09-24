<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UBAH DATA KELOMPOK </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_kelompok">
                <div class="form-group">
                    <label for="nama-edit" class="control-label">Kelompok Yayasan</label>
                    <input type="text" placeholder="{{$kelompok->nama_kelompok_yayasan}}" class="form-control" id="nama-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-edit"></div>
                </div>
                <div class="form-group">
                    <label for="nama-edit" class="control-label">Kelompok Mikael</label>
                    <input type="text" placeholder="{{$kelompok->nama_kelompok_mikael}}" class="form-control" id="nama-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-edit"></div>
                </div>
                <div class="form-group">
                    <label for="nama-edit" class="control-label">Kelompok Politeknik</label>
                    <input type="text"  placeholder="{{$kelompok->nama_kelompok_politeknik}}" class="form-control" id="nama-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-edit"></div>
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
        //button create kelompok event
        $('body').on('click', '#btn-edit-kelompok', function() {

            let id_kelompok = $(this).data('di');
            //fetch detail post with ajax
            $.ajax({
                url: `/kelompok/managekelompok/${id_kelompok}`,
                type: "GET",
                cache: false,
                success: function(response) {

                    //fill data to form
                    $('#id_kelompok').val(response.data.id_kelompok);
                    $('#nama-edit').val(response.data.nama_kelompok);
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
            let id_kelompok = $('#id_kelompok').val();
            let nama_kelompok = $('#nama-edit').val();
            let token = $("meta[name='csrf-token']").attr("content");

            //ajax
            $.ajax({
                url: `/kelompok/managekelompok/${id_kelompok}`,
                type: "PUT",
                cache: false,
                data: {
                    "nama_kelompok": nama_kelompok,
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
                        `<h3 class="m-0 text-center" id="nama_kelompok"><i class="fas fa-building"></i>
                                    ${response.data.nama_kelompok}</h3>`;
                    //append to post data
                    $('#nama_kelompok').replaceWith(replace_name);
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
