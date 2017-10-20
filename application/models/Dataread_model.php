<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dataread_model extends CI_Model {

	var $table_permo = 'permo_pdrt';
	var $table_kendali = 'buku_kendali_pdrt';

	public function __construct() {
		parent:: __construct();

		$this->load->database();
	}

	public function read_data_permo() {
		$query = $this->db->get($this->table_permo, 4);
		return $query->result();
	}

	public function read_data_kendali() {
		$query = $this->db->get($this->table_kendali, 4);
		return $query->result();
	}

	// feature for search, filter and data date range
	// data permo

	public function search_data_permo($data_search) {
		$this->db->like('nama_pemohon', $data_search);
		$this->db->or_like('kecamatan', $data_search);
		$this->db->or_like('desa_kel', $data_search);
		$this->db->or_like('fungsi_bangunan', $data_search);
		$this->db->or_like('jenis_kegiatan', $data_search);
		$this->db->or_like('luas_tanah', $data_search);
		$this->db->or_like('no_register', $data_search);
		$this->db->or_like('tanggal', $data_search);
		$this->db->or_like('ilok_ppt', $data_search);
		$this->db->or_like('keterangan', $data_search);
		$query = $this->db->get($this->table_permo);
		return $query->result();
	}

	public function filter_data_permo($filter_kecamatan, $filter_desa_kel, $filter_fungsi_bangunan) {
		$this->db->where('kecamatan', $filter_kecamatan);
		$this->db->where('desa_kel', $filter_desa_kel);
		$this->db->where('fungsi_bangunan', $filter_fungsi_bangunan);
		$query = $this->db->get($this->table_permo);
		return $query->result();
	}

	public function get_date_range_permo($first_date, $last_date) {
		$this->db->where('tanggal >=', $first_date);
		$this->db->where('tanggal <=', $last_date);
		$query = $this->db->get($this->table_permo);
		return $query->result();
	}


	// data kendali

	public function search_data_kendali($data_search) {
		$this->db->like('nama_pemohon', $data_search);
		$this->db->or_like('kecamatan', $data_search);
		$this->db->or_like('desa_kel', $data_search);
		$this->db->or_like('jenis_kegiatan', $data_search);
		$this->db->or_like('no_register', $data_search);
		$this->db->or_like('tanggal', $data_search);
		$query = $this->db->get($this->table_kendali);
		return $query->result();
	}

	public function filter_data_kendali($filter_kecamatan, $filter_desa_kel) {
		$this->db->where('kecamatan', $filter_kecamatan);
		$this->db->where('desa_kel', $filter_desa_kel);
		$query = $this->db->get($this->table_kendali);
		return $query->result();
	}

	public function get_date_range_kendali($first_date, $last_date) {
		$this->db->where('tanggal >=', $first_date);
		$this->db->where('tanggal <=', $last_date);
		$query = $this->db->get($this->table_kendali);
		return $query->result();
	}


	// for pagination

	// for show only all data but same function, this for dodge the problem :/
  
	public function datapermo($number, $offset){
	   return $query = $this->db->get($this->table_permo, $number, $offset)->result();
	}
	  
	public function datakendali($number, $offset){
	   return $query = $this->db->get($this->table_kendali, $number, $offset)->result();
	}
	  
	public function jumlah_data_permo(){
	   return $this->db->get($this->table_permo)->num_rows();
	}
	  
	public function jumlah_data_kendali(){
	   return $this->db->get($this->table_kendali)->num_rows();
	}


}