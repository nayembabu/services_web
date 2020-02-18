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
	}

	function index() {
		$data['div_info'] = $this->home_model->getAllDivission();
		$this->load->view('home/headr');
		$this->load->view('home/home', $data);
		$this->load->view('home/footr');
	}

	function login() {
		echo "login page";
	}

	function sign_up() {
		echo "Signup Page";
	}
}
