<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Defeat_evis_model extends CI_Model {
	
	public function rules_defeat()
	{
		return [
			[
				'field' => 'date',
				'label' => 'Date',
				'rules' => 'required'
			],
			[
				'field' => 'shift',
				'label' => 'Shift',
				'rules' => 'required'
			],
			[
				'field' => 'no_truck',
				'label' => 'Truck Number',
				'rules' => 'required'
			],
			[
				'field' => 'time_start',
				'label' => 'Time Start Process',
				'rules' => 'required'
			],
			[
				'field' => 'time_finish',
				'label' => 'Time Finish Process',
				'rules' => 'required'
			],
			[
				'field' => 'speed_defeat_setting',
				'label' => 'Speed Defeathering (Setting)',
				'rules' => 'numeric'
			],
			[
				'field' => 'speed_defeat_actual',
				'label' => 'Speed Defeathering (Actual)',
				'rules' => 'numeric'
			],
			[
				'field' => 'speed_evis_setting',
				'label' => 'Speed Evisceration (Setting)',
				'rules' => 'numeric'
			],
			[
				'field' => 'speed_evis_actual',
				'label' => 'Speed Evisceration (Actual)',
				'rules' => 'numeric'
			],
			[
				'field' => 'stunning_voltage',
				'label' => 'Stunning Voltage',
				'rules' => 'numeric'
			],
			[
				'field' => 'stunning_ampere',
				'label' => 'Stunning Ampere',
				'rules' => 'numeric'
			],
			[
				'field' => 'kondisi_ayam_stunning_hidup',
				'label' => 'Chicken Alive (Stunning)',
				'rules' => 'integer'
			],
			[
				'field' => 'kondisi_ayam_stunning_mati',
				'label' => 'Chicken Dead (Stunning)',
				'rules' => 'integer'
			],
			[
				'field' => 'bleeding_time',
				'label' => 'Bleeding Time',
				'rules' => ''
			],
			[
				'field' => 'kondisi_ayam_slaugh_hidup',
				'label' => 'Chicken Alive (Slaughter)',
				'rules' => 'integer'
			],
			[
				'field' => 'kondisi_ayam_slaugh_mati',
				'label' => 'Chicken Dead (Slaughter)',
				'rules' => 'integer'
			],
			[
				'field' => 'hasil_sembelih_3_saluran',
				'label' => 'Slaughter Result (3 Channels)',
				'rules' => 'integer'
			],
			[
				'field' => 'hasil_sembelih_tidak_terputus',
				'label' => 'Slaughter Result (Not Cut Off)',
				'rules' => 'integer'
			],
			[
				'field' => 'atp',
				'label' => 'ATP (Non-Cut Chickens)',
				'rules' => 'integer'
			],
			[
				'field' => 'scalding_suhu_set_1',
				'label' => 'Scalding Temp Set 1',
				'rules' => 'numeric'
			],
			[
				'field' => 'scalding_suhu_set_2',
				'label' => 'Scalding Temp Set 2',
				'rules' => 'numeric'
			],
			[
				'field' => 'scalding_suhu_set_3',
				'label' => 'Scalding Temp Set 3',
				'rules' => 'numeric'
			],
			[
				'field' => 'scalding_suhu_show_1',
				'label' => 'Scalding Temp Show 1',
				'rules' => 'numeric'
			],
			[
				'field' => 'scalding_suhu_show_2',
				'label' => 'Scalding Temp Show 2',
				'rules' => 'numeric'
			],
			[
				'field' => 'scalding_suhu_show_3',
				'label' => 'Scalding Temp Show 3',
				'rules' => 'numeric'
			],
			[
				'field' => 'scalding_suhu_aktual_1',
				'label' => 'Scalding Temp Actual 1',
				'rules' => 'numeric'
			],
			[
				'field' => 'scalding_suhu_aktual_2',
				'label' => 'Scalding Temp Actual 2',
				'rules' => 'numeric'
			],
			[
				'field' => 'scalding_suhu_aktual_3',
				'label' => 'Scalding Temp Actual 3',
				'rules' => 'numeric'
			],
			[
				'field' => 'scalding_time_1',
				'label' => 'Scalding Time 1',
				'rules' => 'numeric'
			],
			[
				'field' => 'scalding_time_2',
				'label' => 'Scalding Time 2',
				'rules' => 'numeric'
			],
			[
				'field' => 'scalding_time_3',
				'label' => 'Scalding Time 3',
				'rules' => 'numeric'
			],
		];
	}


	public function insert()
	{
		$uuid = Uuid::uuid4()->toString();
		$produksi = $this->session->userdata('produksi_data');
		$nama_produksi = $produksi['nama_produksi'];

		$plant = $this->session->userdata('plant');
		$username = $this->session->userdata('username');
		$date = $this->input->post('date');
		$shift = $this->input->post('shift');
		$no_truck = $this->input->post('no_truck');
		$time_start = $this->input->post('time_start');
		$time_finish = $this->input->post('time_finish');
		$speed_defeat_setting = $this->input->post('speed_defeat_setting');
		$speed_defeat_actual = $this->input->post('speed_defeat_actual');
		$speed_evis_setting = $this->input->post('speed_evis_setting');
		$speed_evis_actual = $this->input->post('speed_evis_actual');
		$stunning_voltage = $this->input->post('stunning_voltage');
		$stunning_ampere = $this->input->post('stunning_ampere');
		$kondisi_ayam_stunning_hidup = $this->input->post('kondisi_ayam_stunning_hidup');
		$kondisi_ayam_stunning_mati = $this->input->post('kondisi_ayam_stunning_mati');
		$bleeding_time = $this->input->post('bleeding_time');
		$kondisi_ayam_slaugh_hidup = $this->input->post('kondisi_ayam_slaugh_hidup');
		$kondisi_ayam_slaugh_mati = $this->input->post('kondisi_ayam_slaugh_mati');
		$hasil_sembelih_3_saluran = $this->input->post('hasil_sembelih_3_saluran');
		$hasil_sembelih_tidak_terputus = $this->input->post('hasil_sembelih_tidak_terputus');
		$atp = $this->input->post('atp');
		$scalding_suhu_set_1 = $this->input->post('scalding_suhu_set_1');
		$scalding_suhu_set_2 = $this->input->post('scalding_suhu_set_2');
		$scalding_suhu_set_3 = $this->input->post('scalding_suhu_set_3');
		$scalding_suhu_show_1 = $this->input->post('scalding_suhu_show_1');
		$scalding_suhu_show_2 = $this->input->post('scalding_suhu_show_2');
		$scalding_suhu_show_3 = $this->input->post('scalding_suhu_show_3');
		$scalding_suhu_aktual_1 = $this->input->post('scalding_suhu_aktual_1');
		$scalding_suhu_aktual_2 = $this->input->post('scalding_suhu_aktual_2');
		$scalding_suhu_aktual_3 = $this->input->post('scalding_suhu_aktual_3');
		$scalding_time_1 = $this->input->post('scalding_time_1');
		$scalding_time_2 = $this->input->post('scalding_time_2');
		$scalding_time_3 = $this->input->post('scalding_time_3');
		$status_produksi = "1";
		$status_spv = "0";

		$data = array( 
			'uuid' => $uuid,
			'username' => $username,
			'plant' => $plant,
			'date' => $date,
			'shift' => $shift,
			'no_truck' => $no_truck,
			'time_start' => $time_start,
			'time_finish' => $time_finish,
			'speed_defeat_setting' => $speed_defeat_setting,
			'speed_defeat_actual' => $speed_defeat_actual,
			'speed_evis_setting' => $speed_evis_setting,
			'speed_evis_actual' => $speed_evis_actual,
			'stunning_voltage' => $stunning_voltage,
			'stunning_ampere' => $stunning_ampere,
			'kondisi_ayam_stunning_hidup' => $kondisi_ayam_stunning_hidup,
			'kondisi_ayam_stunning_mati' => $kondisi_ayam_stunning_mati,
			'bleeding_time' => $bleeding_time,
			'kondisi_ayam_slaugh_hidup' => $kondisi_ayam_slaugh_hidup,
			'kondisi_ayam_slaugh_mati' => $kondisi_ayam_slaugh_mati,
			'hasil_sembelih_3_saluran' => $hasil_sembelih_3_saluran,
			'hasil_sembelih_tidak_terputus' => $hasil_sembelih_tidak_terputus,
			'atp' => $atp,
			'scalding_suhu_set_1' => $scalding_suhu_set_1,
			'scalding_suhu_set_2' => $scalding_suhu_set_2,
			'scalding_suhu_set_3' => $scalding_suhu_set_3,
			'scalding_suhu_show_1' => $scalding_suhu_show_1,
			'scalding_suhu_show_2' => $scalding_suhu_show_2,
			'scalding_suhu_show_3' => $scalding_suhu_show_3,
			'scalding_suhu_aktual_1' => $scalding_suhu_aktual_1,
			'scalding_suhu_aktual_2' => $scalding_suhu_aktual_2,
			'scalding_suhu_aktual_3' => $scalding_suhu_aktual_3,
			'scalding_time_1' => $scalding_time_1,
			'scalding_time_2' => $scalding_time_2,
			'scalding_time_3' => $scalding_time_3,
			'nama_produksi' => $nama_produksi,
			'status_produksi' => $status_produksi,
			'status_spv' => $status_spv
		);

		$this->db->insert('defeat_evis', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function update($uuid)
	{
		$username = $this->session->userdata('username');
		$date = $this->input->post('date');
		$shift = $this->input->post('shift');
		$no_truck = $this->input->post('no_truck');
		$time_start = $this->input->post('time_start');
		$time_finish = $this->input->post('time_finish');
		$speed_defeat_setting = $this->input->post('speed_defeat_setting');
		$speed_defeat_actual = $this->input->post('speed_defeat_actual');
		$speed_evis_setting = $this->input->post('speed_evis_setting');
		$speed_evis_actual = $this->input->post('speed_evis_actual');
		$stunning_voltage = $this->input->post('stunning_voltage');
		$stunning_ampere = $this->input->post('stunning_ampere');
		$kondisi_ayam_stunning_hidup = $this->input->post('kondisi_ayam_stunning_hidup');
		$kondisi_ayam_stunning_mati = $this->input->post('kondisi_ayam_stunning_mati');
		$bleeding_time = $this->input->post('bleeding_time');
		$kondisi_ayam_slaugh_hidup = $this->input->post('kondisi_ayam_slaugh_hidup');
		$kondisi_ayam_slaugh_mati = $this->input->post('kondisi_ayam_slaugh_mati');
		$hasil_sembelih_3_saluran = $this->input->post('hasil_sembelih_3_saluran');
		$hasil_sembelih_tidak_terputus = $this->input->post('hasil_sembelih_tidak_terputus');
		$atp = $this->input->post('atp');
		$scalding_suhu_set_1 = $this->input->post('scalding_suhu_set_1');
		$scalding_suhu_set_2 = $this->input->post('scalding_suhu_set_2');
		$scalding_suhu_set_3 = $this->input->post('scalding_suhu_set_3');
		$scalding_suhu_show_1 = $this->input->post('scalding_suhu_show_1');
		$scalding_suhu_show_2 = $this->input->post('scalding_suhu_show_2');
		$scalding_suhu_show_3 = $this->input->post('scalding_suhu_show_3');
		$scalding_suhu_aktual_1 = $this->input->post('scalding_suhu_aktual_1');
		$scalding_suhu_aktual_2 = $this->input->post('scalding_suhu_aktual_2');
		$scalding_suhu_aktual_3 = $this->input->post('scalding_suhu_aktual_3');
		$scalding_time_1 = $this->input->post('scalding_time_1');
		$scalding_time_2 = $this->input->post('scalding_time_2');
		$scalding_time_3 = $this->input->post('scalding_time_3');

		$data = array(
			'username' => $username,
			'date' => $date,
			'shift' => $shift,
			'no_truck' => $no_truck,
			'time_start' => $time_start,
			'time_finish' => $time_finish,
			'speed_defeat_setting' => $speed_defeat_setting,
			'speed_defeat_actual' => $speed_defeat_actual,
			'speed_evis_setting' => $speed_evis_setting,
			'speed_evis_actual' => $speed_evis_actual,
			'stunning_voltage' => $stunning_voltage,
			'stunning_ampere' => $stunning_ampere,
			'kondisi_ayam_stunning_hidup' => $kondisi_ayam_stunning_hidup,
			'kondisi_ayam_stunning_mati' => $kondisi_ayam_stunning_mati,
			'bleeding_time' => $bleeding_time,
			'kondisi_ayam_slaugh_hidup' => $kondisi_ayam_slaugh_hidup,
			'kondisi_ayam_slaugh_mati' => $kondisi_ayam_slaugh_mati,
			'hasil_sembelih_3_saluran' => $hasil_sembelih_3_saluran,
			'hasil_sembelih_tidak_terputus' => $hasil_sembelih_tidak_terputus,
			'atp' => $atp,
			'scalding_suhu_set_1' => $scalding_suhu_set_1,
			'scalding_suhu_set_2' => $scalding_suhu_set_2,
			'scalding_suhu_set_3' => $scalding_suhu_set_3,
			'scalding_suhu_show_1' => $scalding_suhu_show_1,
			'scalding_suhu_show_2' => $scalding_suhu_show_2,
			'scalding_suhu_show_3' => $scalding_suhu_show_3,
			'scalding_suhu_aktual_1' => $scalding_suhu_aktual_1,
			'scalding_suhu_aktual_2' => $scalding_suhu_aktual_2,
			'scalding_suhu_aktual_3' => $scalding_suhu_aktual_3,
			'scalding_time_1' => $scalding_time_1,
			'scalding_time_2' => $scalding_time_2,
			'scalding_time_3' => $scalding_time_3,

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('defeat_evis', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}


	public function rules_evis()
	{
		return[
			[
				'field' => 'bumble_foot_ringan',
				'label' => 'Bumble Foot',
				'rules' => 'required'
			],
			[
				'field' => 'bumble_foot_berat',
				'label' => 'Bumble Foot',
				'rules' => 'required'
			], 
			[
				'field' => 'incomplete_mesin_plucker',
				'label' => 'Incomplete Defeathering'
			],
			[
				'field' => 'incomplete_inside_out_washing',
				'label' => 'Incomplete Defeathering'
			],	
			[
				'field' => 'persentase_tembolok_berisi',
				'label' => 'Gizzard Presentation'
			],	
			[
				'field' => 'average_tembolok_berisi',
				'label' => 'Gizzard Average'
			],	
			[
				'field' => 'persentase_usus_pecah',
				'label' => 'Presentation of intestine'
			],	
			[
				'field' => 'persentase_empedu_pecah',
				'label' => 'Presentation of bile'
			],	
			[
				'field' => 'persentase_incomplete_evisceration',
				'label' => 'Presentation Incomplete Evisceration'
			],	
			[
				'field' => 'inside_out_washing',
				'label' => 'Inside Out Washing'
			]
		];
	}

	public function evis($uuid)
	{
		$username = $this->session->userdata('username');
		$produksi = $this->session->userdata('produksi_data');
		$nama_produksi = $produksi['nama_produksi'];
		$bumble_foot_ringan = $this->input->post('bumble_foot_ringan');
		$bumble_foot_berat = $this->input->post('bumble_foot_berat');
		$incomplete_mesin_plucker = $this->input->post('incomplete_mesin_plucker');
		$incomplete_inside_out_washing = $this->input->post('incomplete_inside_out_washing');
		$persentase_tembolok_berisi = $this->input->post('persentase_tembolok_berisi');
		$average_tembolok_berisi = $this->input->post('average_tembolok_berisi');
		$persentase_usus_pecah = $this->input->post('persentase_usus_pecah');
		$persentase_empedu_pecah = $this->input->post('persentase_empedu_pecah');
		$persentase_incomplete_evisceration = $this->input->post('persentase_incomplete_evisceration');
		$inside_outside_washing = $this->input->post('inside_outside_washing');
		// $nama_produksi = $this->input->post('nama_produksi');

		$data = array(
			'username' => $username,
			'bumble_foot_berat' => $bumble_foot_berat,
			'bumble_foot_ringan' => $bumble_foot_ringan,
			'incomplete_mesin_plucker' => $incomplete_mesin_plucker,
			'incomplete_inside_out_washing' => $incomplete_inside_out_washing,
			'persentase_tembolok_berisi' => $persentase_tembolok_berisi,
			'average_tembolok_berisi' => $average_tembolok_berisi,
			'persentase_usus_pecah' => $persentase_usus_pecah,
			'persentase_empedu_pecah' => $persentase_empedu_pecah,
			'persentase_incomplete_evisceration' => $persentase_incomplete_evisceration,
			'inside_outside_washing' => $inside_outside_washing,
			'nama_produksi' => $nama_produksi,

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('defeat_evis', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function rules_verifikasi()
	{
		return[
			[
				'field' => 'status_spv',
				'label' => 'Date',
				'rules' => 'required'
			],
			[
				'field' => 'catatan_spv',
				'label' => 'Notes'
			]
			
		];
	}

	public function verifikasi_update($uuid)
	{

		$nama_spv = $this->session->userdata('username');
		$status_spv = $this->input->post('status_spv');
		$catatan_spv = $this->input->post('catatan_spv');

		$data = array(
			'nama_spv' => $nama_spv,
			'status_spv' => $status_spv,
			'catatan_spv' => $catatan_spv,
			'tgl_update_spv' => date("Y-m-d H:i:s")
		);

		$this->db->update('defeat_evis', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function rules_diketahui()
	{
		return[
			[
				'field' => 'status_produksi',
				'label' => 'Status',
				'rules' => 'required'
			],
			[
				'field' => 'catatan_produksi',
				'label' => 'Notes'
			]
			
		];
	}

	public function diketahui_update($uuid)
	{

		$nama_produksi = $this->session->userdata('username');
		$status_produksi = $this->input->post('status_produksi');
		$catatan_produksi = $this->input->post('catatan_produksi');

		$data = array(
			'nama_produksi' => $nama_produksi,
			'status_produksi' => $status_produksi,
			'catatan_produksi' => $catatan_produksi,
			'tgl_update_produksi' => date("Y-m-d H:i:s")
		);

		$this->db->update('defeat_evis', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}


	public function get_all()
	{
		$this->db->order_by('created_at', 'DESC');
		$data = $this->db->get('defeat_evis')->result();
		return $data;
	}

	public function get_by_uuid($uuid)
	{ 
		$data = $this->db->get_where('defeat_evis', array('uuid' => $uuid))->row();
		return $data;
	}

	public function get_by_uuid_defeat_evis($uuid_array)
	{
		$this->db->where_in('uuid', $uuid_array);
		$query = $this->db->get('defeat_evis');  
		return $query->result();
	}

	public function get_defeat($today, $plant){
		$this->db->select('*');
		$this->db->from('defeat_evis');
		$this->db->like('date', $today, 'after'); 
		$this->db->where('plant', $plant);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_time_start_by_date($today) {
		$formatted_date = date('Y-m-d', strtotime($today)); 
		$this->db->where('date', $formatted_date);
		$this->db->order_by('time_start', 'ASC'); 
		$query = $this->db->get('defeat_evis', 1); 
		$result = $query->row_array(); 
		return isset($result['time_start']) ? $result['time_start'] : null; 
	}

	public function get_time_finish_by_date($today) {
		$formatted_date = date('Y-m-d', strtotime($today)); 
		$this->db->where('date', $formatted_date);
		$this->db->order_by('time_finish', 'DESC'); 
		$query = $this->db->get('defeat_evis', 1); 
		$result = $query->row_array();
		return isset($result['time_finish']) ? $result['time_finish'] : null; 
	}

	public function get_atp_by_date($today) {
		$formatted_date = date('Y-m-d', strtotime($today)); 
		$this->db->where('date', $formatted_date);
		$this->db->select_sum('atp'); 
		$query = $this->db->get('defeat_evis');
		$result = $query->row_array(); 
		return isset($result['atp']) ? $result['atp'] : 0;
	}

	public function get_data_by_plant()
	{
		$this->db->order_by('created_at', 'DESC');
		$plant = $this->session->userdata('plant');
		return $this->db->get_where('defeat_evis', ['plant' => $plant])->result();
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('defeat_evis');
	}

	public function get_by_uuid_defeat($uuid_array)
	{
		if (empty($uuid_array)) {
			return false;
		}

		log_message('debug', 'Array UUID yang diterima: ' . print_r($uuid_array, true));

		$this->db->where_in('uuid', $uuid_array);
		$query = $this->db->get('defeat_evis');

		log_message('debug', 'Query yang dijalankan: ' . $this->db->last_query());

		return $query->num_rows() > 0 ? $query->result() : false;
	}

	public function get_by_uuid_defeat_verif($uuid_array, $single = true)
	{
		if (empty($uuid_array)) {
			return false;
		}
		$this->db->select('nama_spv, tgl_update_spv, date, shift, status_spv, username, nama_produksi, tgl_update_produksi');
		$this->db->where_in('uuid', $uuid_array);
		$this->db->order_by('tgl_update_spv', 'DESC');

		$query = $this->db->get('defeat_evis');

		if ($query->num_rows() > 0) {
			return $single ? $query->row() : $query->result();
		}

		return false;
	}

}