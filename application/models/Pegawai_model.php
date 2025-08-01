<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Pegawai_model extends CI_Model {

	private $_table = 'pegawai';

	public function rules()
	{
		return[
			[
				'field' => 'nama',
				'label' => 'Name',
				'rules' => 'required'
			],
			[
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'valid_email',
				'errors' => array('valid_email' => 'Masukkan alamat email yang valid.')
			],
			[
				'field' => 'departemen',
				'label' => 'Department',
				'rules' => 'required'
			],
			[
				'field' => 'plant',
				'label' => 'Plant',
				'rules' => 'required'
			],
			[
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required|is_unique[pegawai.username]'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|min_length[8]'
			],
			[
				'field' => 'tipe_user',
				'label' => 'User Type',
				'rules' => 'required'
			]
		];
	}


	public function insert()
	{
		$uuid = Uuid::uuid4()->toString();

		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$departemen = $this->input->post('departemen');
		$plant = $this->input->post('plant');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = password_hash($password, PASSWORD_BCRYPT);
		$tipe_user = $this->input->post('tipe_user');

		$data = array(
			'uuid' => $uuid,
			'nama' => $nama,
			'email' => $email,
			'username' => $username,
			'password' => $password,
			'departemen' => $departemen,
			'plant' => $plant,
			'tipe_user' => $tipe_user
		);

		$this->db->insert('pegawai', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function update($uuid)
	{
		$updater = $this->session->userdata('username');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$departemen = $this->input->post('departemen');
		$plant = $this->input->post('plant');
		$tipe_user = $this->input->post('tipe_user');

		$data = array(
			'updater' => $updater,
			'nama' => $nama,
			'email' => $email,
			'departemen' => $departemen,
			'plant' => $plant,
			'tipe_user' => $tipe_user,
			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('pegawai', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function updateuser($uuid)
	{

		$username = $this->input->post('username');

		$data = array(
			'username' => $username,
			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('pegawai', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function updatepass($uuid)
	{

		$password = $this->input->post('password');
		$password = password_hash($password, PASSWORD_BCRYPT);

		$data = array(
			'password' => $password,
			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('pegawai', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{

		$this->db->order_by('a.created_at', 'DESC');
		$this->db->select('a.*, b.departemen, c.plant');
		$this->db->from('pegawai a');
		$this->db->join('departemen b', 'a.departemen=b.uuid','left');
		$this->db->join('plant c', 'a.plant=c.uuid','left');
		$data = $this->db->get()->result();

		return $data;
	}

	public function get_data_by_plant()
	{
		$plant = $this->session->userdata('plant'); 

		$this->db->order_by('a.created_at', 'DESC');
		$this->db->select('a.*, b.departemen, c.plant as nama_plant');
		$this->db->from('pegawai a');
		$this->db->join('departemen b', 'a.departemen = b.uuid', 'left');
		$this->db->join('plant c', 'a.plant = c.uuid', 'left');
		$this->db->where('a.plant', $plant);

		return $this->db->get()->result();
	}

	public function get_by_uuid($uuid)
	{
		$data = $this->db->get_where('pegawai', array('uuid' => $uuid))->row();
		return $data;
	}

	public function get_foreman()
	{
		$data = $this->db->get_where('pegawai', array('tipe_user' => 3))->result();
		return $data;
	}

	public function get_manager()
	{
		$data = $this->db->get_where('pegawai', array('tipe_user' => 1))->result();
		// $this->db->get_where('pegawai', array('tipe_user' => 2))->result();
		// $data = $this->db->get()->result();
		return $data;
	}

	public function get_nama_lengkap($username) {
		$this->db->select('nama');
		$this->db->from('pegawai'); 
		$this->db->where('username', $username);
		$query = $this->db->get();
		$result = $query->row();
		return $result ? $result->nama : $username;
	}

	public function getByUUID($uuid) {
		return $this->db->get_where($this->_table, ['uuid' => $uuid])->row();
	}

	public function updateprofil($uuid, $data) {
		return $this->db->update($this->_table, $data, ['uuid' => $uuid]);
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('pegawai');
	}

	public function get_plant_uuid_by_user($uuid)
	{
		$this->db->select('plant');
		$this->db->from('pegawai');
		$this->db->where('uuid', $uuid);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row()->plant;
		}
		return null;
	}

	public function get_pegawai_produksi_by_plant($plant)
	{
		return $this->db->get_where('pegawai', [
			'plant' => $plant,
			'tipe_user' => 3
		])->result();
	}

}