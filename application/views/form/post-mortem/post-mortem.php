<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 text-gray-800 mb-0"><i class="fas fa-clipboard-list mr-2"></i> Daftar Pemeriksaan Post Mortem</h1>
        <a href="<?= base_url('post-mortem/tambah') ?>" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus mr-1"></i> Pemeriksaan
        </a>
    </div>

    <!-- Flash Message -->
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
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Nopol Truk</th>
                            <th>Tanggal</th>
                            <th>Ekspedisi</th>
                            <th>Nama Farm</th>
                            <th>CH / OH</th>
                            <th>Waktu / Shift</th>
                            <th>Ayam Diproses</th>
                            <th>Average Farm</th>
                            <th>Average RPA</th>
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
                                <td><?= $val->nomor_truk . " / " . $val->nopol_truk; ?></td>
                                <td><?= $datetime; ?></td>
                                <td><?= $val->ekspedisi; ?></td>
                                <td><?= $val->nama_farm; ?></td>
                                <td><?= $val->ch_oh == 0 ? 'CH' : 'OH'; ?></td>
                                <td><?= $waktu . " / " . $val->shift; ?></td>
                                <td><?= number_format($val->jumlah_ayam); ?> ekor</td>
                                <td><?= number_format($val->average_farm, 2); ?> kg</td>
                                <td><?= number_format($val->average_rpa, 2); ?> kg</td>
                                <td class="text-center">
                                    <?php
                                    if ($val->status_spv == 0) {
                                        echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                    } elseif ($val->status_spv == 1) {
                                        echo '<span style="color: #28b463; font-weight: bold;">Verified</span>';
                                    } elseif ($val->status_spv == 2) {
                                        echo '<a href="#" class="font-weight-bold text-danger" data-toggle="modal" data-target="#spvModal-' . $val->uuid . '">Revision</a>';
                                    }
                                    ?>
                                </td>

                                <td>
                                    <a href="<?= base_url('post-mortem/edit/'.$val->uuid); ?>" class="btn btn-warning btn-sm rounded-circle" title="Update">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('post-mortem/delete/'.$val->uuid); ?>" class="btn btn-danger btn-sm rounded-circle" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <!-- Modal SPV Revision Detail -->
                            <div class="modal fade" id="spvModal-<?= $val->uuid ?>" tabindex="-1" role="dialog" aria-labelledby="spvModalLabel-<?= $val->uuid ?>" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                <div class="modal-content">
                                  <div class="modal-header bg-warning text-dark">
                                    <h5 class="modal-title" id="spvModalLabel-<?= $val->uuid ?>"><i class="fas fa-info-circle mr-2"></i> Detail Revisi SPV</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                <p><strong>Status:</strong> 
                                    <span class="text-danger">Revision</span>
                                </p>
                                <p><strong>Catatan SPV:</strong><br>
                                    <?= !empty($val->catatan_spv) ? nl2br(htmlspecialchars($val->catatan_spv)) : '<em>Tidak ada catatan.</em>' ?>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
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
