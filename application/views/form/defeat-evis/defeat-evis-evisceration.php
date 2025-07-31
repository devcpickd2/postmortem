<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Proses Evisceration</h1>
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
             <form class="user" method="post" action="<?= base_url('defeat-evis/evisceration/'.$defeat_evis->uuid);?>">
                <label class="form-label font-weight-bold">PEMERIKSAAN BUMBLE FOOT</label>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Bumble Ringan (%)</label>
                        <input type="text" name="bumble_foot_ringan" class="form-control <?= form_error('bumble_foot_ringan') ? 'invalid' : '' ?> " value="<?= $defeat_evis->bumble_foot_ringan; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('bumble_foot_ringan')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('bumble_foot_ringan') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Bumble Berat (%)</label>
                        <input type="text" name="bumble_foot_berat" class="form-control <?= form_error('bumble_foot_berat') ? 'invalid' : '' ?> " value="<?= $defeat_evis->bumble_foot_berat; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('bumble_foot_berat')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('bumble_foot_berat') ?>
                        </div>
                    </div>
                </div>
                <hr>
                <br>
                <label class="form-label font-weight-bold">PEMERIKSAAN INCOMPLETE DEFEATHERING</label>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Setelah Mesin Plucker (%)</label>
                        <input type="text" name="incomplete_mesin_plucker" class="form-control <?= form_error('incomplete_mesin_plucker') ? 'invalid' : '' ?> " value="<?= $defeat_evis->incomplete_mesin_plucker; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('incomplete_mesin_plucker')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('incomplete_mesin_plucker') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Setelah Inside Outside Washing (%)</label>
                        <input type="text" name="incomplete_inside_out_washing" class="form-control <?= form_error('incomplete_inside_out_washing') ? 'invalid' : '' ?> " value="<?= $defeat_evis->incomplete_inside_out_washing; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('incomplete_inside_out_washing')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('incomplete_inside_out_washing') ?>
                        </div>
                    </div>
                </div>
                <hr>
                <br>
                <label class="form-label font-weight-bold">PERSENTASE TEMBOLOK BERISI PAKAN</label>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Persentase (%)</label>
                        <input type="text" name="persentase_tembolok_berisi" class="form-control <?= form_error('persentase_tembolok_berisi') ? 'invalid' : '' ?> " value="<?= $defeat_evis->persentase_tembolok_berisi; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('persentase_tembolok_berisi')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('persentase_tembolok_berisi') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Berat Rata-rata (g)</label>
                        <input type="text" name="average_tembolok_berisi" class="form-control <?= form_error('average_tembolok_berisi') ? 'invalid' : '' ?> " value="<?= $defeat_evis->average_tembolok_berisi; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('average_tembolok_berisi')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('average_tembolok_berisi') ?>
                        </div>
                    </div>
                </div>
                <hr>
                <br>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Persentase Usus Pecah (%)</label>
                        <input type="text" name="persentase_tembolok_berisi" class="form-control <?= form_error('persentase_tembolok_berisi') ? 'invalid' : '' ?> " value="<?= $defeat_evis->persentase_tembolok_berisi; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('persentase_tembolok_berisi')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('persentase_tembolok_berisi') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Persentase Empedu Pecah</label>
                        <input type="text" name="persentase_empedu_pecah" class="form-control <?= form_error('persentase_empedu_pecah') ? 'invalid' : '' ?> " value="<?= $defeat_evis->persentase_empedu_pecah; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('persentase_empedu_pecah')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('persentase_empedu_pecah') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Persentase Incomplete Evisceration (%)</label>
                        <input type="text" name="persentase_incomplete_evisceration" class="form-control <?= form_error('persentase_incomplete_evisceration') ? 'invalid' : '' ?> " value="<?= $defeat_evis->persentase_incomplete_evisceration; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('persentase_incomplete_evisceration')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('persentase_incomplete_evisceration') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Inside Outside Washing (Liter/ekor)</label>
                        <input type="text" name="inside_outside_washing" class="form-control <?= form_error('inside_outside_washing') ? 'invalid' : '' ?> " value="<?= $defeat_evis->inside_outside_washing; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('inside_outside_washing')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('inside_outside_washing') ?>
                        </div>
                    </div>
                </div>
                <hr>
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