<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Admin_model extends CI_Model {
	
	function __construct() {
        parent::__construct();
        $this->load->database();
	}

	function getAllRequforUpload() {
		$this->db->where('status', '0');
		$sql = $this->db->get('nid_request');
		return $sql->result();
	}

	function update_ThisRequ_file($This_Requ_id, $data) {
		$this->db->where('requ_uniq_iiiid', $This_Requ_id);
		$this->db->update('nid_request', $data);
	}

	function getUser_requ() {
		$this->db->where('active', '0');
		$this->db->join('customer_full', 'customer_full.cus_iid = users.cus_iniq_id', 'left');
		$this->db->join('divisions', 'divisions.div_id = customer_full.div_iid', 'left');
		$this->db->join('districts', 'districts.dis_id = customer_full.dist_idd', 'left');
		$this->db->join('upazilas', 'upazilas.up_id = customer_full.upazilla_iiidd', 'left');
		$this->db->join('unions', 'unions.un_id = customer_full.union_iddi', 'left');
		$sql = $this->db->get('users');
		return $sql->result();
	}

	function UserControlApprove($ThisUser_rqs, $c_data_s) {
		$this->db->where('id', $ThisUser_rqs);
		$this->db->update('users', $c_data_s);
	}

	function UserInsertGroup($f_data_ss) {
		$this->db->insert('users_groups', $f_data_ss);
	}
}





