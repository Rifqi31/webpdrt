<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dataread extends CI_Controller {
	public $model = NULL;

	public function __construct() {
		parent:: __construct();
		// load database
		$this->load->database();
		// load model
		$this->load->Model('Dataread_model');
		$this->model = $this->Dataread_model;
		// load helper
		$this->load->helper('url');
    	$this->load->helper('form');
    	// load library
    	$this->load->library('form_validation');
    	$this->load->library('pagination');

    	if ($this->session->userdata('username') == "") {
      		redirect(base_url("login"));
    	}
	}


	public function index() {
		$data['rows_permo'] = $this->model->read_data_permo();
		$data['rows_kendali'] = $this->model->read_data_kendali();
		$this->load->view('leader_view/read_all_view', $data);
	}

	// for data permo

	public function read_data_permo() {
  		// pagination
	    $jumlah_data_permo = $this->model->jumlah_data_permo();
	    $config['base_url'] = base_url().'dataread/read_data_permo/';
	    $config['total_rows'] = $jumlah_data_permo;
	    $config['per_page'] = 20;

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
	    $this->load->view('leader_view/read_permo',$data);
	}

	public function search_permo() {
		$data_search = $this->input->post('data_keyword');

		$data['rows'] = $this->model->search_data_permo($data_search);
    	$this->load->view('leader_view/read_permo', $data);		
	}


	public function filter_permo() {
	    $filter_kecamatan = $this->input->post('kecamatan');
	    $filter_desa_kel = $this->input->post('desa_kel');
	    $filter_bangunan = $this->input->post('fungsi_bangunan');

	    $data['rows'] = $this->model->filter_data_permo($filter_kecamatan,$filter_desa_kel,$filter_bangunan);
	    $this->load->view('leader_view/read_permo', $data);
  	}

  	public function range_tanggal_permo() {
	    $first_date = $this->input->post('tgl_awal');
	    $last_date = $this->input->post('tgl_akhir');

	    $data['rows'] = $this->model->get_date_range_permo($first_date,$last_date);
	    $this->load->view('leader_view/read_permo', $data);
  	}




  	// for data kendali

  	public function read_data_kendali() {
  		$jumlah_data_kendali = $this->model->jumlah_data_kendali();
	     $config['base_url'] = base_url().'dataread/read_data_kendali/';
	     $config['total_rows'] = $jumlah_data_kendali;
	     $config['per_page'] = 20;

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
	      $this->load->view('leader_view/read_kendali',$data);
  	}


	  public function search_kendali() {
	    $data_search = $this->input->post('data_keyword');

	    $data['rows'] = $this->model->search_data_kendali($data_search);
	    $this->load->view('leader_view/read_kendali', $data);
	  }


	  // search specific data, field must filled
	  public function filter_kendali() {
	    $filter_kecamatan = $this->input->post('kecamatan');
	    $filter_desa_kel = $this->input->post('desa_kel');

	    $data['rows'] = $this->model->filter_data_kendali($filter_kecamatan,$filter_desa_kel);
	    $this->load->view('leader_view/read_kendali',$data);

	  }

	  // range date function
	  public function range_tanggal_kendali() {
	    $first_date = $this->input->post('tgl_awal');
	    $last_date = $this->input->post('tgl_akhir');

	    $data['rows'] = $this->model->get_date_range_kendali($first_date,$last_date);
	    $this->load->view('leader_view/read_kendali',$data);
	  }


}