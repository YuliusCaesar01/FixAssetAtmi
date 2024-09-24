<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH DATA JENIS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_jenis">
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
                    <label>Kelompok</label>
                    <select id="id_kelompok" class="form-control select2" style="width: 100%;" required disabled>
                        <option value="">- Pilih Tipe dalam Kelompok -</option>
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-idtipe"></div>
                </div>
                <div class="form-group">
                    <label for="nama_jenis" class="control-label">Jenis Barang Yayasan</label>
                    <input type="text" class="form-control" id="nama_jenis_yayasan">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-yayasan"></div>
                </div>
                <div class="form-group">
                    <label for="nama_jenis" class="control-label">Jenis Barang Mikael</label>
                    <input type="text" class="form-control" id="nama_jenis_mikael">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-mikael"></div>
                </div>
                <div class="form-group">
                    <label for="nama_jenis" class="control-label">Jenis Barang Politeknik</label>
                    <input type="text" class="form-control" id="nama_jenis_politeknik">
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
            $kelompokSelect.empty().append('<option value="">- Pilih Tipe dalam Kelompok -</option>').prop('disabled', true);

            // Populate new options and enable if mode is selected
            if (kelompokData[selectedMode]) {
                kelompokData[selectedMode].forEach(function(kl) {
                    let optionText;
                    if (selectedMode === 'yayasan') {
                        optionText = `${kl.tipe.nama_tipe_yayasan} `;
                        $kelompokSelect.append(`<option value="${kl.id_kelompok_mikael}">${optionText}</option>`);
                    } else if (selectedMode === 'mikael') {
                        optionText = `${kl.tipe.nama_tipe_mikael} `;
                        $kelompokSelect.append(`<option value="${kl.id_kelompok_mikael}">${optionText}</option>`);
                    } else if (selectedMode === 'politeknik') {
                        optionText = `${kl.tipe.nama_tipe_politeknik}`;
                        $kelompokSelect.append(`<option value="${kl.id_kelompok_politeknik}">${optionText}</option>`);
                    }
                });
                $kelompokSelect.prop('disabled', false); // Enable kelompok dropdown
            }
        });

        // Button create post event
        $('body').on('click', '#btn-create-jenis', function() {
            $('#modal-create').modal('show');
        });

        // Action create post
        $('#store').click(function(e) {
            e.preventDefault();

            let id_kelompok = $('#id_kelompok').val();
            let nama_yayasan = $('#nama_jenis_yayasan').val();
            let nama_mikael = $('#nama_jenis_mikael').val();
            let nama_politeknik = $('#nama_jenis_politeknik').val();
            let token = $("meta[name='csrf-token']").attr("content");

            // Ajax
            $.ajax({
                url: `/jenis/managejenis`,
                type: "POST",
                cache: false,
                data: {
                    "nama_jenis_yayasan": nama_yayasan,
                    "nama_jenis_mikael": nama_mikael,
                    "nama_jenis_politeknik": nama_politeknik,
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
                }
            });
        });
    });
</script>
