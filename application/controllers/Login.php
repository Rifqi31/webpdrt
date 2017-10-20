<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	public $model = NULL;

	public function __construct() {
		parent::__construct();
		$this->load->model('Login_model');
		$this->model = $this->Login_model;

	}

	public function index() {
		$this->load->view('core_view/login_view');
	}

	public function cek_login() {

		$this->form_validation->set_rules('username','Username','required',
			array('required' => 'Anda harus mengisi username'));

		$this->form_validation->set_rules('password','Password','required',
			array('required' => 'Anda harus mengisi password'));

		if ($this->form_validation->run() == TRUE) {

			$data = array('username' => $this->input->post('username', TRUE),
							'password' => md5($this->input->post('password', TRUE))
				);
			$hasil = $this->model->cek_user($data);
			if ($hasil->num_rows() == 1) {
				foreach ($hasil->result() as $sess) {
					$sess_data['logged_in'] = 'Sudah Loggin';
					$sess_data['id'] = $sess->id;
					$sess_data['username'] = $sess->username;
					$sess_data['level'] = $sess->level;
					$this->session->set_userdata($sess_data);
				}
				if ($this->session->userdata('level')=='admin_permo') {
					redirect(base_url('pdrtcrud'));
				}
				elseif ($this->session->userdata('level')=='admin_kendali') {
					redirect(base_url('kendalicrud'));
				}
				elseif ($this->session->userdata('level')=='admin_read_data') {
					redirect(base_url('dataread'));
				}		
			} else {
			 $this->load->view('core_view/login_view');
			}
		}else{
			$this->load->view('core_view/login_view');
		}
	}

	public function logout() {

    	$this->session->sess_destroy();
    	redirect(base_url("login"));
	}

}