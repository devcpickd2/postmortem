<!DOCTYPE html>
<html>
<head> 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php if ($this->session->flashdata('success_msg')): ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '<?= $this->session->flashdata('success_msg'); ?>',
        showConfirmButton: false,
        timer: 2000
      });
    </script>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error_msg')): ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: '<?= $this->session->flashdata('error_msg'); ?>'
      });
    </script>
  <?php endif; ?>
</head>

<body>
  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <?php
      date_default_timezone_set('Asia/Jakarta');
      $hari = array(
        'Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'
      );
      $bulan = array(
        'January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret',
        'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli',
        'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober',
        'November' => 'November', 'December' => 'Desember'
      );
      echo '<h3 class="mb-0">Update Hari Ini ' . $hari[date("l")] . ', ' . date("j") . ' ' . $bulan[date("F")] . ' ' . date("Y") . '</h3>';
      ?>
    </div>

    <div class="row">
      <!-- Total Kedatangan Hari ini -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Kedatangan Hari ini</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?= $count_today > 0 ? $count_today . ' Kedatangan' : 'Tidak ada kedatangan untuk hari ini.' ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-truck fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Waktu Kedatangan Terakhir -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Waktu Kedatangan Terakhir</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?= !empty($latest_today) ? $latest_today['waktu_kedatangan'] : 'Tidak ada data hari ini.' ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clock fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Kedatangan Ayam Terakhir -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Ayam Terakhir</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?= !empty($latest_today) ? $latest_today['jumlah_ayam'] . ' ekor' : 'Tidak ada data hari ini.' ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-cubes fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Total Defect Terakhir -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Defect Terakhir</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php
                  if (!empty($latest_today)) {
                    $total_defect = $latest_today['total_ayam_defect'] + $latest_today['total_defect_ayam_lebih'];
                    echo $total_defect . ' defect';
                  } else {
                    echo 'Tidak ada data hari ini.';
                  }
                  ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-times-circle fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Grafik -->
    <div class="row">
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Total Defect Hari Ini</h6>
          </div>
          <div class="card-body">
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>

      <!-- Tabel Kedatangan Hari Ini -->
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kedatangan Hari Ini</h6>
          </div>
          <div class="card-body">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th>Waktu</th>
                  <th>Nama Farm</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($data_today)): ?>
                  <?php foreach ($data_today as $data): ?>
                    <tr>
                      <td><?= $data['waktu_kedatangan']; ?></td>
                      <td><?= $data['nama_farm']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr><td colspan="2">Tidak ada data hari ini.</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Chart Script -->
<script>
  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: <?= json_encode(array_column($data_today, 'waktu_kedatangan')) ?>,
      datasets: [{
        label: 'Defect Tunggal',
        data: <?= json_encode(array_column($data_today, 'total_ayam_defect')) ?>,
        borderColor: 'rgba(54, 162, 235, 1)',
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderWidth: 2
      }, {
        label: 'Defect > 1',
        data: <?= json_encode(array_column($data_today, 'total_defect_ayam_lebih')) ?>,
        borderColor: 'rgba(255, 99, 132, 1)',
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderWidth: 2
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: { beginAtZero: true }
      },
      plugins: {
        tooltip: {
          callbacks: {
            label: function(context) {
              return context.parsed.y.toFixed(0);
            }
          }
        }
      }
    }
  });
</script>

<?php if ($show_modal): ?>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      Swal.fire({
        title: 'Input Informasi Produksi',
        html: `
        <form id="formProduksi" action="<?= base_url('home/set_produksi_data') ?>" method="post">
          <div class="form-group text-left">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required value="<?= date('Y-m-d') ?>">
          </div>
          <div class="form-group text-left">
            <label for="shift">Shift</label>
            <select name="shift" class="form-control" required>
              <option value="">-- Pilih Shift --</option>
              <option value="1">Shift 1</option>
              <option value="2">Shift 2</option>
              <option value="3">Shift 3</option>
            </select>
          </div>
          <div class="form-group text-left">
            <label for="nama_produksi">Nama Produksi</label>
            <select name="nama_produksi" class="form-control" required>
              <option value="">-- Pilih Nama Produksi --</option>
              <?php foreach ($pegawai_produksi as $pegawai): ?>
                <option value="<?= $pegawai->nama ?>"><?= $pegawai->nama ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </form>
              `,
              showCancelButton: false,
              confirmButtonText: 'Simpan',
              allowOutsideClick: false,
              preConfirm: () => {
                document.getElementById('formProduksi').submit();
              }
            });
    });
  </script>
<?php endif; ?>

</body>
</html>


<style type="text/css">
  table {
    border-collapse: collapse;
    width: 100%;
  }

  .text-xs {
    font-size: 17px;
  }
  p {
    font-size: 17px;
  }
  li {
    font-size: 17px;
  }
  .h3{
    font-size: 23px;
    font-weight: bold;
    font-style: italic;
  }
  .chart2 {
    padding: 5px;
  }
  #chart {
    width: 100%;
  }
  canvas {
    cursor: pointer;
  }

  .table-limited {
    width: 100%;
    max-width: 100%;
    table-layout: fixed;
    overflow-x: auto; 
  }

  .table-limited thead, .table-limited tbody {
    display: block; 
  }

  .table-limited thead {
    overflow-y: auto; 
    width: calc(100% - 1em); 
  }

  .table-limited tbody {
    max-height: 185px; 
    overflow-y: auto; 
  }

  .table-limited th, .table-limited td {
    padding: 2px 10px;
    text-align: left;
  }
</style>