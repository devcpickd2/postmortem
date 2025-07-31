<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets\img\favicon.ico');?>" type="image/x-icon">
    <title>RPA</title>
    <!-- Custom fonts for this template -->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css')?>" rel="stylesheet">
    <!-- Custom styles for this page -->
    <!-- Bootstrap 4 Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Tempus Dominus Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css');?>">
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home');?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-drumstick-bite"></i>
                </div>
                <div class="sidebar-brand-text mx-3">POST MORTEM</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item <?= $active_nav == 'home' ?'active':'';?>">
                <a class="nav-link" href="<?= base_url('home');?>">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <?php
            $tipe_user = $this->session->userdata('tipe_user');
            ?>
            <?php if ($tipe_user == 0): ?>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">MASTER DATA</div>
                <li class="nav-item <?= $active_nav == 'data_master' | $active_nav == 'pegawai' | $active_nav == 'departemen' | $active_nav == 'plant'?'active':'';?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataMaster"
                    aria-expanded="true" aria-controls="collapseDataMaster">
                    <i class="fas fa-briefcase"></i>
                    <span>Data Master</span>
                </a>

                <div id="collapseDataMaster" class="collapse <?= $active_nav == 'pegawai' | $active_nav == 'departemen' | $active_nav == 'plant' ?'show':'';?>" aria-labelledby="headingDataMaster" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?= $active_nav == 'pegawai' ?'active':'';?>" href="<?= base_url('pegawai')?>">Pegawai</a>
                        <a class="collapse-item <?= $active_nav == 'departemen' ?'active':'';?>" href="<?= base_url('departemen')?>">Departemen</a>
                        <a class="collapse-item <?= $active_nav == 'plant' ?'active':'';?>" href="<?= base_url('plant')?>">Plant</a>
                    </div>
                </div>
            </li>
        <?php endif; ?>
        <!-- Awal Form QC -->

<!-- FORM QC (hanya user_type 0,1,4) -->
<?php if (in_array($tipe_user, [0, 1, 8, 4])): ?>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">FORM QC</div>
    <li class="nav-item <?= $active_nav == 'form_qc' | $active_nav == 'post-mortem' | $active_nav == 'defeat-evis' ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQC1"
        aria-expanded="true" aria-controls="collapseQC1">
        <i class="fas fa-file-alt"></i>
        <span>FORM QC</span></a>
        <div id="collapseQC1" class="collapse <?=  $active_nav == 'post-mortem' | $active_nav == 'defeat-evis' ?'show':'';?>" aria-labelledby="headingQC" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= $active_nav == 'post-mortem' ?'active':'';?>" href="<?= base_url('post-mortem')?>">Pemeriksaan Post Mortem</a>
                <a class="collapse-item <?= $active_nav == 'defeat-evis' ?'active':'';?>" href="<?= base_url('defeat-evis')?>">Defeathering - Evisceration</a>
            </div>
        </div>
    </li>
<!-- Batas Form QC -->
<?php endif; ?>

<!-- Verifikasi SPV -->
<!-- VERIFIKASI SPV (hanya tipe_user 0,1,2) -->
<?php if (in_array($tipe_user, [0, 1, 2])): ?>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">VERIFIKASI SUPERVISOR</div>
    <li class="nav-item <?= ($active_nav == 'verifikasi' || $active_nav == 'verifikasi-post-mortem' || $active_nav == 'verifikasi-defeat-evis') ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQC21" aria-expanded="true" aria-controls="collapseQC21">
            <i class="fas fa-clipboard-check"></i>
            <span>VERIFIKASI SUPERVISOR</span></a>
            <div id="collapseQC21" class="collapse <?= ( $active_nav == 'verifikasi-post-mortem' || $active_nav == 'verifikasi-defeat-evis' ) ? 'show' : ''; ?>" aria-labelledby="headingQC" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item <?= $active_nav == 'verifikasi-post-mortem' ? 'active' : ''; ?>" href="<?= base_url('post-mortem/verifikasi')?>">Pemeriksaan Post Mortem</a>
                    <a class="collapse-item <?= $active_nav == 'verifikasi-defeat-evis' ? 'active' : ''; ?>" href="<?= base_url('defeat-evis/verifikasi')?>">Defeathering - Evisceration</a>
                </div>
            </div>

        </li>
        <!-- Batas SPV -->
    <?php endif; ?>

    <hr class="sidebar-divider">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Nama Perusahaan -->
        <div class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 nama-pt">
            <strong>PT. CHAROEN POKPHAND INDONESIA - FOOD DIVISION</strong>
        </div>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <?php
            $foto = $this->session->userdata('foto') ?? 'profil.png';
            $foto_url = base_url('uploads/foto/' . $foto);
            ?>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!-- Nama User -->
                    <span class="mr-2 d-none d-lg-inline text-dark small font-weight-bold">
                        Hallo, <?= $this->session->userdata('nama'); ?>
                    </span>
                    <!-- Foto Profil -->
                    <img class="img-profile rounded-circle" 
                    src="<?= $foto_url ?>" 
                    width="40" height="40" 
                    onerror="this.onerror=null;this.src='<?= base_url('uploads/foto/profil.png') ?>';" 
                    alt="Foto Profil">
                </a>

                <!-- Dropdown Menu -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('profil'); ?>">
                        <i class="fas fa-user-edit fa-sm fa-fw mr-2 text-primary"></i> 
                        <span class="text-dark">Profil</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('logout'); ?>">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                        <span class="text-dark">Logout</span>
                    </a>
                </div>
            </li>
        </ul>
    </nav>


    <style type="text/css">
        #wrapper {
            background-color: #2E86C1;
        }
        .mr-2 {
            font-size: 18px;
            font-weight: bold;
        } 
        .navbar .dropdown-menu .dropdown-item:hover {
            background-color: #f8f9fc;
            color: #4e73df;
            font-weight: 500;
        }

        .navbar .fa-user-circle {
            transition: transform 0.3s ease;
        }

        .navbar .fa-user-circle:hover {
            transform: scale(1.1);
            color: #4e73df;
        }

        .dropdown-menu .dropdown-item i {
            width: 20px;
            text-align: center;
        }

    </style>
