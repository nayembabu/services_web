<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Settings_model extends CI_Model {
	
	function __construct() {
        parent::__construct();
        $this->load->database();
	}


	function getAllDivission() {
		$sql = $this->db->get('divisions');
		return $sql->result();
	}

	function getDistricByIDD($div_iiddd) {
		$this->db->where('division_id', $div_iiddd);
		$sql = $this->db->get('districts');
		return $sql->result();
	}

	function getUpazillaByIDD($dis_iid) {
		$this->db->where('district_id', $dis_iid);
		$sql = $this->db->get('upazilas');
		return $sql->result();		
	}

	function getUnionByIDD($up_iid) {
		$this->db->where('upazila_id', $up_iid);
		$sql = $this->db->get('unions');
		return $sql->result();
	}
}