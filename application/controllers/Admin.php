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
	}
}
