<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Services Web
 * Author : Nayem Babu
 * FB Link : https://www.facebook.com/nayem.b
 */

class Admin extends CI_Controller {
	
	function __construct() {
		parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('Upload');
        $this->load->model('admin_model');
        $this->load->library('Ion_auth');
        $this->load->model('settings_model');
        $this->load->model('ion_auth_model');
        // $this->load->library('pdf');
	}

	function index() {
		$this->load->view('dashboard/index');
		$this->load->view('dashboard/home');
		$this->load->view('dashboard/footer');
	}

	function home() {
		$this->load->view('dashboard/index');
		$this->load->view('dashboard/admin_home');
		$this->load->view('dashboard/footer');
	}

	function sign_up_user() {
		$this->load->view('dashboard/index');
		$this->load->view('dashboard/approve_user');
		$this->load->view('dashboard/footer');		
	}

	function getAllReqforupload() {
		$data = $this->admin_model->getAllRequforUpload();
		echo json_encode($data);
	}

	function fileUploadForThisIDD() {

        $This_Requ_id = $this->input->post('id');
        $thisTimestamp_ss = time();
        $now_this_date = date('Y-m-d', time());

		$AdminUser = $this->ion_auth->user()->row()->cus_iniq_id;

        $file_name = $_FILES['file']['name'];
        $file_name_pieces = explode('_', $file_name);
        $new_file_name = '';
        $count = 1;
        foreach ($file_name_pieces as $piece) {
            if ($count !== 1) {
                $piece = ucfirst($piece);
            }
            $new_file_name .= $piece;
            $count++;
        }
        $config = array(
            'file_name' => $new_file_name,
            'upload_path' => "./uplode_img/requ_upload_img/",
            'allowed_types' => "*", // All Kinds of file Accept
            'overwrite' => False,
            'max_size' => "20480000", // Can be set to particular file size , here it is 200 MB(2048 Kb)
            'max_height' => "1768",
            'max_width' => "2024"
        );
        $this->load->library('Upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $path = $this->upload->data();
            // Upload in Folder
            $img_urlName = "uplode_img/requ_upload_img/" . $config['file_name'];
            $data = array(
                'img_upload_url' 		=> $img_urlName,
                'status'				=> '1',
                'img_uplaod_time'		=>	$thisTimestamp_ss,
                'upload_this_date_ss'	=>	$now_this_date,
                'admn_unq_id'			=>	$AdminUser                  
                );
            $this->admin_model->update_ThisRequ_file($This_Requ_id, $data);

        } 
	}

	function getAllReqUserForApprove() {
		$data = $this->admin_model->getUser_requ();
		echo json_encode($data);
	}

	function UserApproved_ss() {
		$ThisUser_rqs = $this->input->get('ThisUser_rqs');
		$c_data_s = array(
						'active' => '1',
					);
		$this->admin_model->UserControlApprove($ThisUser_rqs, $c_data_s);

		$f_data_ss = array(
						'user_id' 	=> $ThisUser_rqs,
						'group_id'	=>	'2',	 
					);
		$this->admin_model->UserInsertGroup($f_data_ss);
	}

	function UserReject_ss() {
		$ThisUser_rqs = $this->input->get('ThisUser_rqs');
		$CusUniq = $this->input->get('CusUniq');
		$this->admin_model->UserDeleteFromUser($ThisUser_rqs);
		$this->admin_model->UserDeleteFromCus_full($CusUniq);
	}

	function FormReject_s() {
		$ThisRqs_iddi = $this->input->get('ThisRqs_iddi');
		$up_data = array(
					'status' => '2', 
				);
		$this->admin_model->DeleteRequestNomber($up_data, $ThisRqs_iddi);
		$this->admin_model->DeleteCostforThisSer($ThisRqs_iddi);
	}

	function getAllAdvance() {
		$this->load->view('dashboard/index');
		$this->load->view('dashboard/advance_pay');
		$this->load->view('dashboard/footer');		
	}

	function getAllAdvancePayment() {
		$data = $this->admin_model->getAdvancePay();
		echo json_encode($data);		
	}

	function AdvancePaymentApprove() {
		$ThisUser_rqs = $this->input->get('ThisUser_rqs');
		$AdminUser = $this->ion_auth->user()->row()->cus_iniq_id;
		$AdvancePayInfo = $this->admin_model->getAdvancePayByID($ThisUser_rqs);

		$f_data = array(
					'payable_amount' 			=> $AdvancePayInfo->send_tk_amount, 
					'cus_user_uniq_iidd' 		=> $AdvancePayInfo->user_uniq_auto_iddi,
					'confirm_admin_uniq_a_iddd' => $AdminUser,
					'confirms_timesss' 			=> time(),
					'advance_query_iiddd' 		=> $AdvancePayInfo->advnc_pay_query_iidd,
					'payable_tr_idddd' 			=> $AdvancePayInfo->send_tr_iidd,
				);
		$this->admin_model->InsertCusPays($f_data);

		$c_datas = array(
						'confirm_status' 	=> '1',
						'confirm_timestamp' => time(),
						'confirm_user_iidd' => $AdminUser, 
					);
		$this->admin_model->UpdateAdvancePayTbl($c_datas, $ThisUser_rqs);
	}

	function AdvPayReject_ss() {
		$ThisUser_rqs = $this->input->get('ThisPay_rqs');
		$c_datas = array(
						  'confirm_status' => '2', 
					  );
		$this->admin_model->UpdateAdvancePayTbl($c_datas, $ThisUser_rqs);
	}
}
