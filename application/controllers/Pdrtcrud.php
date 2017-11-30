<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pdrtcrud extends CI_Controller {
  public $model = NULL;

  public function __construct() {
    parent::__construct();
    //load database
    $this->load->database();
    // Initialize Model
    $this->model = $this->Pdrt_model;

    if ($this->session->userdata('username') == "") {
      redirect(base_url("login"));
    }

  }

  public function index() {
    // pagination for home
    $jumlah_data = $this->model->jumlah_data();
    $config['base_url'] = base_url().'pdrtcrud/index/';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 5;

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
    $this->load->view('pemohon_view/read_pdrt_view',$data);
  }

  //---CRUD METHOD---//

  // insert data
  // load view first
  public function add_data() {
  
    $this->load->view('pemohon_view/create_pdrt_view');
    
  }

  // then create function excecution
  public function create() {

    // form validation
    $config_validate = array(
        array(
          'field' => 'nama_pemohon',
          'label' => 'Nama Pemohon',
          'rules' => 'required',
          'errors' => array(
                      'required' => 'Anda harus mengisi nama pemohon'
            ),
        ),

        array(
          'field' => 'kecamatan',
          'label' => 'Kecamatan',
          'rules' => 'required'
        ),

        array(
          'field' => 'desa_kel',
          'label' => 'Desa/Kelurahan',
          'rules' => 'required'
        ),

        array(
          'field' => 'fungsi_bangunan',
          'label' => 'Fungsi Bangunan',
          'rules' => 'required'
        ),

        array(
          'field' => 'jenis_kegiatan',
          'label' => 'Jenis Kegiatan',
          'rules' => 'required',
          'errors' => array(
                      'required' => 'Anda harus mengisi jenis kegiatan'
            ),
        ),

        array(
          'field' => 'luas_tanah',
          'label' => 'Luas Tanah',
          'rules' => 'required',
          'errors' => array(
                      'required' => 'Anda harus mengisi luas tanah'
            ),
        ),

        array(
          'field' => 'no_register',
          'label' => 'No Register',
          'rules' => 'required',
          'errors' => array(
                      'required' => 'Anda harus mengisi nomer register'
            ),
        ),

        array(
          'field' => 'tanggal',
          'label' => 'Tanggal',
          'rules' => 'required',
          'errors' => array(
                      'required' => 'And harus mengisi tanggal'
            ),
          )
    );

    $this->form_validation->set_rules($config_validate);
    
    if ($this->form_validation->run() == TRUE) {
        $date_from = DateTime::createFromFormat('d/m/Y', $this->input->post('tanggal'));
        $new_date = $date_from->format('Y-m-d');
        $datapermohonan = array(
                        'nama_pemohon' => $this->input->post('nama_pemohon'),
                        'kecamatan' => $this->input->post('kecamatan'),
                        'desa_kel' => $this->input->post('desa_kel'),
                        'fungsi_bangunan' => $this->input->post('fungsi_bangunan'),
                        'jenis_kegiatan' => $this->input->post('jenis_kegiatan'),
                        'luas_tanah' => $this->input->post('luas_tanah'),
                        'no_register' => $this->input->post('no_register'),
                        'tanggal' => $new_date,
                        'ilok_ppt' => $this->input->post('ilok_ppt'),
                        'keterangan' => $this->input->post('keterangan')
                      );
        $datakendali = array(
                      'nama_pemohon' => $this->input->post('nama_pemohon'),
                      'kecamatan' => $this->input->post('kecamatan'),
                      'desa_kel' => $this->input->post('desa_kel'),
                      'jenis_kegiatan' => $this->input->post('jenis_kegiatan'),
                      'no_register' => $this->input->post('no_register'),
                      'tanggal' => $new_date
                      );

        $this->model->insert_permo($datapermohonan);
        $this->model->insert_kendali($datakendali);
        redirect(base_url());
    }else{
      $this->load->view('pemohon_view/create_pdrt_view');
    }
  }

	// read permo pdrt for index
  public function read() {
      $rows = $this->model->read();
      $this->load->view('pemohon_view/read_pdrt_view',['rows'=>$rows]);
  }
	
	// for showing only
	// read permo
  public function read_datapermo() {
	   // pagination
    $jumlah_data_permo = $this->model->jumlah_data_permo();
    $config['base_url'] = base_url().'pdrtcrud/read_datapermo/';
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
    $this->load->view('pemohon_view/read_all_permo_view',$data);
  }
	
	// read kendali
  public function read_datakendali() {
	  	// pagination
	   $jumlah_data_kendali = $this->model->jumlah_data_kendali();
	   $config['base_url'] = base_url().'pdrtcrud/read_datakendali/';
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
    	$this->load->view('pemohon_view/read_all_kendali_view',$data);
	  
  }
	// end of read all data



  // load view and cacth the id as primary key
  public function edit_data($id) {

    $where = array('id' => $id);
    $data['rows']= $this->model->dapat_data_permo($where,'permo_pdrt');
    $this->load->view('pemohon_view/update_pdrt_view',$data);
  }

  // update function excecution
  public function update() {

    $date_from = DateTime::createFromFormat('d/m/Y', $this->input->post('tanggal'));
    $new_date = $date_from->format('Y-m-d');

    $id = $this->input->post('id');
    $nama_pemohon = $this->input->post('nama_pemohon');
    $kecamatan = $this->input->post('kecamatan');
    $desa_kel = $this->input->post('desa_kel');
    $fungsi_bangunan = $this->input->post('fungsi_bangunan');
    $jenis_kegiatan = $this->input->post('jenis_kegiatan');
    $luas_tanah = $this->input->post('luas_tanah');
    $no_register = $this->input->post('no_register');
    $tanggal = $new_date;
    $ilok_ppt = $this->input->post('ilok_ppt');
    $keterangan = $this->input->post('keterangan');

    $datapermo = array(
        'nama_pemohon' => $nama_pemohon,
        'kecamatan' => $kecamatan,
        'desa_kel' => $desa_kel,
        'fungsi_bangunan' => $fungsi_bangunan,
        'jenis_kegiatan' => $jenis_kegiatan,
        'luas_tanah' => $luas_tanah,
        'no_register' => $no_register,
        'tanggal' => $tanggal,
        'ilok_ppt' => $ilok_ppt,
        'keterangan' => $keterangan
    );

  $datakendali = array(
        'nama_pemohon' => $nama_pemohon,
        'kecamatan' => $kecamatan,
        'desa_kel' => $desa_kel,
        'jenis_kegiatan' => $jenis_kegiatan,
        'no_register' => $no_register,
        'tanggal' => $tanggal
    );

    $where = array(
        'id' => $id
    );

    $this->model->update_data_permo($where,$datapermo,'permo_pdrt');
    $this->model->update_data_kendali($where,$datakendali,'buku_kendali_pdrt');
    redirect(base_url());

  }
 


  // delete function
  // delete data when catch the id as primary key
  public function delete($id) {
    $this->model->id = $id;
    $sql = $this->model->delete();
    redirect(base_url());
  }



  //---filter and search function---// for permo data

  // search as you want for table data or search a similar data
  public function searchanything() {
    $anything = $this->input->post('anything');
    $data['rows'] = $this->model->searchanything($anything);
    $this->load->view('pemohon_view/read_pdrt_view', $data);
  }


  // search specific data, field must filled
  public function filterkeyword() {
    $filter_kecamatan = $this->input->post('kecamatan');
    $filter_desa = $this->input->post('desa_kel');
    $filter_bangunan = $this->input->post('fungsi_bangunan');

    $data['rows'] = $this->model->filter_data($filter_kecamatan,$filter_desa,$filter_bangunan);
    $this->load->view('pemohon_view/read_pdrt_view',$data);

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
    $this->load->view('pemohon_view/read_pdrt_view',$data);
  }



  // feature for read only data
  //--filter and search function---// for permo data

  public function searchdata_permo() {
    $anything = $this->input->post('anything');

    $data['rows'] = $this->model->searchanything($anything);
    $this->load->view('pemohon_view/read_all_permo_view', $data);
  }

  public function filter_permo() {
    $filter_kecamatan = $this->input->post('kecamatan');
    $filter_desa = $this->input->post('desa_kel');
    $filter_bangunan = $this->input->post('fungsi_bangunan');

    $data['rows'] = $this->model->filter_data($filter_kecamatan,$filter_desa,$filter_bangunan);
    $this->load->view('pemohon_view/read_all_permo_view',$data);
  }

  public function range_tanggal_permo() {
    $date_from_first = DateTime::createFromFormat('d/m/Y', $this->input->post('tgl_awal'));
    $new_date_first = $date_from_first->format('Y-m-d');

    $date_from_last = DateTime::createFromFormat('d/m/Y', $this->input->post('tgl_akhir'));
    $new_date_last = $date_from_last->format('Y-m-d');

    $tgl_awal = $new_date_first;
    $tgl_akhir = $new_date_last;

    $data['rows'] = $this->model->get_daterange($tgl_awal,$tgl_akhir);
    $this->load->view('pemohon_view/read_all_permo_view',$data);
  }


  //--filter and search function---// for kendali data

  // search as you want for table data or search a similiar data
  public function searchdata_kendali() {
    $alldata_kendali = $this->input->post('allkendali');
    
    $data['rows'] = $this->model->searchalldata_kendali($alldata_kendali);
    $this->load->view('pemohon_view/read_all_kendali_view', $data);
  }

  public function filter_kendali() {
    $filter_data_kecamatan = $this->input->post('kecamatan');
    $filter_data_desakel = $this->input->post('desa_kel');

    $data['rows'] = $this->model->filter_datakendali($filter_data_kecamatan, $filter_data_desakel);
    $this->load->view('pemohon_view/read_all_kendali_view', $data);
  }

  public function range_tanggal_kendali() {
    $date_from_first = DateTime::createFromFormat('d/m/Y', $this->input->post('tgl_awal'));
    $new_date_first = $date_from_first->format('Y-m-d');

    $date_from_last = DateTime::createFromFormat('d/m/Y', $this->input->post('tgl_akhir'));
    $new_date_last = $date_from_last->format('Y-m-d');

    $tgl_awal = $new_date_first;
    $tgl_akhir = $new_date_last;

    $data['rows'] = $this->model->getkendali_datarange($tgl_awal,$tgl_akhir);
    $this->load->view('pemohon_view/read_all_kendali_view', $data);
  }


  
  public function export_filter() {
    
// Create new PHPExcel object
	$objPHPExcel = new PHPExcel();

// superscript satuan
  $objRichText_persegi = new PHPExcel_RichText();
  $objRichText_persegi->createText('Luas Tanah m');

  $obj_persegi = $objRichText_persegi->createTextRun('2');
  $obj_persegi->getFont()->setSuperScript(true);

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
			'color' => array('rgb' => 'ffff03'),
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
			'color' => array('rgb' => 'ffff03'),
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

	$text_align_style = array(
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


	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:K1');
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
	    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Tabel Permohonan PDRT');

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
	  $objPHPExcel->getActiveSheet()->setCellValue('E2', 'Fungsi Bangunan');
  
  $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F2:F3');
    $objPHPExcel->getActiveSheet()->getStyle('F2:F3')->applyFromArray($style_header);
	  $objPHPExcel->getActiveSheet()->setCellValue('F2', 'Jenis Kegiatan');
	
  $objPHPExcel->setActiveSheetIndex(0)->mergeCells('G2:G3');
    $objPHPExcel->getActiveSheet()->getStyle('G2:G3')->applyFromArray($style_header);
    $objPHPExcel->getActiveSheet()->setCellValue('G2', $objRichText_persegi);

  $objPHPExcel->setActiveSheetIndex(0)->mergeCells('H2:H3');
    $objPHPExcel->getActiveSheet()->getStyle('H2:H3')->applyFromArray($style_header);
	  $objPHPExcel->getActiveSheet()->setCellValue('H2', 'No Register');

  $objPHPExcel->setActiveSheetIndex(0)->mergeCells('I2:I3');
    $objPHPExcel->getActiveSheet()->getStyle('I2:I3')->applyFromArray($style_header);
	  $objPHPExcel->getActiveSheet()->setCellValue('I2', 'Tanggal');
  
  $objPHPExcel->setActiveSheetIndex(0)->mergeCells('J2:J3');
    $objPHPExcel->getActiveSheet()->getStyle('J2:J3')->applyFromArray($style_header);
	  $objPHPExcel->getActiveSheet()->setCellValue('J2', 'ILOK/PPT');
  
  $objPHPExcel->setActiveSheetIndex(0)->mergeCells('K2:K3');
    $objPHPExcel->getActiveSheet()->getStyle('K2:K3')->applyFromArray($style_header);
	  $objPHPExcel->getActiveSheet()->setCellValue('K2', 'Keterangan');


	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet()->getStyle('A')->applyFromArray($text_align_style);

	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);

	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getStyle('G')->applyFromArray($text_align_left);

	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(18);
    $objPHPExcel->getActiveSheet()->getStyle('H')->applyFromArray($text_align_style);

	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getStyle('I')->applyFromArray($text_align_style);

	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(18);
    $objPHPExcel->getActiveSheet()->getStyle('J')->applyFromArray($text_align_style);

	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);

	$row = 4;
  $no_data = 0;
  
    $filter_kecamatan = $this->input->post('kecamatan');
    $filter_desa = $this->input->post('desa_kel');
    $filter_bangunan = $this->input->post('fungsi_bangunan');

    $Data = $this->model->filter_data($filter_kecamatan,$filter_desa,$filter_bangunan);
  
	foreach ($Data as $value)
	{
    $no_data++;
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $no_data);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $value->nama_pemohon);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $value->kecamatan);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $value->desa_kel);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $value->fungsi_bangunan);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $value->jenis_kegiatan);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $value->luas_tanah);
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $value->no_register);
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$row, dateFormat('d/m/Y',$value->tanggal));
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$row, $value->ilok_ppt);
		$objPHPExcel->getActiveSheet()->setCellValue('K'.$row, $value->keterangan);
		$row++;
	}

	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Laporan Tabel Permohonan PDRT.xls"');
	header('Cache-Control: max-age=0');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
  }


  public function export_range() {
    // Create new PHPExcel object
	$objPHPExcel = new PHPExcel();

// superscript satuan
  $objRichText_persegi = new PHPExcel_RichText();
  $objRichText_persegi->createText('Luas Tanah m');

  $obj_persegi = $objRichText_persegi->createTextRun('2');
  $obj_persegi->getFont()->setSuperScript(true);

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
			'color' => array('rgb' => 'ffff03'),
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
			'color' => array('rgb' => 'ffff03'),
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

	$text_align_style = array(
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


	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:K1');
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
	    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Tabel Permohonan PDRT');

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
	  $objPHPExcel->getActiveSheet()->setCellValue('E2', 'Fungsi Bangunan');
  
  $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F2:F3');
    $objPHPExcel->getActiveSheet()->getStyle('F2:F3')->applyFromArray($style_header);
	  $objPHPExcel->getActiveSheet()->setCellValue('F2', 'Jenis Kegiatan');
	
  $objPHPExcel->setActiveSheetIndex(0)->mergeCells('G2:G3');
    $objPHPExcel->getActiveSheet()->getStyle('G2:G3')->applyFromArray($style_header);
    $objPHPExcel->getActiveSheet()->setCellValue('G2', $objRichText_persegi);

  $objPHPExcel->setActiveSheetIndex(0)->mergeCells('H2:H3');
    $objPHPExcel->getActiveSheet()->getStyle('H2:H3')->applyFromArray($style_header);
	  $objPHPExcel->getActiveSheet()->setCellValue('H2', 'No Register');

  $objPHPExcel->setActiveSheetIndex(0)->mergeCells('I2:I3');
    $objPHPExcel->getActiveSheet()->getStyle('I2:I3')->applyFromArray($style_header);
	  $objPHPExcel->getActiveSheet()->setCellValue('I2', 'Tanggal');
  
  $objPHPExcel->setActiveSheetIndex(0)->mergeCells('J2:J3');
    $objPHPExcel->getActiveSheet()->getStyle('J2:J3')->applyFromArray($style_header);
	  $objPHPExcel->getActiveSheet()->setCellValue('J2', 'ILOK/PPT');
  
  $objPHPExcel->setActiveSheetIndex(0)->mergeCells('K2:K3');
    $objPHPExcel->getActiveSheet()->getStyle('K2:K3')->applyFromArray($style_header);
	  $objPHPExcel->getActiveSheet()->setCellValue('K2', 'Keterangan');


	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet()->getStyle('A')->applyFromArray($text_align_style);

	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);

	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getStyle('G')->applyFromArray($text_align_left);

	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(18);
    $objPHPExcel->getActiveSheet()->getStyle('H')->applyFromArray($text_align_style);

	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getStyle('I')->applyFromArray($text_align_style);

	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(18);
    $objPHPExcel->getActiveSheet()->getStyle('J')->applyFromArray($text_align_style);

	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
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
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $value->fungsi_bangunan);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $value->jenis_kegiatan);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $value->luas_tanah);
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $value->no_register);
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$row, dateFormat('d/m/Y',$value->tanggal));
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$row, $value->ilok_ppt);
		$objPHPExcel->getActiveSheet()->setCellValue('K'.$row, $value->keterangan);
		$row++;
	}

	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Laporan Tabel Permohonan PDRT.xls"');
	header('Cache-Control: max-age=0');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
  }
}
