<?php
class Kendali_pdrt_model extends CI_Model {
  
  public $id_kendali, $nama_pemohon, $kecamatan, $desa_kel, $jenis_kegiatan;
  public $fungsi_bangunan, $luas_tanah, $ilok_ppt;
  public $no_register, $keterangan_register;
  public $peninjauan_lapangan, $keterangan_lapangan;
  public $perhitungan, $keterangan_perhitungan;

  public $draft_ketik, $keterangan_ketik_pdrt;
  public $draft_periksa, $keterangan_periksa_pdrt;

  public $denda_ketik, $keterangan_ketik_denda;
  public $denda_periksa, $keterangan_periksa_denda;

  public $paraf_kasi, $paraf_kabid, $keterangan_kabid_kasie;

  public $paraf_sekre, $paraf_dinas;
  public $tanggal;
 
  public $labels = [];

  var $table_permo = 'permo_pdrt';
  var $table_kendali = 'buku_kendali_pdrt';


  public function __construct() {
    parent::__construct();
    // load database
    $this->load->database();
  }

  public function read() {
    $query = $this->db->get('buku_kendali_pdrt');
    return $query->result();
  }

  public function dapat_data_kendali($where,$table) {
    return $query = $this->db->get_where($this->table_kendali,$where)->result();
  }


 public function update_data_kendali($where,$datakendali,$table) {
    $this->db->where($where);
    $this->db->update($this->table_kendali,$datakendali);
  }


  public function delete(){
    $this->db->where('id_kendali',$this->id_kendali);
    $this->db->delete($this->table_kendali);
  }

  // search function --kendali
  public function searchanything($anything) {
    $this->db->like('nama_pemohon', $anything);
    $this->db->or_like('kecamatan', $anything);
    $this->db->or_like('desa_kel', $anything);
    $this->db->or_like('jenis_kegiatan', $anything);
    $this->db->or_like('no_register', $anything);
    $this->db->or_like('no_pdrt', $anything);
    $this->db->or_like('tanggal', $anything);
    $query = $this->db->get($this->table_kendali);
    return $query->result();
  }


  public function filter_data($filter_kecamatan,$filter_desa) {
    $this->db->where('kecamatan',$filter_kecamatan);
    $this->db->where('desa_kel',$filter_desa);
    $query = $this->db->get($this->table_kendali);
    return $query->result();
  }


  public function get_daterange($tgl_awal,$tgl_akhir) {
    $this->db->where('tanggal >=', $tgl_awal);
    $this->db->where('tanggal <=', $tgl_akhir);
    $query = $this->db->get('buku_kendali_pdrt');
    return $query->result();

  }


  // search function --permo
  public function searchalldata_permo($alldata_permo) {
    $this->db->like('nama_pemohon', $alldata_permo);
    $this->db->or_like('kecamatan', $alldata_permo);
    $this->db->or_like('desa_kel', $alldata_permo);
    $this->db->or_like('fungsi_bangunan', $alldata_permo);
    $this->db->or_like('jenis_kegiatan', $alldata_permo);
    $this->db->or_like('luas_tanah', $alldata_permo);
    $this->db->or_like('no_register', $alldata_permo);
    $this->db->or_like('tanggal', $alldata_permo);
    $this->db->or_like('ilok_ppt', $alldata_permo);
    $this->db->or_like('keterangan', $alldata_permo);
    $query = $this->db->get($this->table_permo);
    return $query->result();
  }

  public function filter_datapermo($filter_data_kecamatan,$filter_data_desa,$filter_data_bangunan) {
    $this->db->where('kecamatan',$filter_data_kecamatan);
    $this->db->where('desa_kel',$filter_data_desa);
    $this->db->where('fungsi_bangunan',$filter_data_bangunan);
    $query = $this->db->get($this->table_permo);
    return $query->result();
  }


  public function getpermo_daterange($tgl_awal,$tgl_akhir) {
    $this->db->where('tanggal >=', $tgl_awal);
    $this->db->where('tanggal <=', $tgl_akhir);
    $query = $this->db->get($this->table_permo);
    return $query->result();

  }

   public function data($number,$offset) {
    return $query = $this->db->get('buku_kendali_pdrt',$number,$offset)->result();
  }

  public function jumlah_data() {
    return $this->db->get('buku_kendali_pdrt')->num_rows();
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
 
}
