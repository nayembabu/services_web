<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * Services Web
 * Author : Nayem Babu
 * FB Link : https://www.facebook.com/nayem.b
 */

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
<<<<<<< HEAD
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('Upload');
		$this->load->model('notification_model');
		$this->load->helper('date');
		// $this->load->library('pdf');
	}

	public function index()
	{
		$data = array();
		$data['title'] = 'Admin Dashboard';
		$data['notifications'] = $this->notification_model->get_latest_notifications();
		$data['count_rows'] = $this->notification_model->count_all();
		$data['content'] = $this->load->view('dashboard/main-content', $data, true);

		// load main dashboard 
		$this->load->view('dashboard/index', $data);
	}

	function login()
	{
		echo "login page";
	}

	function sign_up()
	{
		echo "Signup Page";
=======
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('Upload');
        $this->load->model('admin_model');
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
            $img_url = "uplode_img/requ_upload_img/" . $config['file_name'];
            $data = array(
                'img_upload_url' 		=> $img_url,
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
>>>>>>> e283eefd96ad20ec487d0dd6f8b9b12e6c7af747
	}
}
