<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Proses Defeathering</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('defeat-evis')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Pemeriksaan Proses Defeathering - Evisceration</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Update</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
               <form class="user" method="post" action="<?= base_url('defeat-evis/edit/'.$defeat_evis->uuid);?>">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?= $defeat_evis->date; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('date') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Shift</label>
                        <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                            <option value="1" <?= set_select('shift', '1'); ?> <?= $defeat_evis->shift == 1?'selected':'';?>>1</option>
                            <option value="2" <?= set_select('shift', '2'); ?> <?= $defeat_evis->shift == 2?'selected':'';?>>2</option>
                            <option value="3" <?= set_select('shift', '3'); ?> <?= $defeat_evis->shift == 3?'selected':'';?>>3</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> "><?= form_error('shift') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Nomor Truck</label>
                        <input type="text" name="no_truck" class="form-control <?= form_error('no_truck') ? 'invalid' : '' ?> " value="<?= $defeat_evis->no_truck; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('no_truck')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('no_truck') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Waktu Mulai</label> 
                        <input type="time" name="time_start" class="form-control <?= form_error('time_start') ? 'invalid' : '' ?> " value="<?= $defeat_evis->time_start; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('time_start')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('time_start') ?>
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Waktu Selesai</label>
                        <input type="time" name="time_finish" class="form-control <?= form_error('time_finish') ? 'invalid' : '' ?> " value="<?= $defeat_evis->time_finish; ?>">
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
                        <input type="text" name="speed_defeat_setting" class="form-control <?= form_error('speed_defeat_setting') ? 'invalid' : '' ?> " value="<?= $defeat_evis->speed_defeat_setting; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('speed_defeat_setting')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('speed_defeat_setting') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Aktual (ekor/menit)</label>
                        <input type="text" name="speed_defeat_actual" class="form-control <?= form_error('speed_defeat_actual') ? 'invalid' : '' ?> " value="<?= $defeat_evis->speed_defeat_actual; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('speed_defeat_actual')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('speed_defeat_actual') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Setting (Hz)</label>
                        <input type="text" name="speed_evis_setting" class="form-control <?= form_error('speed_evis_setting') ? 'invalid' : '' ?> " value="<?= $defeat_evis->speed_evis_setting; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('speed_evis_setting')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('speed_evis_setting') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Aktual (ekor/menit)</label>
                        <input type="text" name="speed_evis_actual" class="form-control <?= form_error('speed_evis_actual') ? 'invalid' : '' ?> " value="<?= $defeat_evis->speed_evis_actual; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('speed_evis_actual')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('speed_evis_actual') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Voltage</label>
                        <input type="text" name="stunning_voltage" class="form-control <?= form_error('stunning_voltage') ? 'invalid' : '' ?> " value="<?= $defeat_evis->stunning_voltage; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('stunning_voltage')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('stunning_voltage') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Ampere</label>
                        <input type="text" name="stunning_ampere" class="form-control <?= form_error('stunning_ampere') ? 'invalid' : '' ?> " value="<?= $defeat_evis->stunning_ampere; ?>">
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
                        <input type="text" name="kondisi_ayam_stunning_hidup" class="form-control <?= form_error('kondisi_ayam_stunning_hidup') ? 'invalid' : '' ?> " value="<?= $defeat_evis->kondisi_ayam_stunning_hidup; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('kondisi_ayam_stunning_hidup')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('kondisi_ayam_stunning_hidup') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Mati (ekor)</label>
                        <input type="text" name="kondisi_ayam_stunning_mati" class="form-control <?= form_error('kondisi_ayam_stunning_mati') ? 'invalid' : '' ?> " value="<?= $defeat_evis->kondisi_ayam_stunning_mati; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('kondisi_ayam_stunning_mati')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('kondisi_ayam_stunning_mati') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Bleeding Time</label>
                        <input type="text" name="bleeding_time" class="form-control <?= form_error('bleeding_time') ? 'invalid' : '' ?> " value="<?= $defeat_evis->bleeding_time; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('bleeding_time')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('bleeding_time') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Hidup (ekor)</label>
                        <input type="text" name="kondisi_ayam_slaugh_hidup" class="form-control <?= form_error('kondisi_ayam_slaugh_hidup') ? 'invalid' : '' ?> " value="<?= $defeat_evis->kondisi_ayam_slaugh_hidup; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('kondisi_ayam_slaugh_hidup')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('kondisi_ayam_slaugh_hidup') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Mati (ekor)</label>
                        <input type="text" name="kondisi_ayam_slaugh_mati" class="form-control <?= form_error('kondisi_ayam_slaugh_mati') ? 'invalid' : '' ?> " value="<?= $defeat_evis->kondisi_ayam_slaugh_mati; ?>">
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
                        <input type="text" name="hasil_sembelih_3_saluran" class="form-control <?= form_error('hasil_sembelih_3_saluran') ? 'invalid' : '' ?> " value="<?= $defeat_evis->hasil_sembelih_3_saluran; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('hasil_sembelih_3_saluran')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('hasil_sembelih_3_saluran') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Tidak Terputus (ekor)</label>
                        <input type="text" name="hasil_sembelih_tidak_terputus" class="form-control <?= form_error('hasil_sembelih_tidak_terputus') ? 'invalid' : '' ?> " value="<?= $defeat_evis->hasil_sembelih_tidak_terputus; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('hasil_sembelih_tidak_terputus')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('hasil_sembelih_tidak_terputus') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">ATP (ekor)</label>
                        <input type="text" name="atp" class="form-control <?= form_error('atp') ? 'invalid' : '' ?> " value="<?= $defeat_evis->atp; ?>">
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
                        <input type="text" name="scalding_suhu_set_1" class="form-control <?= form_error('scalding_suhu_set_1') ? 'invalid' : '' ?> " value="<?= $defeat_evis->scalding_suhu_set_1; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_suhu_set_1')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_suhu_set_1') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 1</label>
                        <input type="text" name="scalding_suhu_show_1" class="form-control <?= form_error('scalding_suhu_show_1') ? 'invalid' : '' ?> " value="<?= $defeat_evis->scalding_suhu_show_1; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_suhu_show_1')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_suhu_show_1') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 1</label>
                        <input type="text" name="scalding_suhu_aktual_1" class="form-control <?= form_error('scalding_suhu_aktual_1') ? 'invalid' : '' ?> " value="<?= $defeat_evis->scalding_suhu_aktual_1; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_suhu_aktual_1')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_suhu_aktual_1') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 1</label>
                        <input type="text" name="scalding_time_1" class="form-control <?= form_error('scalding_time_1') ? 'invalid' : '' ?> " value="<?= $defeat_evis->scalding_time_1; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_time_1')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_time_1') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 2</label>
                        <input type="text" name="scalding_suhu_set_2" class="form-control <?= form_error('scalding_suhu_set_2') ? 'invalid' : '' ?> " value="<?= $defeat_evis->scalding_suhu_set_2; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_suhu_set_2')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_suhu_set_2') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 2</label>
                        <input type="text" name="scalding_suhu_show_2" class="form-control <?= form_error('scalding_suhu_show_2') ? 'invalid' : '' ?> " value="<?= $defeat_evis->scalding_suhu_show_2; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_suhu_show_2')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_suhu_show_2') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 2</label>
                        <input type="text" name="scalding_suhu_aktual_2" class="form-control <?= form_error('scalding_suhu_aktual_2') ? 'invalid' : '' ?> " value="<?= $defeat_evis->scalding_suhu_aktual_2; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_suhu_aktual_2')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_suhu_aktual_2') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 2</label>
                        <input type="text" name="scalding_time_2" class="form-control <?= form_error('scalding_time_2') ? 'invalid' : '' ?> " value="<?= $defeat_evis->scalding_time_2; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_time_2')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_time_2') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 3</label>
                        <input type="text" name="scalding_suhu_set_3" class="form-control <?= form_error('scalding_suhu_set_3') ? 'invalid' : '' ?> " value="<?= $defeat_evis->scalding_suhu_set_3; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_suhu_set_3')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_suhu_set_3') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 3</label>
                        <input type="text" name="scalding_suhu_show_3" class="form-control <?= form_error('scalding_suhu_show_3') ? 'invalid' : '' ?> " value="<?= $defeat_evis->scalding_suhu_show_3; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_suhu_show_3')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_suhu_show_3') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 3</label>
                        <input type="text" name="scalding_suhu_aktual_3" class="form-control <?= form_error('scalding_suhu_aktual_3') ? 'invalid' : '' ?> " value="<?= $defeat_evis->scalding_suhu_aktual_3; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('scalding_suhu_aktual_3')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('scalding_suhu_aktual_3') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Scalder 3</label>
                        <input type="text" name="scalding_time_3" class="form-control <?= form_error('scalding_time_3') ? 'invalid' : '' ?> " value="<?= $defeat_evis->scalding_time_3; ?>">
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