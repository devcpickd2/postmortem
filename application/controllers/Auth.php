<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			redirect('home');
		} else {
			redirect('auth/login');
		}
	}

	public function login()
	{
		if ($this->auth_model->current_user()) {
			redirect('home');
		}

		$rules = $this->auth_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			return $this->load->view('auth/login');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($this->auth_model->login($username, $password)) {
			// Set session modal ditampilkan
			$this->session->unset_userdata('produksi_data'); // pastikan tidak ada data produksi
			$this->session->set_userdata('show_produksi_modal', true);

			redirect('home');
		} else {
			$this->session->set_flashdata('error_msg', 'Login gagal. Cek username dan password!');
		}

		$this->load->view('auth/login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}
