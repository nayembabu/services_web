<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Pub_model extends CI_Model {
	
	function __construct() {
        parent::__construct();
        $this->load->database();
	}

	function getCusRequbyDate($requUser, $thisData) {
		$this->db->order_by('requ_uniq_iiiid', 'desc');
		$this->db->where('cus_inq_id', $requUser);
		$this->db->where('this_date', $thisData);
		$sql = $this->db->get('nid_request');
		return $sql->result();
	}

	function getAllServices() {
		$sql = $this->db->get('service_info_s');
		return $sql->result();		
	}

	function insert_new_data($full_data) {
		$this->db->insert('nid_request', $full_data);
		return $this->db->insert_id();
	}

	function getAllAmount($requUser) {
        $this->db->select_sum('payable_amount');
		$this->db->where('cus_user_uniq_iidd', $requUser);
		$sql = $this->db->get('cus_amount_payable');
        return $sql->row()->payable_amount;
	}

	function getAllCost($requUser) {
        $this->db->select_sum('this_service_amount');
        $this->db->where('cus_user_unique_iddid', $requUser);
        $query = $this->db->get('cus_service_cost');
        return $query->row()->this_service_amount;
	}

	function insert_new_requ_cost($c_data) {		
		$this->db->insert('cus_service_cost', $c_data);
	}

	function getservice_infoby_iddi($ser_iidid) {
		$this->db->where('service_uniq_iddi', $ser_iidid);
		$sql = $this->db->get('service_info_s');
		return $sql->row();		
	}

	function getAllmblBankOperator() {
		$sql = $this->db->get('mobile_bank_opt');
		return $sql->result();	
	}

	function getmblNoby_iddi($mbl_iidid) {
		$this->db->where('mbl_bank_iddidididi', $mbl_iidid);
		$sql = $this->db->get('mbl_bank_infoss');
		return $sql->result();			
	}

	function add_Advance_Pay($pay_data) {
		$this->db->insert('advnc_pay_query', $pay_data);
	}

	function CheckThisRequNumber($slip_num, $requUser) {
		$sqlWhere = array(
					'query_numbr' => $slip_num,
					'cus_inq_id'  => $requUser,
					'status' 	  => '0',
					);
		$this->db->where($sqlWhere);
		$sql = $this->db->get('nid_request');
		return $sql->row();
	}

	function DownloadComplete($thisRequIdd, $data_ss) {
		$this->db->where('requ_uniq_iiiid', $thisRequIdd);
		$this->db->update('nid_request', $data_ss);
	}
}