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
        // $this->load->library('pdf');
	}

	function index() {
		$data = array();
		$data['title'] = 'Admin Dashboard';
		$data['content'] = $this->load->view('dashboard/main-content', $data, true);
		// load main dashboard 
		$this->load->view('dashboard/index', $data);
	}

	function login() {
		echo "login page";
	}

	function sign_up() {
		echo "Signup Page";
	}
}
