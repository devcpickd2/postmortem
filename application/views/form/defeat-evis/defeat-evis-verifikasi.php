<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 text-gray-800 mb-0"><i class="fas fa-clipboard-list mr-2"></i> Daftar Defeathering - Evisceration</h1>
    </div>

    <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> <?= $this->session->flashdata('success_msg') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>

    <?php if($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle"></i> <?= $this->session->flashdata('error_msg') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?> 

    <div class="card shadow">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <form class="form-inline mb-2" method="post" action="<?= base_url('defeat-evis/export_excel'); ?>">
                    <div class="form-group mx-sm-2">
                        <label for="today" class="mr-2 font-weight-bold">Pilih Tanggal:</label>
                        <input type="date" name="today" id="today" class="form-control" required value="<?= date('Y-m-d') ?>">
                    </div>
                    <button type="submit" class="btn btn-success ml-2">
                        <i class="fas fa-file-excel"></i> Export Excel
                    </button>
                </form>
            </div>
            <hr>
            <div class="table-responsive">
             <form action="<?= base_url('defeat-evis/cetak') ?>" method="post" id="form_cetak_pdf">
                <table class="table table-sm table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light text-center">
                        <tr>
                            <th width="30px" class="text-center">
                                <input type="checkbox" id="select_all" />
                            </th>
                            <th>No</th>
                            <th>Date</th>
                            <th>Shift</th>
                            <th>No. Truck</th>
                            <th>Time</th>
                            <th>Updated at</th>
                            <th class="text-center">SPV</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $no = 1; foreach($defeat_evis as $val): ?>
                        <tr>
                           <td class="text-center">
                            <input type="checkbox" name="checkbox[]" value="<?= $val->uuid ?>" class="select_row">
                        </td>
                        <td><?= $no++; ?></td>
                        <td><?= (new DateTime($val->date))->format('d-m-Y'); ?></td>
                        <td><?= $val->shift; ?></td>
                        <td><?= $val->no_truck; ?></td>
                        <td><?= $val->time_start . ' - ' . $val->time_finish; ?></td>
                        <td><?= date('H:i - d m Y', strtotime($val->tgl_update_spv)) ?></td>
                        <td>
                            <?php
                            if ($val->status_spv == 0) echo '<span class="text-muted font-weight-bold">Created</span>';
                            elseif ($val->status_spv == 1) echo '<span class="text-success font-weight-bold">Verified</span>';
                            elseif ($val->status_spv == 2) echo '<span class="text-danger font-weight-bold">Revision</span>';
                            ?>
                        </td>
                        <td>
                            <a href="javascript:void(0);" class="btn btn-warning btn-sm rounded-circle" title="Verifikasi"
                            data-toggle="modal" data-target="#modalVerifikasi-<?= $val->uuid ?>">
                            <i class="fas fa-check"></i>
                        </a>
                    </td>
                </tr>

                <!-- Modal Verifikasi -->
                <div class="modal fade" id="modalVerifikasi-<?= $val->uuid ?>" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <form method="post" action="<?= base_url('defeat-evis/status/' . $val->uuid); ?>">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold">Verifikasi Defeathering - Evisceration</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status_spv">
                                            <option value="1" <?= $val->status_spv == 1 ? 'selected' : '' ?>>Verified</option>
                                            <option value="2" <?= $val->status_spv == 2 ? 'selected' : '' ?>>Revision</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Catatan Revisi</label>
                                        <textarea class="form-control" name="catatan_spv" rows="3"><?= $val->catatan_spv ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </tbody>

    </table>
    <input type="hidden" name="checkbox[]" id="selected_items">
</form>
</div>
<hr>
<div class="form-group">
    <label>Pilih Data yang akan dicetak:</label>
    <br>
    <button type="submit" form="form_cetak_pdf" class="btn btn-success">
        <i class="fas fa-print fa-sm text-white-50"></i> Cetak PDF
    </button>
</div>
</div>
</div>
<script>
 $(document).ready(function () {
    // Handle centang semua
    $('#checkAll').on('click', function () {
        $('.checkbox-item').prop('checked', this.checked);
    });

    // Tangani form cetak agar tidak menampilkan checkbox di bawah tombol
    $('#formCetak').on('submit', function (e) {
        // Hapus input tersembunyi sebelumnya
        $('#formCetak input[name="checkbox[]"]').remove();

        // Tambahkan checkbox terpilih ke dalam form
        $('.checkbox-item:checked').each(function () {
            $('<input>').attr({
                type: 'hidden',
                name: 'checkbox[]',
                value: this.value
            }).appendTo('#formCetak');
        });

        // Jika tidak ada yang dicentang, cegah submit dan beri alert
        if ($('.checkbox-item:checked').length === 0) {
            e.preventDefault();
            alert('Pilih minimal satu data untuk dicetak.');
        }
    });
});
</script>

</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
