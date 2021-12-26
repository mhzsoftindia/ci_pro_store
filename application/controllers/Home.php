<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        if($this->session->userdata('logged_in')!=true){
            redirect('auth');
        }
    }
 
    public function index()
	{   
        $this->load->view('admin/templete/header');
		$this->load->view('admin/dashboard');
        $this->load->view('admin/templete/footer');
	}


}