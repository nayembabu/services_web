<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Services Web
 * Author : Nayem Babu
 * FB Link : https://www.facebook.com/nayem.b
 */

class Login extends CI_Controller {
	
	function __construct() {
		parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('Upload');
        // $this->load->library('pdf');
        $this->load->model('home_model');
        $this->load->model('settings_model');
        $this->load->model('ion_auth_model');
    }

	function index() {
		$data['div_info'] = $this->settings_model->getAllDivission();
		$this->load->view('home/headr');
		$this->load->view('home/home', $data);
		$this->load->view('home/footr');
	}
	
	function getDistricById() {
		$div_iiddd = $this->input->get('div_id');		
		$data = $this->settings_model->getDistricByIDD($div_iiddd);
		echo json_encode($data);
	}

	function getUpazillaById() {
		$dis_iid = $this->input->get('dis_iid');		
		$data = $this->settings_model->getUpazillaByIDD($dis_iid);
		echo json_encode($data);	
	}

	function getUnionById() {
		$up_iid = $this->input->get('up_iid');		
		$data = $this->settings_model->getUnionByIDD($up_iid);
		echo json_encode($data);
	}		

	function cus_signup() {
		$full_name 		= $this->input->post('full_name');
		$password 		= $this->input->post('password');
		$mobile_no 		= $this->input->post('mobile_no');
		$usr_name 		= $this->input->post('usr_name');
		$email_no 		= $this->input->post('email_no');
		$div_iidd 		= $this->input->post('div_iidd');
		$dis_idi 		= $this->input->post('dis_idi');
		$up_iddii 		= $this->input->post('up_iddii');
		$un_iiidd 		= $this->input->post('un_iiidd');
		$full_address 	= $this->input->post('full_address');
		$hash_pass		= $this->ion_auth_model->hash_password($password);
		$time_s			= time();

		$s_data = array(
				'cus_full_name' 	=> $full_name, 
				'cus_mobile_no' 	=> $mobile_no, 
				'cus_email' 		=> $email_no,
				'div_iid' 			=> $div_iidd, 
				'dist_idd' 			=> $dis_idi, 
				'upazilla_iiidd' 	=> $up_iddii, 
				'union_iddi' 		=> $un_iiidd, 
				'parmanent_addres' 	=> $full_address 
			);
		$last_iniq_id = $this->home_model->insert_cus_data($s_data);

		$u_data = array(
				'email' 			=> $email_no, 
				'created_on'		=> $time_s,
				'password'			=> $hash_pass,
				'cus_iniq_id'		=> $last_iniq_id,
				'u_name'			=> $usr_name,
				'phone'				=> $mobile_no,
				'active'			=> '0'
			);
		$this->home_model->insert_user_tbl_data($u_data);
		redirect('/');
	}
}
