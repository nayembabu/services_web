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

	function UserDeleteFromUser($ThisUser_rqs) {
		$this->db->where('id', $ThisUser_rqs);		
		$this->db->delete('users');
	}

	function UserDeleteFromCus_full($CusUniq) {		
		$this->db->where('cus_iid', $CusUniq);		
		$this->db->delete('customer_full');
	}

	function DeleteRequestNomber($up_data, $ThisRqs_iddi) {
		$this->db->where('requ_uniq_iiiid', $ThisRqs_iddi);
		$this->db->update('nid_request', $up_data);
	}

	function DeleteCostforThisSer($ThisRqs_iddi) {	
		$this->db->where('services_uniq_iiddd', $ThisRqs_iddi);
		$this->db->delete('cus_service_cost');	
	}

	function getAdvancePay() {
		$this->db->where('confirm_status', '0');
		$this->db->join('customer_full', 'customer_full.cus_iid = advnc_pay_query.user_uniq_auto_iddi', 'left');
		$this->db->join('divisions', 'divisions.div_id = customer_full.div_iid', 'left');
		$this->db->join('districts', 'districts.dis_id = customer_full.dist_idd', 'left');
		$this->db->join('upazilas', 'upazilas.up_id = customer_full.upazilla_iiidd', 'left');
		$this->db->join('unions', 'unions.un_id = customer_full.union_iddi', 'left');
		$sql = $this->db->get('advnc_pay_query');
		return $sql->result();		
	}

	function getAdvancePayByID($ThisUser_rqs) {
		$this->db->where('advnc_pay_query_iidd', $ThisUser_rqs);
		$sql = $this->db->get('advnc_pay_query');
		return $sql->row();				
	}

	function InsertCusPays($f_data) {
		$this->db->insert('cus_amount_payable', $f_data);
	}

	function UpdateAdvancePayTbl($c_datas, $ThisUser_rqs) {
		$this->db->where('advnc_pay_query_iidd', $ThisUser_rqs);
		$this->db->update('advnc_pay_query', $c_datas);		
	}
}





