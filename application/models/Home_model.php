<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Home_model extends CI_Model {
	
	function __construct() {
        parent::__construct();
        $this->load->database();
	}

	function insert_cus_data($s_data) {
		$this->db->insert('customer_full',$s_data);
		    return $this->db->insert_id();
	}

	function insert_user_tbl_data($u_data) {
		$this->db->insert('users', $u_data);		
	}

}