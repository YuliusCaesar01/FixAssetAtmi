<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH DATA TIPE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_tipe">
                <div class="form-group">
                    <label>Instansi</label>
                    <select id="mode-select" class="form-control" required>
                        <option value="">- Pilih Instansi -</option>
                        <option value="yayasan">Yayasan</option>
                        <option value="mikael">Mikael</option>
                        <option value="politeknik">Politeknik</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tipe</label>
                    <select id="id_tipe" class="form-control select2" style="width: 100%;" required disabled>
                        <option value="">- Pilih Tipe -</option>
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-idkelompok"></div>
                </div>
                <div class="form-group">
                    <label for="nama_tipe_yayasan" class="control-label">Tipe Barang Yayasan</label>
                    <input type="text" class="form-control" id="nama_tipe_yayasan" required>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-yayasan"></div>
                </div>
                <div class="form-group">
                    <label for="nama_tipe_mikael" class="control-label">Tipe Barang Mikael</label>
                    <input type="text" class="form-control" id="nama_tipe_mikael" required>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-mikael"></div>
                </div>
                <div class="form-group">
                    <label for="nama_tipe_politeknik" class="control-label">Tipe Barang Politeknik</label>
                    <input type="text" class="form-control" id="nama_tipe_politeknik" required>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-politeknik"></div>
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
        // Populate Kelompok based on Mode selection
        const kelompokData = {
            yayasan: @json($kelompok->where('tipe.nama_tipe_yayasan', true)),
            mikael: @json($kelompok->where('tipe.nama_tipe_mikael', true)),
            politeknik: @json($kelompok->where('tipe.nama_tipe_politeknik', true))
        };

        $('#mode-select').change(function() {
            const selectedMode = $(this).val();
            const $kelompokSelect = $('#id_kelompok');

            // Clear existing options and disable kelompok
            $kelompokSelect.empty().append('<option value="">- Pilih Kelompok -</option>').prop('disabled', true);

            // Populate new options and enable if mode is selected
            if (kelompokData[selectedMode]) {
                kelompokData[selectedMode].forEach(function(kl) {
                    let optionText;
                    if (selectedMode === 'yayasan') {
                        optionText = `${kl.nama_kelompok_yayasan}`;
                        $kelompokSelect.append(`<option value="${kl.id_kelompok_yayasan}">${optionText}</option>`);
                    } else if (selectedMode === 'mikael') {
                        optionText = `${kl.nama_kelompok_mikael}`;
                        $kelompokSelect.append(`<option value="${kl.id_kelompok_mikael}">${optionText}</option>`);
                    } else if (selectedMode === 'politeknik') {
                        optionText = `${kl.nama_kelompok_politeknik}`;
                        $kelompokSelect.append(`<option value="${kl.id_kelompok_politeknik}">${optionText}</option>`);
                    }
                });
                $kelompokSelect.prop('disabled', false); // Enable kelompok dropdown
            }
        });

        // Button create post event
        $('body').on('click', '#btn-create-tipe', function() {
            $('#modal-create').modal('show');
        });

        // Action create post
        $('#store').click(function(e) {
            e.preventDefault();

            let id_kelompok = $('#id_kelompok').val();
            let nama_yayasan = $('#nama_tipe_yayasan').val();
            let nama_mikael = $('#nama_tipe_mikael').val();
            let nama_politeknik = $('#nama_tipe_politeknik').val();
            let token = $("meta[name='csrf-token']").attr("content");

            // Ajax
            $.ajax({
                url: `/tipe/manage`,
                type: "POST",
                cache: false,
                data: {
                    "nama_tipe_yayasan": nama_yayasan,
                    "nama_tipe_mikael": nama_mikael,
                    "nama_tipe_politeknik": nama_politeknik,
                    "id_kelompok": id_kelompok,
                    "_token": token
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: `${response.message}`,
                        showConfirmButton: false,
                        timer: 3000
                    });

                    $('#modal-create').modal('hide');

                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                },
                error: function(error) {
                    if (error.responseJSON.nama_tipe) {
                        $('#alert-nama-yayasan').removeClass('d-none').addClass('d-block').html(error.responseJSON.nama_tipe[0]);
                    }
                    if (error.responseJSON.id_kelompok) {
                        $('#alert-idkelompok').removeClass('d-none').addClass('d-block').html(error.responseJSON.id_kelompok[0]);
                    }
                }
            });
        });
    });
</script>

