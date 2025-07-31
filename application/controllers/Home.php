<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->model('pegawai_model');
		$this->load->model('post_mortem_model');

		if (!$this->auth_model->current_user()) {
			redirect('login');
		}
	}

	public function index()
	{
		$pegawai = $this->auth_model->current_user();
		$plant = $this->session->userdata('plant');

		// Cek apakah modal perlu ditampilkan
		$show_modal = false;
		if (!$this->session->userdata('produksi_data') && $this->session->userdata('show_produksi_modal')) {
			$show_modal = true;
		}

		// Ambil data dashboard
		$data_today = $this->post_mortem_model->get_kedatangan_today($plant);
		$count_today = count($data_today);
		$latest_today = !empty($data_today) ? end($data_today) : null;

		$data = array(
			'nama_pegawai'     => $pegawai ? $pegawai->nama : "Tamu",
			'active_nav'       => 'home',
			'show_modal'       => $show_modal,
			'pegawai_produksi' => $this->pegawai_model->get_pegawai_produksi_by_plant($plant),
			'data_today'       => $data_today,
			'count_today'      => $count_today,
			'latest_today'     => $latest_today
		);

		$this->load->view('partials/head', $data);
		$this->load->view('home/home', $data);
		$this->load->view('partials/footer');
	}

	public function set_produksi_data()
	{
		// Simpan data dari modal ke session
		$this->session->set_userdata('produksi_data', [
			'tanggal'       => $this->input->post('tanggal'),
			'shift'         => $this->input->post('shift'),
			'nama_produksi' => $this->input->post('nama_produksi')
		]);

		// Setelah isi, jangan tampilkan lagi
		$this->session->unset_userdata('show_produksi_modal');
		redirect('home');
	}

	public function reset_produksi_data()
	{
		// Reset data produksi dan munculkan modal lagi
		$this->session->unset_userdata('produksi_data');
		$this->session->set_userdata('show_produksi_modal', true);
		redirect('home');
	}
}
