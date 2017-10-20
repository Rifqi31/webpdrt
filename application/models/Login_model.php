<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {
	

	public function cek_user($data) {
			$query = $this->db->get_where('admin', $data);
			return $query;
		}

}