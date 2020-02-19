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
        // $this->load->library('pdf');
        if (!$this->ion_auth->logged_in()) {
            redirect('/', 'refresh');
        }
        if ($this->ion_auth->in_group(array('admin'))) {
            redirect('auth/logout');
        }
	}

	function index() {
		$this->load->view('pub/pub_home');
	}

	function login() {
		echo "login page";
	}

	function sign_up() {
		echo "Signup Page";
	}
}
