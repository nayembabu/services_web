<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Services Web
 * Author : Nayem Babu
 * FB Link : https://www.facebook.com/nayem.b
 */

class Pub extends CI_Controller {
	
	function __construct() {
		parent::__construct();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('Upload');
        $this->load->model('ion_auth_model');
        $this->load->model('pub_model');
        // $this->load->library('pdf');
        if (!$this->ion_auth->logged_in()) {
            redirect('/', 'refresh');
        }
        if ($this->ion_auth->in_group(array('admin'))) {
            redirect('auth/logout');
        }
	}

	function index() {
		$requUser = $this->ion_auth->user()->row()->cus_iniq_id;
		$data['servic_list'] = $this->pub_model->getAllServices();
		$data['mbl_bank'] = $this->pub_model->getAllmblBankOperator();
		$this->load->view('home/headr');
		$this->load->view('pub/pub_home', $data);
		$this->load->view('home/footr');
	}

	function getRequestByIDandDate() {         
		$qurDate = $this->input->get('qurDate');
		$requUser = $this->ion_auth->user()->row()->cus_iniq_id;
		$thisData = '';
		if (empty($qurDate)) {
			$thisData = date('Y-m-d', time());
		}else {
			$thisData = date('Y-m-d', strtotime($qurDate));
		}
		$data = $this->pub_model->getCusRequbyDate($requUser, $thisData);
		echo json_encode($data);
	}

	function insert_new_request() {
		$slip_num 					= $this->input->post('slip_num');
		$br_date 					= $this->input->post('br_date');
		$per_name 					= $this->input->post('per_name');
		$servcs_rate 				= $this->input->post('servicesss_rate');
		$services_list_name 		= $this->input->post('services_list_name');
		$App_type_text 				= $this->input->post('App_type_text');
		$services_opt_sss 			= $this->input->post('services_opt_sss');

		$now_time					= time();
		$now_date					= date('Y-m-d', time());
		$requUser 					= $this->ion_auth->user()->row()->cus_iniq_id;

		$check = $this->pub_model->CheckThisRequNumber($slip_num, $requUser);

		if (empty($check)) {
			$full_data = array(
					'cus_inq_id' 		=> $requUser, 
					'query_numbr' 		=> $slip_num, 
					'requ_birth' 		=> $br_date, 
					'query_name_des' 	=> $per_name, 
					'requ_time_stamp' 	=> $now_time, 
					'this_date' 		=> $now_date, 
					'service_unq_idd' 	=> $services_list_name, 
					'requ_emar_stats' 	=> $App_type_text, 
					'requ_type' 		=> $services_opt_sss
				);
			$last_insrt = $this->pub_model->insert_new_data($full_data);

			$c_data = array(
					'services_uniq_iiddd' 		=> $last_insrt, 
					'this_service_amount' 		=> $servcs_rate, 
					'cus_user_unique_iddid' 	=> $requUser, 
					'this_times' 				=> $now_time, 
					'cost_this_datess' 			=> $now_date, 
					'services_info_idiidi' 		=> $services_list_name, 
					'app_type_text' 			=> $App_type_text 
				);
			$this->pub_model->insert_new_requ_cost($c_data);
		}
		exit();
	}

	function services_balance_query() {
		$requUser = $this->ion_auth->user()->row()->cus_iniq_id;
		$data['user_amount'] = $this->pub_model->getAllAmount($requUser);
		$data['servic_cost'] = $this->pub_model->getAllCost($requUser);
		echo json_encode($data);
	}

	function getServices_Info_s() {
		$ser_iidid = $this->input->get('ser_iidid');
		$data = $this->pub_model->getservice_infoby_iddi($ser_iidid);
		echo json_encode($data);
	}

	function getMobileNoByOptIDDI() {
		$mbl_iidid = $this->input->get('mbl_iidid');
		$data = $this->pub_model->getmblNoby_iddi($mbl_iidid);
		echo json_encode($data);
	}

	function saveAdvancePaymentRequest() {
		$requUser 			= $this->ion_auth->user()->row()->cus_iniq_id;
		$mblBankOptIdd 		= $this->input->post('mblBankOptIdd');
		$send_num_sss 		= $this->input->post('send_num_sss');
		$recev_num_srs 		= $this->input->post('recev_num_srs');
		$tr_iidi_tr 		= $this->input->post('tr_iidi_tr');
		$tk_amount_ss 		= $this->input->post('tk_amount_ss');
		$this_timeee		= time();

		$pay_data = array(
			'user_uniq_auto_iddi' 		=> $requUser, 
			'mbl_bank_i_opt_d_didididi' => $mblBankOptIdd, 
			'pay_from_num' 				=> $send_num_sss, 
			'advnc_pay_receive_no' 		=> $recev_num_srs, 
			'send_tr_iidd' 				=> $tr_iidi_tr, 
			'send_tk_amount' 			=> $tk_amount_ss, 
			'entry_time_sss' 			=> $this_timeee 
		);
		$this->pub_model->add_Advance_Pay($pay_data);
	}

	function saveDownloadStatus() {
		$thisRequIdd = $this->input->post('thisRequIdd');
			$data_ss = array( 'download_status' => '1', );
		$this->pub_model->DownloadComplete($thisRequIdd, $data_ss);
	}
}



				
				
				
				
				
