<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Proses Defeathering</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('defeat-evis')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Pemeriksaan Proses Defeathering - Evisceration</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('defeat-evis/tambah');?>">
                 <?php
                 $produksi_data = $this->session->userdata('produksi_data');
                 $tanggal_sess = $produksi_data['tanggal'] ?? date('Y-m-d');
                 $shift_sess = $produksi_data['shift'] ?? '';
                 ?>
                 <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'is-invalid' : '' ?>" value="<?= set_value('date', $tanggal_sess) ?>">
                        <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('date') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Shift</label>
                        <select name="shift" class="form-control <?= form_error('shift') ? 'is-invalid' : '' ?>">
                          <!-- <option disabled <?= empty($shift_sess) ? 'selected' : '' ?>>Pilih Shift</option> -->
                          <option value="1" <?= set_select('shift', '1', $shift_sess == '1') ?>>Shift 1</option>
                          <option value="2" <?= set_select('shift', '2', $shift_sess == '2') ?>>Shift 2</option>
                          <option value="3" <?= set_select('shift', '3', $shift_sess == '3') ?>>Shift 3</option>
                      </select>
                        <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> "><?= form_error('shift') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Nomor Truck</label>
                        <input type="text" name="no_truck" class="form-control <?= form_error('no_truck') ? 'invalid' : '' ?> " placeholder="Masukkan Nomor Truck" value="<?= set_value('no_truck'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('no_truck')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('no_truck') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Waktu Mulai</label> 
                        <input type="time" name="time_start" class="form-control <?= form_error('time_start') ? 'invalid' : '' ?> " value="<?= set_value('time_start'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('time_start')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('time_start') ?>
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Waktu Selesai</label>
                        <input type="time" name="time_finish" class="form-control <?= form_error('time_finish') ? 'invalid' : '' ?> " value="<?= set_value('time_finish'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('time_finish')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('time_finish') ?>
                        </div>
                    </div>
                </div>
                <hr>
                <br>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">OVER HEAD SPEED DEFEATHERING</label>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">OVER HEAD SPEED EVISCERATION</label>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">STUNNING (VOLTAGE / AMPERE)</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Setting (Hz)</label>
                        <input type="text" name="speed_defeat_setting" class="form-control <?= form_error('speed_defeat_setting') ? 'invalid' : '' ?> " value="<?= set_value('speed_defeat_setting'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('speed_defeat_setting')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('speed_defeat_setting') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Aktual (ekor/menit)</label>
                        <input type="text" name="speed_defeat_actual" class="form-control <?= form_error('speed_defeat_actual') ? 'invalid' : '' ?> " value="<?= set_value('speed_defeat_actual'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('speed_defeat_actual')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('speed_defeat_actual') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Setting (Hz)</label>
                        <input type="text" name="speed_evis_setting" class="form-control <?= form_error('speed_evis_setting') ? 'invalid' : '' ?> " value="<?= set_value('speed_evis_setting'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('speed_evis_setting')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('speed_evis_setting') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Aktual (ekor/menit)</label>
                        <input type="text" name="speed_evis_actual" class="form-control <?= form_error('speed_evis_actual') ? 'invalid' : '' ?> " value="<?= set_value('speed_evis_actual'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('speed_evis_actual')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('speed_evis_actual') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Voltage</label>
                        <input type="text" name="stunning_voltage" class="form-control <?= form_error('stunning_voltage') ? 'invalid' : '' ?> " value="<?= set_value('stunning_voltage'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('stunning_voltage')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('stunning_voltage') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Ampere</label>
                        <input type="text" name="stunning_ampere" class="form-control <?= form_error('stunning_ampere') ? 'invalid' : '' ?> " value="<?= set_value('stunning_ampere'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('stunning_ampere')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('stunning_ampere') ?>
                        </div>
                    </div>
                </div>
                <hr>
                <br>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">KONDISI AYAM SETELAH STUNNING</label>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">BLEEDING TIME</label>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">KONDISI AYAM SETELAH PROSES SLAUGHTERING</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Hidup (ekor)</label>
                        <input type="text" name="kondisi_ayam_stunning_hidup" class="form-control <?= form_error('kondisi_ayam_stunning_hidup') ? 'invalid' : '' ?> " value="<?= set_value('kondisi_ayam_stunning_hidup'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('kondisi_ayam_stunning_hidup')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('kondisi_ayam_stunning_hidup') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Mati (ekor)</label>
                        <input type="text" name="kondisi_ayam_stunning_mati" class="form-control <?= form_error('kondisi_ayam_stunning_mati') ? 'invalid' : '' ?> " value="<?= set_value('kondisi_ayam_stunning_mati'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('kondisi_ayam_stunning_mati')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('kondisi_ayam_stunning_mati') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Bleeding Time</label>
                        <input type="text" name="bleeding_time" class="form-control <?= form_error('bleeding_time') ? 'invalid' : '' ?> " value="<?= set_value('bleeding_time'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('bleeding_time')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('bleeding_time') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Hidup (ekor)</label>
                        <input type="text" name="kondisi_ayam_slaugh_hidup" class="form-control <?= form_error('kondisi_ayam_slaugh_hidup') ? 'invalid' : '' ?> " value="<?= set_value('kondisi_ayam_slaugh_hidup'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('kondisi_ayam_slaugh_hidup')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('kondisi_ayam_slaugh_hidup') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Mati (ekor)</label>
                        <input type="text" name="kondisi_ayam_slaugh_mati" class="form-control <?= form_error('kondisi_ayam_slaugh_mati') ? 'invalid' : '' ?> " value="<?= set_value('kondisi_ayam_slaugh_mati'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('kondisi_ayam_slaugh_mati')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('ko3                  `ndisi_ayam_slaugh_mati') ?>
                        </div>
                    </div>
                </div>

                <hr>
                <br>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <label class="form-label font-weight-bold">HASIL PENYEMBELIHAN</label>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">JUMLAH AYAM YANG TIDAK TERPOTONG</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Terputus 3 Saluran (ekor)</label>
                        <input type="text" name="hasil_sembelih_3_saluran" class="form-control <?= form_error('hasil_sembelih_3_saluran') ? 'invalid' : '' ?> " value="<?= set_value('hasil_sembelih_3_saluran'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('hasil_sembelih_3_saluran')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('hasil_sembelih_3_saluran') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Tidak Terputus (ekor)</label>
                        <input type="text" name="hasil_sembelih_tidak_terputus" class="form-control <?= form_error('hasil_sembelih_tidak_terputus') ? 'invalid' : '' ?> " value="<?= set_value('hasil_sembelih_tidak_terputus'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('hasil_sembelih_tidak_terputus')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('hasil_sembelih_tidak_terputus') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">ATP (ekor)</label>
                        <input type="text" name="atp" class="form-control <?= form_error('atp') ? 'invalid' : '' ?> " value="<?= set_value('atp'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('atp')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('atp') ?>
                        </div>
                    </div>
                </div>
                <hr>
                <br>
                <label class="form-label font-weight-bold">SCALDING</label>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Suhu Set (°C)</label>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Suhu Show (°C)</label>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Suhu Aktual (°C)</label>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalding Time</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 1</label>
                        <input type="text" name="scalding_suhu_set_1" class="form-control <?= form_error('scalding_suhu_set_1') ? 'invalid' : '' ?> " value="<?= set_value('scalding_suhu_set_1'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_suhu_set_1')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_suhu_set_1') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 1</label>
                        <input type="text" name="scalding_suhu_show_1" class="form-control <?= form_error('scalding_suhu_show_1') ? 'invalid' : '' ?> " value="<?= set_value('scalding_suhu_show_1'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_suhu_show_1')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_suhu_show_1') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 1</label>
                        <input type="text" name="scalding_suhu_aktual_1" class="form-control <?= form_error('scalding_suhu_aktual_1') ? 'invalid' : '' ?> " value="<?= set_value('scalding_suhu_aktual_1'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_suhu_aktual_1')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_suhu_aktual_1') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 1</label>
                        <input type="text" name="scalding_time_1" class="form-control <?= form_error('scalding_time_1') ? 'invalid' : '' ?> " value="<?= set_value('scalding_time_1'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_time_1')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_time_1') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 2</label>
                        <input type="text" name="scalding_suhu_set_2" class="form-control <?= form_error('scalding_suhu_set_2') ? 'invalid' : '' ?> " value="<?= set_value('scalding_suhu_set_2'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_suhu_set_2')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_suhu_set_2') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 2</label>
                        <input type="text" name="scalding_suhu_show_2" class="form-control <?= form_error('scalding_suhu_show_2') ? 'invalid' : '' ?> " value="<?= set_value('scalding_suhu_show_2'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_suhu_show_2')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_suhu_show_2') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 2</label>
                        <input type="text" name="scalding_suhu_aktual_2" class="form-control <?= form_error('scalding_suhu_aktual_2') ? 'invalid' : '' ?> " value="<?= set_value('scalding_suhu_aktual_2'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_suhu_aktual_2')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_suhu_aktual_2') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 2</label>
                        <input type="text" name="scalding_time_2" class="form-control <?= form_error('scalding_time_2') ? 'invalid' : '' ?> " value="<?= set_value('scalding_time_2'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_time_2')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_time_2') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 3</label>
                        <input type="text" name="scalding_suhu_set_3" class="form-control <?= form_error('scalding_suhu_set_3') ? 'invalid' : '' ?> " value="<?= set_value('scalding_suhu_set_3'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_suhu_set_3')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_suhu_set_3') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 3</label>
                        <input type="text" name="scalding_suhu_show_3" class="form-control <?= form_error('scalding_suhu_show_3') ? 'invalid' : '' ?> " value="<?= set_value('scalding_suhu_show_3'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_suhu_show_3')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_suhu_show_3') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 3</label>
                        <input type="text" name="scalding_suhu_aktual_3" class="form-control <?= form_error('scalding_suhu_aktual_3') ? 'invalid' : '' ?> " value="<?= set_value('scalding_suhu_aktual_3'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_suhu_aktual_3')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_suhu_aktual_3') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 3</label>
                        <input type="text" name="scalding_time_3" class="form-control <?= form_error('scalding_time_3') ? 'invalid' : '' ?> " value="<?= set_value('scalding_time_3'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_time_3')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_time_3') ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('defeat-evis')?>" class="btn btn-md btn-danger">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<style type="text/css">
    .breadcrumb{
        background-color: #2E86C1;
    }
</style>