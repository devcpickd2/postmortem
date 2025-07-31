<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');

class Defeat_evis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('auth_model'); 
		$this->load->model('pegawai_model'); 
		$this->load->model('defeat_evis_model');

		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array( 
			'defeat_evis' => $this->defeat_evis_model->get_data_by_plant(),
			'active_nav' => 'defeat-evis', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/defeat-evis/defeat-evis', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->defeat_evis_model->rules_defeat();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->defeat_evis_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Defeathering - Evisceration berhasil di simpan');
				redirect('defeat-evis');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Defeathering - Evisceration gagal di simpan');
				redirect('defeat-evis');
			}
		}

		$data = array(
			'active_nav' => 'defeat-evis');

		$this->load->view('partials/head', $data);
		$this->load->view('form/defeat-evis/defeat-evis-tambah');
		$this->load->view('partials/footer');
	}


	public function edit($uuid)
	{
		$rules = $this->defeat_evis_model->rules_defeat();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->defeat_evis_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Defeathering - Evisceration berhasil di Update');
				redirect('defeat-evis');
			}else {
				$this->session->set_flashdata('error_msg', 'Data PengDefeathering - Eviscerationayakan gagal di Update');
				redirect('defeat-evis');
			}
		}

		$data = array(
			'defeat_evis' => $this->defeat_evis_model->get_by_uuid($uuid),
			'active_nav' => 'defeat-evis');

		$this->load->view('partials/head', $data);
		$this->load->view('form/defeat-evis/defeat-evis-edit', $data);
		$this->load->view('partials/footer');
	}

	public function evisceration($uuid)
	{
		$rules = $this->defeat_evis_model->rules_evis();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->defeat_evis_model->evis($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Defeathering - Evisceration berhasil di Update');
				redirect('defeat-evis');
			}else {
				$this->session->set_flashdata('error_msg', 'Data PengDefeathering - Eviscerationayakan gagal di Update');
				redirect('defeat-evis');
			}
		}

		$data = array(
			'defeat_evis' => $this->defeat_evis_model->get_by_uuid($uuid),
			'active_nav' => 'defeat-evis');

		$this->load->view('partials/head', $data);
		$this->load->view('form/defeat-evis/defeat-evis-evisceration', $data);
		$this->load->view('partials/footer');
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('defeat-evis');
		}

		$deleted = $this->defeat_evis_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('defeat-evis');
	}

	public function verifikasi()
	{
		$data = array(
			'defeat_evis' => $this->defeat_evis_model->get_data_by_plant(),
			'active_nav' => 'verifikasi-defeat-evis', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/defeat-evis/defeat-evis-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->defeat_evis_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->defeat_evis_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data defeat-evis Produk dan Prosedur berhasil di Update');
				redirect('defeat-evis/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data defeat-evis Produk dan Prosedur gagal di Update');
				redirect('defeat-evis/verifikasi');
			}
		}

		$data = array(
			'defeat_evis' => $this->defeat_evis_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-defeat-evis');

		$this->load->view('partials/head', $data);
		$this->load->view('form/defeat-evis/defeat-evis-status', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 504);
		}

		$defeat_evis_data = $this->defeat_evis_model->get_by_uuid_defeat_evis($selected_items);

		if (empty($defeat_evis_data)) {
			show_error('Data tidak ditemukan, Pilih data yang ingin dicetak', 504);
		}

		$data['defeat_evis'] = $defeat_evis_data[0];

		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->setPrintHeader(false); 
		$pdf->SetMargins(20, 15, 10);
		$pdf->AddPage('L', 'LEGAL');
		$pdf->SetFont('times', 'B', 7);

		$logo_path = FCPATH . 'assets/img/logo.jpg';
		if (file_exists($logo_path)) {
			$pdf->Image($logo_path, 20, 15, 30);
		} else {
			$pdf->Write(7, "Logo tidak ditemukan\n");
		}
		$pdf->MultiCell(0, 3, 'PT. CHAROEN POKPHAND INDONESIA', 0, 'C');
		// $pdf->MultiCell(0, 3, 'BANYUMAS - INDONESIA', 0, 'C');
		$pdf->SetFont('times', 'B', 9);
		$pdf->MultiCell(0, 3, 'PEMERIKSAAN PROSES DEFEATHERING - EVISCERATION', 0, 'C');
		$pdf->Ln(5);

		$tanggal = $data['defeat_evis']->date;
		setlocale(LC_TIME, 'IND');
		$date = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());

		$pdf->SetFont('times', '', 7);
		$pdf->Write(0, 'Tanggal: ' . $formatted_date);
		$pdf->SetX($pdf->GetX() + 30); 
		$pdf->Write(0, 'Shift: '. $data['defeat_evis']->shift, 2, 0, 'L');
		$pdf->Ln(3);

		$pdf->SetFont('times', 'B', 8);
		$pdf->SetX(20);
		$pdf->Write(0, 'Pemeriksaan Proses Defeathering');
		$pdf->SetX($pdf->GetX() + 10);
		$pdf->Ln(4);
		$pdf->SetFont('times', '', 7);

		$pdf->Cell(50, 4, 'No. Truck', 1, 0, 'L');

		$jumlah_data = count($defeat_evis_data);
		$max_kolom = 4;

		foreach ($defeat_evis_data as $item) {
			$pdf->Cell(65, 4, $item->no_truck, 1, 0, 'C');
		}
		for ($i = $jumlah_data; $i < $max_kolom; $i++) {
			$pdf->Cell(65, 4, '', 1, 0, 'C');
		}

		$pdf->Ln();

		function fill_cells($pdf, $data, $max, $callback) {
			$count = count($data);
			foreach ($data as $item) {
				$callback($pdf, $item);
			}
			for ($i = $count; $i < $max; $i++) {
				$callback($pdf, null);
			}
		}
		$pdf->Cell(50, 4, 'Waktu', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			if ($item) {
				$start = (new DateTime($item->time_start))->format('i:s');
				$finish = (new DateTime($item->time_finish))->format('i:s');
				$pdf->Cell(65, 4, $start . ' - ' . $finish, 1, 0, 'C');
			} else {
				$pdf->Cell(65, 4, '', 1, 0, 'C');
			}
		});

		$pdf->Ln();

		$pdf->Cell(50, 4, 'Over Head Speed Defeathering', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(30, 4, 'Setting (Hz)', 1, 0, 'C');
			$pdf->Cell(35, 4, 'Aktual (ekor/menit)', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, '', 1, 0, 'C');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(30, 4, $item ? $item->speed_defeat_setting : '', 1, 0, 'C');
			$pdf->Cell(35, 4, $item ? $item->speed_defeat_actual : '', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, 'Over Head Speed Evisceration', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(30, 4, 'Setting (Hz)', 1, 0, 'C');
			$pdf->Cell(35, 4, 'Aktual (ekor/menit)', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, '', 1, 0, 'C');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(30, 4, $item ? $item->speed_evis_setting : '', 1, 0, 'C');
			$pdf->Cell(35, 4, $item ? $item->speed_evis_actual : '', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, 'Stunning (Voltage / Ampere)', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(65, 4, $item ? ($item->stunning_voltage . ' / ' . $item->stunning_ampere) : '', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, 'Kondisi Ayam Setelah Stunning', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(30, 4, 'Hidup', 1, 0, 'C');
			$pdf->Cell(35, 4, 'Mati', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, '( sebelum penyembelihan )', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(30, 4, $item ? $item->kondisi_ayam_stunning_hidup . ' ekor' : '', 1, 0, 'C');
			$pdf->Cell(35, 4, $item ? $item->kondisi_ayam_stunning_mati . ' ekor' : '', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, 'Bleeding Time', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(65, 4, $item ? $item->bleeding_time : '', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, 'Kondisi Ayam Setelah Proses Slaughtering', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(30, 4, 'Hidup', 1, 0, 'C');
			$pdf->Cell(35, 4, 'Mati', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, '( sebelum scalding )', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(30, 4, $item ? $item->kondisi_ayam_slaugh_hidup . ' ekor' : '', 1, 0, 'C');
			$pdf->Cell(35, 4, $item ? $item->kondisi_ayam_slaugh_mati . ' ekor' : '', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, 'Hasil Penyembelihan', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(30, 4, 'Terputus 3 Saluran', 1, 0, 'C');
			$pdf->Cell(35, 4, 'Tidak Terputus', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, '', 1, 0, 'C');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(30, 4, $item ? $item->hasil_sembelih_3_saluran . ' ekor' : '', 1, 0, 'C');
			$pdf->Cell(35, 4, $item ? $item->hasil_sembelih_tidak_terputus . ' ekor' : '', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, 'Jumlah Ayam Tidak Terpotong (ATP)', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(65, 4, $item ? $item->atp . ' ekor' : '', 1, 0, 'C');
		});
		$pdf->Ln();
		$pdf->Cell(50, 4, 'Scalding', 1, 0, 'L');
		$pdf->SetFont('times', '', 6);
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(15, 4, 'Suhu Set (°C)', 1, 0, 'C');
			$pdf->Cell(17, 4, 'Suhu Show (°C)', 1, 0, 'C');
			$pdf->Cell(17, 4, 'Suhu Aktual (°C)', 1, 0, 'C');
			$pdf->Cell(16, 4, 'Scalding Time', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, '1', 1, 0, 'R');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(15, 4, $item ? $item->scalding_suhu_set_1 : '', 1, 0, 'C');
			$pdf->Cell(17, 4, $item ? $item->scalding_suhu_show_1 : '', 1, 0, 'C');
			$pdf->Cell(17, 4, $item ? $item->scalding_suhu_aktual_1 : '', 1, 0, 'C');
			$pdf->Cell(16, 4, $item ? $item->scalding_time_1 : '', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, '2', 1, 0, 'R');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(15, 4, $item ? $item->scalding_suhu_set_2 : '', 1, 0, 'C');
			$pdf->Cell(17, 4, $item ? $item->scalding_suhu_show_2 : '', 1, 0, 'C');
			$pdf->Cell(17, 4, $item ? $item->scalding_suhu_aktual_2 : '', 1, 0, 'C');
			$pdf->Cell(16, 4, $item ? $item->scalding_time_2 : '', 1, 0, 'C');
		});
		$pdf->Ln();
		$pdf->Cell(50, 4, '3', 1, 0, 'R');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(15, 4, $item ? $item->scalding_suhu_set_3 : '', 1, 0, 'C');
			$pdf->Cell(17, 4, $item ? $item->scalding_suhu_show_3 : '', 1, 0, 'C');
			$pdf->Cell(17, 4, $item ? $item->scalding_suhu_aktual_3 : '', 1, 0, 'C');
			$pdf->Cell(16, 4, $item ? $item->scalding_time_3 : '', 1, 0, 'C');
		});
		$pdf->Ln(5);

		$pdf->SetFont('times', 'B', 8);
		$pdf->SetX(20);
		$pdf->Write(0, 'Pemeriksaan Proses Evisceration');
		$pdf->SetX($pdf->GetX() + 10);
		$pdf->Ln(4);

		$pdf->SetFont('times', '', 6);
		$pdf->Cell(50, 4, 'Pemeriksaan Bumble Foot', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(30, 4, 'Bumble Ringan', 1, 0, 'C');
			$pdf->Cell(35, 4, 'Bumble Berat/Parah', 1, 0, 'C');
		});
		$pdf->Ln();
		$pdf->Cell(50, 4, '', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(30, 4, $item ? $item->bumble_foot_ringan . '  %' : '', 1, 0, 'C');
			$pdf->Cell(35, 4, $item ? $item->bumble_foot_berat . '  %' : '', 1, 0, 'C');
		});
		$pdf->Ln();
		$pdf->Cell(50, 4, 'Pemeriksaan Incomplete Defeathering', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(30, 4, 'Setelah Mesin Plucker', 1, 0, 'C');
			$pdf->Cell(35, 4, 'Setelah Inside Outside Washing', 1, 0, 'C');
		});
		$pdf->Ln();
		$pdf->Cell(50, 4, '', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(30, 4, $item ? $item->incomplete_mesin_plucker . '  %' : '', 1, 0, 'C');
			$pdf->Cell(35, 4, $item ? $item->incomplete_inside_out_washing . '  %' : '', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, 'Persentase Tembolok Berisi Pakan', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(30, 4, 'Persentase', 1, 0, 'C');
			$pdf->Cell(35, 4, 'Berat Rata-rata', 1, 0, 'C');
		});
		$pdf->Ln();
		$pdf->Cell(50, 4, '', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(30, 4, $item ? $item->persentase_tembolok_berisi . '  %' : '', 1, 0, 'C');
			$pdf->Cell(35, 4, $item ? $item->average_tembolok_berisi . '  g' : '', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, 'Persentase Usus Pecah', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(65, 4, $item ? $item->persentase_usus_pecah . '  %' : '', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, 'Persentase Empedu Pecah', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(65, 4, $item ? $item->persentase_empedu_pecah . '  %' : '', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, 'Persentase Incomplete Evisceration', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(65, 4, $item ? $item->persentase_incomplete_evisceration . '  %' : '', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 4, 'Inside Outside Washing', 1, 0, 'L');
		fill_cells($pdf, $defeat_evis_data, 4, function($pdf, $item) {
			$pdf->Cell(65, 4, $item ? $item->inside_outside_washing . ' (Liter/Ekor)' : '', 1, 0, 'C');
		});
		$pdf->Ln();

		$pdf->Cell(50, 8, 'Laporan dibuat oleh', 1, 0, 'L', false, '', 1);

		$jumlah_data = count($defeat_evis_data);

		for ($i = 0; $i < 4; $i++) {
			if ($i < $jumlah_data) {
				$item = $defeat_evis_data[$i];
				$nama_lengkap = $this->pegawai_model->get_nama_lengkap($item->username);
				$pdf->Cell(65, 8, '(   ' . $nama_lengkap . '   )', 1, 0, 'C', false, '', 1);
			} else {
				$pdf->Cell(65, 8, '', 1, 0, 'C', false, '', 1);
			}
		}
		$pdf->Ln();

		$data['defeat_evis']->nama_lengkap_qc = $this->pegawai_model->get_nama_lengkap($data['defeat_evis']->username);
		$data['defeat_evis']->nama_lengkap_spv = $this->pegawai_model->get_nama_lengkap($data['defeat_evis']->nama_spv);
		$data['defeat_evis']->nama_lengkap_produksi = $data['defeat_evis']->nama_produksi;

		$pdf->SetY($pdf->GetY() + 3); 
		$pdf->SetFont('times', '', 8);
		$pdf->Cell(10, 3, 'Catatan : ', 0, 1, 'L');
		foreach ($defeat_evis_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(10, 0, '', 0, 0, 'L'); 
				$pdf->Cell(200, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}

		$y_after_keterangan = $pdf->GetY();
		$status_verifikasi = true;
		foreach ($defeat_evis_data as $item) {
			if ($item->status_spv != '1') {
				$status_verifikasi = false;
				break;
			}
		}

		$pdf->SetFont('times', '', 8);
		$pdf->SetTextColor(0, 0, 0);

		if ($status_verifikasi) {
			$y_verifikasi = $y_after_keterangan;
			$pdf->SetXY(20, $y_verifikasi + 2);
			$pdf->Cell(125, 5, 'Diketahui Oleh,', 0, 0, 'C');

			if ($data['defeat_evis']->status_produksi == 1 && !empty($data['defeat_evis']->nama_produksi)) {
				$update_tanggal_produksi = (new DateTime($data['defeat_evis']->tgl_update_produksi))->format('d-m-Y | H:i');

				$pdf->SetFont('times', 'U', 8);
				$pdf->SetXY(25, $y_verifikasi + 10);
				$pdf->Cell(115, 5, $data['defeat_evis']->nama_produksi, 0, 1, 'C');

				$pdf->SetFont('times', '', 8);
				$pdf->SetXY(25, $y_verifikasi + 15);
				$pdf->Cell(115, 5, 'Foreman/Forelady Produksi', 0, 1, 'C');
			} else {
				$pdf->SetFont('times', '', 8);
				$pdf->SetXY(25, $y_verifikasi + 10);
				$pdf->Cell(115, 5, 'Belum Diverifikasi', 0, 0, 'C');
			}

			$pdf->SetXY(150, $y_verifikasi + 2);
			$pdf->Cell(189, 5, 'Disetujui Oleh,', 0, 0, 'C');
			$update_tanggal = (new DateTime($data['defeat_evis']->tgl_update_spv))->format('d-m-Y | H:i');
			$qr_text = "Diverifikasi secara digital oleh,\n" . $data['defeat_evis']->nama_lengkap_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
			$pdf->write2DBarcode($qr_text, 'QRCODE,L', 237, $y_verifikasi + 7, 15, 15, null, 'N');
			$pdf->SetXY(170, $y_verifikasi + 21);
			$pdf->Cell(149, 5, 'Supervisor QC', 0, 0, 'C');
		} else {
			$pdf->SetTextColor(255, 0, 0); 
			$pdf->SetFont('times', '', 8);
			$pdf->SetXY(200, $y_after_keterangan);
			$pdf->Cell(80, 5, 'Data Belum Diverifikasi', 0, 0, 'C');
		}

		$pdf->setPrintFooter(false);

		$pdf->Output("Defeathering-Evisceration.pdf", 'I');
	}

	public function export_excel() {
		$today = $this->input->post('today'); 
		$plant = $this->session->userdata('plant');

		$start = $this->defeat_evis_model->get_time_start_by_date($today);
		$finish = $this->defeat_evis_model->get_time_finish_by_date($today);
		$atp = $this->defeat_evis_model->get_atp_by_date($today);

		if ($today) {
			$data['defeat_evis'] = $this->defeat_evis_model->get_defeat($today, $plant);

			if (!empty($data['defeat_evis'])) {
				$spreadsheet = new Spreadsheet();
				$sheet = $spreadsheet->getActiveSheet();

				$start = $start ?: 'No Data';
				$finish = $finish ?: 'No Data';
				$atp = $atp ?: 0;

				$sheet->mergeCells('B2:U3');
				$sheet->setCellValue('B2', 'DEFEATHERING')->getStyle('B2')->getFont()->setBold(true)->setSize(14);
				$sheet->mergeCells('C4:E4');
				$sheet->setCellValue('C4', 'Tanggal : '. $today)->getStyle('C4')->getFont()->setBold(true);    
				$sheet->mergeCells('J4:L4');
				$sheet->setCellValue('J4', $start. ' - ' . $finish)->getStyle('J4')->getFont()->setBold(true);
				$sheet->setCellValue('N4', 'ATP = '. $atp)->getStyle('J4')->getFont()->setBold(true);        
				$sheet->getStyle('N4')->getNumberFormat()->setFormatCode('#,##0'); 

				$sheet->mergeCells('B6:B7');
				$sheet->setCellValue('B6', 'NO')->getStyle('B6')->getFont()->setBold(true);
				$sheet->mergeCells('C6:C7');
				$sheet->getStyle('C6:C7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('C6', 'VOLT');
				$sheet->mergeCells('D6:D7');
				$sheet->getStyle('D6:D7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('D6', 'AMPERE');
				$sheet->mergeCells('E6:F6');
				$sheet->getStyle('E6:F6')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('E6', 'BLEEDING TIME');
				$sheet->setCellValue('E7', '1');
				$sheet->setCellValue('F7', '2');
				$sheet->mergeCells('G6:G7');
				$sheet->getStyle('G6:G7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('G6', 'SEET 1');
				$sheet->mergeCells('H6:H7');
				$sheet->getStyle('H6:H7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('H6', 'SEET 2');
				$sheet->mergeCells('I6:I7');
				$sheet->getStyle('I6:I7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('I6', 'AKTUAL 1');
				$sheet->mergeCells('J6:J7');
				$sheet->getStyle('J6:J7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('J6', 'AKTUAL 2');
				$sheet->mergeCells('K6:M6');
				$sheet->getStyle('K6:M6')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('K6', 'SUHU SET');
				$sheet->setCellValue('K7', '1');
				$sheet->setCellValue('L7', '2');
				$sheet->setCellValue('M7', '3');    
				$sheet->mergeCells('N6:P6');
				$sheet->getStyle('N6:P6')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('N6', 'SUHU SHOW');
				$sheet->setCellValue('N7', '1');
				$sheet->setCellValue('O7', '2');
				$sheet->setCellValue('P7', '3');
				$sheet->mergeCells('Q6:S6');
				$sheet->getStyle('Q6:S6')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('Q6', 'SUHU AKTUAL');
				$sheet->setCellValue('Q7', '1');
				$sheet->setCellValue('R7', '2');
				$sheet->setCellValue('S7', '3');        
				$sheet->mergeCells('T6:V6');
				$sheet->getStyle('T6:V6')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('T6', 'SCALDING');
				$sheet->setCellValue('T7', '1');
				$sheet->setCellValue('U7', '2');
				$sheet->setCellValue('V7', '3');

                // Add data
				$row = 8; 
				$counter = 1;
				foreach ($data['defeat_evis'] as $val) {
					$sheet->setCellValue('B' . $row, $counter);
					$sheet->setCellValue('C' . $row, $val->stunning_voltage);
					$sheet->setCellValue('D' . $row, $val->stunning_ampere);
					$sheet->setCellValue('E' . $row, $val->bleeding_time);
					$sheet->setCellValue('F' . $row, '');
					$sheet->setCellValue('G' . $row, $val->speed_defeat_setting);
					$sheet->setCellValue('H' . $row, $val->speed_evis_setting);
					$sheet->setCellValue('I' . $row, $val->speed_defeat_actual);
					$sheet->setCellValue('J' . $row, $val->speed_evis_actual);
					$sheet->setCellValue('K' . $row, $val->scalding_suhu_set_1);
					$sheet->setCellValue('L' . $row, $val->scalding_suhu_set_2);
					$sheet->setCellValue('M' . $row, $val->scalding_suhu_set_3);
					$sheet->setCellValue('N' . $row, $val->scalding_suhu_show_1);
					$sheet->setCellValue('O' . $row, $val->scalding_suhu_show_2);
					$sheet->setCellValue('P' . $row, $val->scalding_suhu_show_3);
					$sheet->setCellValue('Q' . $row, $val->scalding_suhu_aktual_1);
					$sheet->setCellValue('R' . $row, $val->scalding_suhu_aktual_2);
					$sheet->setCellValue('S' . $row, $val->scalding_suhu_aktual_3);
					$sheet->setCellValue('T' . $row, $val->scalding_time_1);
					$sheet->setCellValue('U' . $row, $val->scalding_time_2);
					$sheet->setCellValue('V' . $row, $val->scalding_time_3);
					$row++;
					$counter++;
				}

				$lastRowIndex = $sheet->getHighestRow();
				$sheet->setCellValue('B' . ($lastRowIndex + 1), 'Average');
				$range = 'B' . ($lastRowIndex + 1) . ':V' . ($lastRowIndex + 1);  
				$sheet->getStyle($range)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
				$sheet->getStyle($range)->getFill()->getStartColor()->setRGB('FFFF00');

				for ($col = 3; $col <= 22; $col++) {
					$colLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col);
					$sheet->setCellValue($colLetter . ($lastRowIndex + 1), "=AVERAGE({$colLetter}8:{$colLetter}{$lastRowIndex})");

					$sheet->getStyle($colLetter . ($lastRowIndex + 1))->getNumberFormat()->setFormatCode('#,##0.0');

				}

				$lastColumnIndex = $sheet->getHighestColumn();
				$lastRowIndex = $sheet->getHighestRow();
				$range = 'B6:' . $lastColumnIndex . $lastRowIndex;

				$styleArray = [
					'borders' => [
						'allBorders' => [
							'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
							'color' => ['rgb' => '000000'],
						],
					],
				];

				$sheet->getStyle('B2:V1000')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$sheet->getStyle('B2:V7')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
				$sheet->getStyle('B6:V7')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
				$sheet->getStyle('B6:' . $lastColumnIndex . $lastRowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                // Flush output buffer
				ob_end_clean();

				  // Export
				$filename = 'Defeathering_Evisceration_' . $today . '.xlsx';
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition: attachment; filename="' . $filename . '"');
				$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
				$writer->save('php://output');
				exit; 
			} else {
            // Tanggal ada tapi data tidak ada
				setlocale(LC_TIME, 'id_ID.utf8');
				$tanggal_format = strftime('%d %B %Y', strtotime($today));
				$this->session->set_flashdata('error', 'Data Defeathering - Evisceration untuk tanggal ' . $tanggal_format . ' tidak ditemukan.');
				redirect('defeat-evis/verifikasi');
			}
		} else {
        // Tanggal tidak dipilih
			$this->session->set_flashdata('error', 'Tanggal belum dipilih.');
			redirect('defeat-evis/verifikasi');
		}

	}
}
