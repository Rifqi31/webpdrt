<?php
class Pdrt_model extends CI_Model {
  // permo_pdrt
  public $id, $nama_pemohon, $desa_kel;
  public $kecamatan, $fungsi_bangunan, $jenis_kegiatan;
  public $luas_tanah, $no_register, $tanggal;
  public $ilok_ppt,$keterangan;

  public $labels = [];

  var $table_permo = 'permo_pdrt';
  var $table_kendali = 'buku_kendali_pdrt';

  public function __construct(){
    parent::__construct();
    //loda database
    $this->load->database();
  }

  // Read All Data
  public function read(){
    $query = $this->db->get($this->table_permo);
    return $query->result();
  }
	
  public function read_kendali(){
	  $query = $this->db->get($this->table_kendali);
	  return $query->result();
  }

  public function insert_permo($datapermohonan) {
    $this->db->insert('permo_pdrt',$datapermohonan);

  }

  public function insert_kendali($datakendali) {
    $this->db->insert('buku_kendali_pdrt', $datakendali);
  }

  public function dapat_data_permo($where,$table) {
    return $query = $this->db->get_where($this->table_permo,$where)->result();
  }

  public function update_data_permo($where,$datapermo,$table){
    $this->db->where($where);
    $this->db->update($this->table_permo,$datapermo);
  }

  public function update_data_kendali($where,$datakendali,$table) {
    $this->db->where($where);
    $this->db->update($this->table_kendali,$datakendali);
  }



  public function delete(){
    $this->db->where('id',$this->id);
    $this->db->delete($this->table_permo);
  }

  // search function --permo
  public function searchanything($anything) {
    $this->db->like('nama_pemohon', $anything);
	  $this->db->or_like('kecamatan', $anything);
    $this->db->or_like('desa_kel', $anything);
    $this->db->or_like('fungsi_bangunan', $anything);
    $this->db->or_like('jenis_kegiatan', $anything);
    $this->db->or_like('luas_tanah', $anything);
    $this->db->or_like('no_register', $anything);
    $this->db->or_like('tanggal', $anything);
    $this->db->or_like('ilok_ppt', $anything);
    $this->db->or_like('keterangan', $anything);
    $query = $this->db->get($this->table_permo);
    return $query->result();
  }

  public function filter_data($filter_kecamatan,$filter_desa,$filter_bangunan) {
    $this->db->where('kecamatan',$filter_kecamatan);
    $this->db->where('desa_kel',$filter_desa);
    $this->db->where('fungsi_bangunan',$filter_bangunan);
    $query = $this->db->get($this->table_permo);
    return $query->result();
  }


  public function get_daterange($tgl_awal,$tgl_akhir) {
    $this->db->where('tanggal >=', $tgl_awal);
    $this->db->where('tanggal <=', $tgl_akhir);
    $query = $this->db->get($this->table_permo);
    return $query->result();

  }


  // search function --kendali
  public function searchalldata_kendali($alldata_kendali) {
    $this->db->like('nama_pemohon', $alldata_kendali);
    $this->db->or_like('kecamatan', $alldata_kendali);
    $this->db->or_like('desa_kel', $alldata_kendali);
    $this->db->or_like('jenis_kegiatan', $alldata_kendali);
    $this->db->or_like('no_register', $alldata_kendali);
    $this->db->or_like('tanggal', $alldata_kendali);
    $query = $this->db->get($this->table_kendali);
    return $query->result();
  }


  public function filter_datakendali($filter_data_kecamatan, $filter_data_desakel) {
    $this->db->where('kecamatan',$filter_data_kecamatan);
    $this->db->where('desa_kel',$filter_data_desakel);
    $query = $this->db->get($this->table_kendali);
    return $query->result();
  }


  public function getkendali_datarange($tgl_awal,$tgl_akhir) {
    $this->db->where('tanggal >=', $tgl_awal);
    $this->db->where('tanggal <=', $tgl_akhir);
    $query = $this->db->get('buku_kendali_pdrt');
    return $query->result();

  }

  public function pemohon_exists($key) {
    $this->db->where('nama_pemohon', $key);
    $query = $this->db->get($this->table_permo);
    if ($query->num_rows() > 0) {
      return true;
    } else{
      return false;
    }
  }


  public function data($number,$offset) {
    return $query = $this->db->get($this->table_permo,$number,$offset)->result();
  }

  public function jumlah_data() {
    return $this->db->get($this->table_permo)->num_rows();
  }
	
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


  //public function check_duplicate_name(){

  //}

}
