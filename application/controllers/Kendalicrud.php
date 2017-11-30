<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kendalicrud extends CI_Controller {
  public $model = NULL;

  public function __construct() {
    parent::__construct();
    // load database
    $this->load->database();
    // Initialize Model
    $this->model = $this->Kendali_pdrt_model;

   if ($this->session->userdata('username') == "") {
      redirect(base_url("login"));
    }
  }

  public function index() {
    // pagination
    $jumlah_data = $this->model->jumlah_data();
    $config['base_url'] = base_url().'kendalicrud/index/';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 10;

      //config for bootstrap pagination class integration
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';

    $from = $this->uri->segment(3);
    $this->pagination->initialize($config);
    $data['rows'] = $this->model->data($config['per_page'],$from);
    $this->load->view('kendali_view/read_kendali_pdrt_view',$data);
  }

//---CRUD METHOD---//

  public function edit_data($id) {

    $where = array('id' => $id);
    $data['rows']= $this->model->dapat_data_kendali($where,'buku_kendali_pdrt');
    $this->load->view('kendali_view/update_kendali_pdrt_view',$data);
  }
 
  public function update() {

    $id = $this->input->post('id');
    $nama_pemohon = $this->input->post('nama_pemohon');
    $kecamatan = $this->input->post('kecamatan');
    $desa_kel = $this->input->post('desa_kel');
    $jenis_kegiatan = $this->input->post('jenis_kegiatan');

    $no_register = $this->input->post('no_register');
    $keterangan_register = $this->input->post('keterangan_register');

    $peninjauan_lapangan = $this->input->post('peninjauan_lapangan');
    $keterangan_lapangan = $this->input->post('keterangan_lapangan');
        
    $perhitungan = $this->input->post('perhitungan');
    $keterangan_perhitungan = $this->input->post('keterangan_perhitungan');
     
    $draft_ketik = $this->input->post('draft_ketik');
    $keterangan_ketik_pdrt = $this->input->post('keterangan_ketik_pdrt');
 
    $draft_periksa = $this->input->post('draft_periksa');
    $keterangan_periksa_pdrt = $this->input->post('keterangan_periksa_pdrt');
   
    $denda_ketik = $this->input->post('denda_ketik');
    $keterangan_ketik_denda = $this->input->post('keterangan_ketik_denda');
   
    $denda_periksa = $this->input->post('denda_periksa');
    $keterangan_periksa_denda = $this->input->post('keterangan_periksa_denda');
      
    $paraf_kasie = $this->input->post('paraf_kasie');
    $paraf_kabid = $this->input->post('paraf_kabid');
    $keterangan_kabid_kasie = $this->input->post('keterangan_kabid_kasie');

    $paraf_sekre = $this->input->post('paraf_sekre');
    $paraf_dinas = $this->input->post('paraf_dinas');

    $no_pdrt = $this->input->post('no_pdrt');

    $date_from = DateTime::createFromFormat('d/m/Y', $this->input->post('tanggal'));
    $tanggal = $date_from->format('Y-m-d');

    $datakendali = array(
        'nama_pemohon' => $nama_pemohon,
        'kecamatan' => $kecamatan,
        'desa_kel' => $desa_kel,
        'jenis_kegiatan' => $jenis_kegiatan,
        'no_register' => $no_register,
        'keterangan_register' => $keterangan_register,
        'peninjauan_lapangan' => $peninjauan_lapangan,
        'keterangan_lapangan' => $keterangan_lapangan,
        'perhitungan' => $perhitungan,
        'keterangan_perhitungan' => $keterangan_perhitungan,
        'draft_ketik' => $draft_ketik,
        'keterangan_ketik_pdrt' => $keterangan_ketik_pdrt,
        'draft_periksa' => $draft_periksa,
        'keterangan_periksa_pdrt' => $keterangan_periksa_pdrt,
        'denda_ketik' => $denda_ketik,
        'keterangan_ketik_denda' => $keterangan_ketik_denda,
        'denda_periksa' => $denda_periksa,
        'keterangan_periksa_denda' => $keterangan_periksa_denda,
        'paraf_kasie' => $paraf_kasie,
        'paraf_kabid' => $paraf_kabid,
        'keterangan_kabid_kasie' => $keterangan_kabid_kasie,
        'paraf_sekre' => $paraf_sekre,
        'paraf_dinas' => $paraf_dinas,
        'no_pdrt' => $no_pdrt,
        'tanggal' => $tanggal
    );

     $where = array(
        'id' => $id
    );

     $this->model->update_data_kendali($where,$datakendali,'buku_kendali_pdrt');
    redirect(base_url('kendalicrud'));
       
  }


  public function read(){
      $rows = $this->model->read();
      $this->load->view('read_kendali_pdrt_view',['rows'=>$rows]);
  }


  public function detail_data($id) {
    $where = array('id' => $id);
    $data['rows']= $this->model->dapat_data_kendali($where,'buku_kendali_pdrt');
    $this->load->view('kendali_view/detail_data',$data);
  }



  public function delete($id){
    $this->model->id = $id;
    $sql = $this->model->delete();
    redirect('Kendalicrud');
  }


  // for showing only
  // read permo
  public function read_datapermo() {
     // pagination
    $jumlah_data_permo = $this->model->jumlah_data_permo();
    $config['base_url'] = base_url().'kendalicrud/read_datapermo/';
    $config['total_rows'] = $jumlah_data_permo;
    $config['per_page'] = 10;

    //config for bootstrap pagination class integration
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';

    $from = $this->uri->segment(3);
    $this->pagination->initialize($config);
    $data['rows'] = $this->model->datapermo($config['per_page'],$from);
    $this->load->view('kendali_view/read_all_permo_view',$data);
  }
  
  // read kendali
  public function read_datakendali() {
      // pagination
     $jumlah_data_kendali = $this->model->jumlah_data_kendali();
     $config['base_url'] = base_url().'kendalicrud/read_datakendali/';
     $config['total_rows'] = $jumlah_data_kendali;
     $config['per_page'] = 10;

      //config for bootstrap pagination class integration
     $config['full_tag_open'] = '<ul class="pagination">';
     $config['full_tag_close'] = '</ul>';
     $config['first_link'] = false;
     $config['last_link'] = false;
     $config['first_tag_open'] = '<li>';
     $config['first_tag_close'] = '</li>';
     $config['prev_link'] = '&laquo';
     $config['prev_tag_open'] = '<li class="prev">';
     $config['prev_tag_close'] = '</li>';
     $config['next_link'] = '&raquo';
     $config['next_tag_open'] = '<li>';
     $config['next_tag_close'] = '</li>';
     $config['last_tag_open'] = '<li>';
     $config['last_tag_close'] = '</li>';
     $config['cur_tag_open'] = '<li class="active"><a href="#">';
     $config['cur_tag_close'] = '</a></li>';
     $config['num_tag_open'] = '<li>';
     $config['num_tag_close'] = '</li>';
    
     $from = $this->uri->segment(3);
      $this->pagination->initialize($config);
      $data['rows'] = $this->model->datakendali($config['per_page'],$from);
      $this->load->view('kendali_view/read_all_kendali_view',$data);
    
  }
  // end of read all data


 
 //---filter and search function---// for kendali data

  // search as you want for table data or search a similar data
  public function searchanything() {
    $anything = $this->input->post('anything');
    $data['rows'] = $this->model->searchanything($anything);
    $this->load->view('kendali_view/read_kendali_pdrt_view', $data);
  }


  // search specific data, field must filled
  public function filterkeyword() {
    $filter_kecamatan = $this->input->post('kecamatan');
    $filter_desa = $this->input->post('desa_kel');

    $data['rows'] = $this->model->filter_data($filter_kecamatan,$filter_desa);
    $this->load->view('kendali_view/read_kendali_pdrt_view',$data);

  }

  // range date function
  public function rangetanggal() {
    $date_from_first = DateTime::createFromFormat('d/m/Y', $this->input->post('tgl_awal'));
    $new_date_first = $date_from_first->format('Y-m-d');

    $date_from_last = DateTime::createFromFormat('d/m/Y', $this->input->post('tgl_akhir'));
    $new_date_last = $date_from_last->format('Y-m-d');

    $tgl_awal = $new_date_first;
    $tgl_akhir = $new_date_last;
    $data['rows'] = $this->model->get_daterange($tgl_awal,$tgl_akhir);
    $this->load->view('kendali_view/read_kendali_pdrt_view',$data);
  }


  //--filter and serch function---// for permo data
  // search as you want for table data or search a similiar data
  public function searchdata_permo() {
    $alldata_permo = $this->input->post('allpermo');
    
    $data['rows'] = $this->model->searchalldata_permo($alldata_permo);
    $this->load->view('kendali_view/read_all_permo_view', $data);
  }

  public function filter_permo() {
    $filter_kecamatan = $this->input->post('kecamatan');
    $filter_desa = $this->input->post('desa_kel');
    $filter_bangunan = $this->input->post('fungsi_bangunan');

    $data['rows'] = $this->model->filter_datapermo($filter_kecamatan,$filter_desa,$filter_bangunan);
    $this->load->view('kendali_view/read_all_permo_view', $data);
  }

  public function range_tanggal_permo() {
    $date_from_first = DateTime::createFromFormat('d/m/Y', $this->input->post('tgl_awal'));
    $new_date_first = $date_from_first->format('Y-m-d');

    $date_from_last = DateTime::createFromFormat('d/m/Y', $this->input->post('tgl_akhir'));
    $new_date_last = $date_from_last->format('Y-m-d');

    $tgl_awal = $new_date_first;
    $tgl_akhir = $new_date_last;
    $data['rows'] = $this->model->getpermo_daterange($tgl_awal,$tgl_akhir);
    $this->load->view('kendali_view/read_all_permo_view', $data);
  }


  //--filter and search function---// for kendali data
  // search as you want for table data or search a similiar data
  public function searchdata_kendali() {
    $anything = $this->input->post('anything');

    $data['rows'] = $this->model->searchanything($anything);
    $this->load->view('kendali_view/read_all_kendali_view', $data);
  }


  // search specific data, field must filled
  public function filter_kendali() {
    $filter_kecamatan = $this->input->post('kecamatan');
    $filter_desa = $this->input->post('desa_kel');

    $data['rows'] = $this->model->filter_data($filter_kecamatan,$filter_desa);
    $this->load->view('kendali_view/read_all_kendali_view',$data);

  }

  // range date function
  public function range_tanggal_kendali() {
    $date_from_first = DateTime::createFromFormat('d/m/Y', $this->input->post('tgl_awal'));
    $new_date_first = $date_from_first->format('Y-m-d');

    $date_from_last = DateTime::createFromFormat('d/m/Y', $this->input->post('tgl_akhir'));
    $new_date_last = $date_from_last->format('Y-m-d');

    $tgl_awal = $new_date_first;
    $tgl_akhir = $new_date_last;

    $data['rows'] = $this->model->get_daterange($tgl_awal,$tgl_akhir);
    $this->load->view('kendali_view/read_all_kendali_view',$data);
  }

  public function export_filter() {
  // Create new PHPExcel object
    $objPHPExcel = new PHPExcel();
    
    // styling cells

  $default_border = array(
		'style' => PHPExcel_Style_Border::BORDER_THIN,
		'color' => array('rgb' => '000000'),
	);

	$top_header_style = array(
		'borders' => array(
			'bottom' => $default_border,
			'left' => $default_border,
			'top' => $default_border,
			'right' => $default_border,
		),
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array('rgb' => '72f630'),
		),
		'font' => array(
			'color' => array('rgb' => '000000'),
			'size' => 14,
			'name' => 'Arial',
			'bold' => true,
		),
		'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		),
	);
	$style_header = array(
		'borders' => array(
			'bottom' => $default_border,
			'left' => $default_border,
			'top' => $default_border,
			'right' => $default_border,
		),
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array('rgb' => '72f630'),
		),
		'font' => array(
			'color' => array('rgb' => '000000'),
			'size' => 12,
			'name' => 'Arial',
			'bold' => true,
		),
		'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		),
	);

	$text_align_center = array(
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		)
	);

  $text_align_left = array(
    'alignment' => array(
      'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
    )
  );

  	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:Z1');
    $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('G1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('H1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('I1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('J1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('K1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('L1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('M1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('N1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('O1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('P1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('Q1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('R1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('S1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('T1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('U1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('V1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('W1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('X1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('Y1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('Z1')->applyFromArray($top_header_style);
      $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Tabel Kendali PDRT');
    

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:A3');
      $objPHPExcel->getActiveSheet()->getStyle('A2:A3')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('A2', 'No');
    
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B2:B3');
      $objPHPExcel->getActiveSheet()->getStyle('B2:B3')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('B2', 'Nama Pemohon');


    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('C2:D2');
      $objPHPExcel->getActiveSheet()->getStyle('C2:D2')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('C2', 'LOKASI');

      $objPHPExcel->getActiveSheet()->setCellValue('C3', 'Kecamatan');
      $objPHPExcel->getActiveSheet()->getStyle('C3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('D3', 'Desa/Kel');
      $objPHPExcel->getActiveSheet()->getStyle('D3')->applyFromArray($style_header);

    
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('E2:E3');
      $objPHPExcel->getActiveSheet()->getStyle('E2:E3')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('E2', 'Jenis Kegiatan');
    

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F2:G2');
      $objPHPExcel->getActiveSheet()->getStyle('F2:G2')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('F2', 'Register');

      $objPHPExcel->getActiveSheet()->setCellValue('F3', 'No Register');
      $objPHPExcel->getActiveSheet()->getStyle('F3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('G3', 'Keterangan Register');
      $objPHPExcel->getActiveSheet()->getStyle('G3')->applyFromArray($style_header);

    
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('H2:I2');
      $objPHPExcel->getActiveSheet()->getStyle('H2:I2')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('H2', 'Peninjauan Lapangan');

      $objPHPExcel->getActiveSheet()->setCellValue('H3', 'Tanggal');
      $objPHPExcel->getActiveSheet()->getStyle('H3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('I3', 'Keterangan');
      $objPHPExcel->getActiveSheet()->getStyle('I3')->applyFromArray($style_header);

    
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('J2:K2');
      $objPHPExcel->getActiveSheet()->getStyle('J2:K2')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('J2', 'Perhitungan');

      $objPHPExcel->getActiveSheet()->setCellValue('J3', 'Tanggal');
      $objPHPExcel->getActiveSheet()->getStyle('J3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('K3', 'Keterangan');
      $objPHPExcel->getActiveSheet()->getStyle('K3')->applyFromArray($style_header);

    
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('L2:M2');
      $objPHPExcel->getActiveSheet()->getStyle('L2:M2')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('L2', 'Draft Ketik');

      $objPHPExcel->getActiveSheet()->setCellValue('L3', 'Tanggal');
      $objPHPExcel->getActiveSheet()->getStyle('L3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('M3', 'Keterangan');
      $objPHPExcel->getActiveSheet()->getStyle('M3')->applyFromArray($style_header);

  
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('N2:O2');
      $objPHPExcel->getActiveSheet()->getStyle('N2:O2')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('N2', 'Draft Periksa');

      $objPHPExcel->getActiveSheet()->setCellValue('N3', 'Tanggal');
      $objPHPExcel->getActiveSheet()->getStyle('N3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('O3', 'Keterangan');
      $objPHPExcel->getActiveSheet()->getStyle('O3')->applyFromArray($style_header);
    

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('P2:Q2');
      $objPHPExcel->getActiveSheet()->getStyle('P2:Q2')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('P2', 'Denda Ketik');

      $objPHPExcel->getActiveSheet()->setCellValue('P3', 'Tanggal');
      $objPHPExcel->getActiveSheet()->getStyle('P3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('Q3', 'Keterangan');
      $objPHPExcel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_header);

    
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('R2:S2');
      $objPHPExcel->getActiveSheet()->getStyle('R2:S2')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('R2', 'Denda Periksa');

      $objPHPExcel->getActiveSheet()->setCellValue('R3', 'Tanggal');
      $objPHPExcel->getActiveSheet()->getStyle('R3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('S3', 'Keterangan');
      $objPHPExcel->getActiveSheet()->getStyle('S3')->applyFromArray($style_header);


    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('T2:V2');
      $objPHPExcel->getActiveSheet()->getStyle('T2:V2')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('T2', 'Paraf');

      $objPHPExcel->getActiveSheet()->setCellValue('T3', 'Kasie');
      $objPHPExcel->getActiveSheet()->getStyle('T3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('U3', 'Kabid');
      $objPHPExcel->getActiveSheet()->getStyle('U3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('V3', 'Keterangan');
      $objPHPExcel->getActiveSheet()->getStyle('V3')->applyFromArray($style_header);


      $objPHPExcel->setActiveSheetIndex(0)->mergeCells('W2:W3');
      $objPHPExcel->getActiveSheet()->getStyle('W2:W3')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('W2', 'Paraf Sekre');
      
      $objPHPExcel->setActiveSheetIndex(0)->mergeCells('X2:X3');
      $objPHPExcel->getActiveSheet()->getStyle('X2:X3')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('X2', 'Paraf Dinas');

      $objPHPExcel->setActiveSheetIndex(0)->mergeCells('Y2:Y3');
      $objPHPExcel->getActiveSheet()->getStyle('Y2:Y3')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('Y2', 'No Pdrt');

      $objPHPExcel->setActiveSheetIndex(0)->mergeCells('Z2:Z3');
      $objPHPExcel->getActiveSheet()->getStyle('Z2:Z3')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('Z2', 'Tanggal');


    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet()->getStyle('A')->applyFromArray($text_align_center);

    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);

    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getStyle('F')->applyFromArray($text_align_center);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);

    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getStyle('H')->applyFromArray($text_align_center);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);

    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getStyle('J')->applyFromArray($text_align_center);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);

    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getStyle('L')->applyFromArray($text_align_center);
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(25);

    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getStyle('N')->applyFromArray($text_align_center);
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(25);

    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getStyle('P')->applyFromArray($text_align_center);
    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(25);

    $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getStyle('R')->applyFromArray($text_align_center);
    $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(25);

    $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(25);
      $objPHPExcel->getActiveSheet()->getStyle('T')->applyFromArray($text_align_center);
      $objPHPExcel->getActiveSheet()->getStyle('U')->applyFromArray($text_align_center);

    $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(15);
      $objPHPExcel->getActiveSheet()->getStyle('W')->applyFromArray($text_align_center);
      $objPHPExcel->getActiveSheet()->getStyle('X')->applyFromArray($text_align_center);

    $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(15);
      $objPHPExcel->getActiveSheet()->getStyle('Y')->applyFromArray($text_align_center);

    $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(15);
      $objPHPExcel->getActiveSheet()->getStyle('Z')->applyFromArray($text_align_center);

    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);


    $row = 4;
    $no_data = 0;
    $filter_kecamatan = $this->input->post('kecamatan');
    $filter_desa = $this->input->post('desa_kel');

    $Data = $this->model->filter_data($filter_kecamatan,$filter_desa);

    foreach ($Data as $value)
    {
      $no_data++;
      $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $no_data);
      $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $value->nama_pemohon);
      $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $value->kecamatan);
      $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $value->desa_kel);
      $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $value->jenis_kegiatan);
      $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $value->no_register);
      $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $value->keterangan_register);
      $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $value->peninjauan_lapangan);
      $objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $value->keterangan_lapangan);
      $objPHPExcel->getActiveSheet()->setCellValue('J'.$row, $value->perhitungan);
      $objPHPExcel->getActiveSheet()->setCellValue('K'.$row, $value->keterangan_perhitungan);
      $objPHPExcel->getActiveSheet()->setCellValue('L'.$row, $value->draft_ketik);
      $objPHPExcel->getActiveSheet()->setCellValue('M'.$row, $value->keterangan_ketik_pdrt);
      $objPHPExcel->getActiveSheet()->setCellValue('N'.$row, $value->draft_periksa);
      $objPHPExcel->getActiveSheet()->setCellValue('O'.$row, $value->keterangan_periksa_pdrt);
      $objPHPExcel->getActiveSheet()->setCellValue('P'.$row, $value->denda_ketik);
      $objPHPExcel->getActiveSheet()->setCellValue('Q'.$row, $value->keterangan_ketik_denda);
      $objPHPExcel->getActiveSheet()->setCellValue('R'.$row, $value->denda_periksa);
      $objPHPExcel->getActiveSheet()->setCellValue('S'.$row, $value->keterangan_periksa_denda);
      $objPHPExcel->getActiveSheet()->setCellValue('T'.$row, $value->paraf_kasie);
      $objPHPExcel->getActiveSheet()->setCellValue('U'.$row, $value->paraf_kabid);
      $objPHPExcel->getActiveSheet()->setCellValue('V'.$row, $value->keterangan_kabid_kasie);
      $objPHPExcel->getActiveSheet()->setCellValue('W'.$row, $value->paraf_sekre);
      $objPHPExcel->getActiveSheet()->setCellValue('X'.$row, $value->paraf_dinas);
      $objPHPExcel->getActiveSheet()->setCellValue('Y'.$row, $value->no_pdrt);
      $objPHPExcel->getActiveSheet()->setCellValue('Z'.$row, dateFormat('d/m/Y',$value->tanggal));
      $row++;
    }


    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Laporan Tabel Kendali PDRT.xls"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
  }

  public function export_range() {
 // Create new PHPExcel object
    $objPHPExcel = new PHPExcel();
    
    // styling cells

  $default_border = array(
		'style' => PHPExcel_Style_Border::BORDER_THIN,
		'color' => array('rgb' => '000000'),
	);

	$top_header_style = array(
		'borders' => array(
			'bottom' => $default_border,
			'left' => $default_border,
			'top' => $default_border,
			'right' => $default_border,
		),
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array('rgb' => '72f630'),
		),
		'font' => array(
			'color' => array('rgb' => '000000'),
			'size' => 14,
			'name' => 'Arial',
			'bold' => true,
		),
		'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		),
	);
	$style_header = array(
		'borders' => array(
			'bottom' => $default_border,
			'left' => $default_border,
			'top' => $default_border,
			'right' => $default_border,
		),
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array('rgb' => '72f630'),
		),
		'font' => array(
			'color' => array('rgb' => '000000'),
			'size' => 12,
			'name' => 'Arial',
			'bold' => true,
		),
		'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		),
	);

	$text_align_center = array(
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		)
	);

  $text_align_left = array(
    'alignment' => array(
      'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
    )
  );

  	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:Z1');
    $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('G1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('H1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('I1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('J1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('K1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('L1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('M1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('N1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('O1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('P1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('Q1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('R1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('S1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('T1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('U1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('V1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('W1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('X1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('Y1')->applyFromArray($top_header_style);
    $objPHPExcel->getActiveSheet()->getStyle('Z1')->applyFromArray($top_header_style);
      $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Tabel Kendali PDRT');
    

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:A3');
      $objPHPExcel->getActiveSheet()->getStyle('A2:A3')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('A2', 'No');
    
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B2:B3');
      $objPHPExcel->getActiveSheet()->getStyle('B2:B3')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('B2', 'Nama Pemohon');


    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('C2:D2');
      $objPHPExcel->getActiveSheet()->getStyle('C2:D2')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('C2', 'LOKASI');

      $objPHPExcel->getActiveSheet()->setCellValue('C3', 'Kecamatan');
      $objPHPExcel->getActiveSheet()->getStyle('C3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('D3', 'Desa/Kel');
      $objPHPExcel->getActiveSheet()->getStyle('D3')->applyFromArray($style_header);

    
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('E2:E3');
      $objPHPExcel->getActiveSheet()->getStyle('E2:E3')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('E2', 'Jenis Kegiatan');
    

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F2:G2');
      $objPHPExcel->getActiveSheet()->getStyle('F2:G2')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('F2', 'Register');

      $objPHPExcel->getActiveSheet()->setCellValue('F3', 'No Register');
      $objPHPExcel->getActiveSheet()->getStyle('F3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('G3', 'Keterangan Register');
      $objPHPExcel->getActiveSheet()->getStyle('G3')->applyFromArray($style_header);

    
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('H2:I2');
      $objPHPExcel->getActiveSheet()->getStyle('H2:I2')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('H2', 'Peninjauan Lapangan');

      $objPHPExcel->getActiveSheet()->setCellValue('H3', 'Tanggal');
      $objPHPExcel->getActiveSheet()->getStyle('H3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('I3', 'Keterangan');
      $objPHPExcel->getActiveSheet()->getStyle('I3')->applyFromArray($style_header);

    
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('J2:K2');
      $objPHPExcel->getActiveSheet()->getStyle('J2:K2')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('J2', 'Perhitungan');

      $objPHPExcel->getActiveSheet()->setCellValue('J3', 'Tanggal');
      $objPHPExcel->getActiveSheet()->getStyle('J3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('K3', 'Keterangan');
      $objPHPExcel->getActiveSheet()->getStyle('K3')->applyFromArray($style_header);

    
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('L2:M2');
      $objPHPExcel->getActiveSheet()->getStyle('L2:M2')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('L2', 'Draft Ketik');

      $objPHPExcel->getActiveSheet()->setCellValue('L3', 'Tanggal');
      $objPHPExcel->getActiveSheet()->getStyle('L3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('M3', 'Keterangan');
      $objPHPExcel->getActiveSheet()->getStyle('M3')->applyFromArray($style_header);

  
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('N2:O2');
      $objPHPExcel->getActiveSheet()->getStyle('N2:O2')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('N2', 'Draft Periksa');

      $objPHPExcel->getActiveSheet()->setCellValue('N3', 'Tanggal');
      $objPHPExcel->getActiveSheet()->getStyle('N3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('O3', 'Keterangan');
      $objPHPExcel->getActiveSheet()->getStyle('O3')->applyFromArray($style_header);
    

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('P2:Q2');
      $objPHPExcel->getActiveSheet()->getStyle('P2:Q2')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('P2', 'Denda Ketik');

      $objPHPExcel->getActiveSheet()->setCellValue('P3', 'Tanggal');
      $objPHPExcel->getActiveSheet()->getStyle('P3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('Q3', 'Keterangan');
      $objPHPExcel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_header);

    
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('R2:S2');
      $objPHPExcel->getActiveSheet()->getStyle('R2:S2')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('R2', 'Denda Periksa');

      $objPHPExcel->getActiveSheet()->setCellValue('R3', 'Tanggal');
      $objPHPExcel->getActiveSheet()->getStyle('R3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('S3', 'Keterangan');
      $objPHPExcel->getActiveSheet()->getStyle('S3')->applyFromArray($style_header);


    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('T2:V2');
      $objPHPExcel->getActiveSheet()->getStyle('T2:V2')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('T2', 'Paraf');

      $objPHPExcel->getActiveSheet()->setCellValue('T3', 'Kasie');
      $objPHPExcel->getActiveSheet()->getStyle('T3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('U3', 'Kabid');
      $objPHPExcel->getActiveSheet()->getStyle('U3')->applyFromArray($style_header);

      $objPHPExcel->getActiveSheet()->setCellValue('V3', 'Keterangan');
      $objPHPExcel->getActiveSheet()->getStyle('V3')->applyFromArray($style_header);


      $objPHPExcel->setActiveSheetIndex(0)->mergeCells('W2:W3');
      $objPHPExcel->getActiveSheet()->getStyle('W2:W3')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('W2', 'Paraf Sekre');
      
      $objPHPExcel->setActiveSheetIndex(0)->mergeCells('X2:X3');
      $objPHPExcel->getActiveSheet()->getStyle('X2:X3')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('X2', 'Paraf Dinas');

      $objPHPExcel->setActiveSheetIndex(0)->mergeCells('Y2:Y3');
      $objPHPExcel->getActiveSheet()->getStyle('Y2:Y3')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('Y2', 'No Pdrt');

      $objPHPExcel->setActiveSheetIndex(0)->mergeCells('Z2:Z3');
      $objPHPExcel->getActiveSheet()->getStyle('Z2:Z3')->applyFromArray($style_header);
      $objPHPExcel->getActiveSheet()->setCellValue('Z2', 'Tanggal');


    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet()->getStyle('A')->applyFromArray($text_align_center);

    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);

    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getStyle('F')->applyFromArray($text_align_center);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);

    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getStyle('H')->applyFromArray($text_align_center);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);

    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getStyle('J')->applyFromArray($text_align_center);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);

    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getStyle('L')->applyFromArray($text_align_center);
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(25);

    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getStyle('N')->applyFromArray($text_align_center);
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(25);

    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getStyle('P')->applyFromArray($text_align_center);
    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(25);

    $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getStyle('R')->applyFromArray($text_align_center);
    $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(25);

    $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(25);
      $objPHPExcel->getActiveSheet()->getStyle('T')->applyFromArray($text_align_center);
      $objPHPExcel->getActiveSheet()->getStyle('U')->applyFromArray($text_align_center);

    $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(15);
      $objPHPExcel->getActiveSheet()->getStyle('W')->applyFromArray($text_align_center);
      $objPHPExcel->getActiveSheet()->getStyle('X')->applyFromArray($text_align_center);

    $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(15);
      $objPHPExcel->getActiveSheet()->getStyle('Y')->applyFromArray($text_align_center);

    $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(15);
      $objPHPExcel->getActiveSheet()->getStyle('Z')->applyFromArray($text_align_center);

    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);


    $row = 4;
    $no_data = 0;
    $date_from_first = DateTime::createFromFormat('d/m/Y', $this->input->post('tgl_awal'));
    $new_date_first = $date_from_first->format('Y-m-d');

    $date_from_last = DateTime::createFromFormat('d/m/Y', $this->input->post('tgl_akhir'));
    $new_date_last = $date_from_last->format('Y-m-d');

    $tgl_awal = $new_date_first;
    $tgl_akhir = $new_date_last;

    $Data = $this->model->get_daterange($tgl_awal,$tgl_akhir);

    foreach ($Data as $value)
    {
      $no_data++;
      $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $no_data);
      $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $value->nama_pemohon);
      $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $value->kecamatan);
      $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $value->desa_kel);
      $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $value->jenis_kegiatan);
      $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $value->no_register);
      $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $value->keterangan_register);
      $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $value->peninjauan_lapangan);
      $objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $value->keterangan_lapangan);
      $objPHPExcel->getActiveSheet()->setCellValue('J'.$row, $value->perhitungan);
      $objPHPExcel->getActiveSheet()->setCellValue('K'.$row, $value->keterangan_perhitungan);
      $objPHPExcel->getActiveSheet()->setCellValue('L'.$row, $value->draft_ketik);
      $objPHPExcel->getActiveSheet()->setCellValue('M'.$row, $value->keterangan_ketik_pdrt);
      $objPHPExcel->getActiveSheet()->setCellValue('N'.$row, $value->draft_periksa);
      $objPHPExcel->getActiveSheet()->setCellValue('O'.$row, $value->keterangan_periksa_pdrt);
      $objPHPExcel->getActiveSheet()->setCellValue('P'.$row, $value->denda_ketik);
      $objPHPExcel->getActiveSheet()->setCellValue('Q'.$row, $value->keterangan_ketik_denda);
      $objPHPExcel->getActiveSheet()->setCellValue('R'.$row, $value->denda_periksa);
      $objPHPExcel->getActiveSheet()->setCellValue('S'.$row, $value->keterangan_periksa_denda);
      $objPHPExcel->getActiveSheet()->setCellValue('T'.$row, $value->paraf_kasie);
      $objPHPExcel->getActiveSheet()->setCellValue('U'.$row, $value->paraf_kabid);
      $objPHPExcel->getActiveSheet()->setCellValue('V'.$row, $value->keterangan_kabid_kasie);
      $objPHPExcel->getActiveSheet()->setCellValue('W'.$row, $value->paraf_sekre);
      $objPHPExcel->getActiveSheet()->setCellValue('X'.$row, $value->paraf_dinas);
      $objPHPExcel->getActiveSheet()->setCellValue('Y'.$row, $value->no_pdrt);
      $objPHPExcel->getActiveSheet()->setCellValue('Z'.$row, dateFormat('d/m/Y',$value->tanggal));
      $row++;
    }


    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Laporan Tabel Kendali PDRT.xls"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
  }
}
