<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // $this->load->library(array('session','form_validation'));
        $this->load->database();
    }

    public function index(){
        $this->load->view('email_form');
    }

    public function send_mail() { 
        $from_email = "mhzsoftindia@gmail.com"; 
        $to_email = $this->input->post('to_email'); 

        $config = Array(
            'protocol' => 'sendmail',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 587,
            'smtp_user' => 'mhzsoftindia@gmail.com',
            'smtp_pass' => '07156@zub',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        //Load email library 
        // $this->load->config('email');
        // $this->email->initialize($config);
        $this->load->library('email',$config); 
  
        $this->email->from($from_email, 'Zubair Mirza'); 
        $this->email->to($to_email);
        $this->email->subject('Email Test'); 
        $this->email->message('Testing the email class.'); 
  
        //Send mail 
        if($this->email->send()) {
            echo "Send Succcess";
        }else{
            echo "error";
            show_error($this->email->print_debugger());   
        }
     
     } 
}