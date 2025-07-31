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

    <!-- Page Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 text-gray-800 mb-0"><i class="fas fa-clipboard-list mr-2"></i> Daftar Pemeriksaan Post Mortem</h1>
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

    <!-- Data Table -->
    <div class="card shadow">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <!-- Form Export Excel -->
                <form class="form-inline mb-2" method="post" action="<?= base_url('post-mortem/export_excel'); ?>">
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
                <table class="table table-sm table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nomor / Nopol Truk</th>
                            <th>Ekspedisi</th>
                            <th>Nama Farm</th>
                            <th>CH / OH</th>
                            <th>Waktu / Shift</th>
                            <th>Ayam Diproses</th>
                            <th>Average Farm</th>
                            <th>Average RPA</th>
                            <th>Updated at</th>
                            <th>SPV</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php 
                        $no = 1;
                        foreach($post_mortem as $val): 
                            $datetime = (new DateTime($val->date))->format('d-m-Y');
                            $waktu = substr($val->waktu_kedatangan, 0, 5);
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $datetime; ?></td>
                                <td><?= $val->nomor_truk . " / " . $val->nopol_truk; ?></td>
                                <td><?= $val->ekspedisi; ?></td>
                                <td><?= $val->nama_farm; ?></td>
                                <td><?= $val->ch_oh == 0 ? 'CH' : 'OH'; ?></td>
                                <td><?= $waktu . " / " . $val->shift; ?></td>
                                <td><?= number_format($val->jumlah_ayam); ?> ekor</td>
                                <td><?= number_format($val->average_farm, 2); ?> kg</td>
                                <td><?= number_format($val->average_rpa, 2); ?> kg</td>
                                <td><?= date('H:i - d m Y', strtotime($val->tgl_update_spv)) ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($val->status_spv == 0) {
                                        echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                    } elseif ($val->status_spv == 1) {
                                        echo '<span style="color: #28b463; font-weight: bold;">Verified</span>';
                                    } elseif ($val->status_spv == 2) {
                                        echo '<span style="color: red; font-weight: bold;">Revision</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <!-- Tombol Verifikasi -->
                                    <a href="javascript:void(0);" class="btn btn-warning btn-sm rounded-circle" title="Verifikasi"
                                    data-toggle="modal" data-target="#modalVerifikasi-<?= $val->uuid ?>">
                                    <i class="fas fa-check"></i>
                                </a>

                                <!-- Tombol Cetak -->
                                <a href="<?= base_url('post-mortem/cetak/'.$val->uuid); ?>" class="btn btn-success btn-sm rounded-circle" title="Cetak PDF">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Modal Verifikasi -->
                        <div class="modal fade" id="modalVerifikasi-<?= $val->uuid ?>" tabindex="-1" role="dialog" aria-labelledby="modalVerifikasiLabel-<?= $val->uuid ?>" aria-hidden="true">
                          <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content">
                              <form method="post" action="<?= base_url('post-mortem/status/' . $val->uuid); ?>">
                                <div class="modal-header">
                                  <h5 class="modal-title font-weight-bold" id="modalVerifikasiLabel-<?= $val->uuid ?>">Verifikasi Post Mortem</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label class="font-weight-bold">Status</label>
                                <select class="form-control" name="status_spv">
                                  <option value="1" <?= $val->status_spv == 1 ? 'selected' : ''; ?>>Verified</option>
                                  <option value="2" <?= $val->status_spv == 2 ? 'selected' : ''; ?>>Revision</option>
                              </select>
                          </div>
                          <div class="form-group">
                            <label class="font-weight-bold">Catatan Revisi</label>
                            <textarea class="form-control" name="catatan_spv" rows="3"><?= $val->catatan_spv ?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>  
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
