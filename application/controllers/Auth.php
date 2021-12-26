<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // $this->load->library(array('session','form_validation'));
        $this->load->database();
    }

	public function index()
	{
		$this->load->view('admin/login');
	}

    public function login()
    {

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = array("staus" => 401, "msg" => validation_errors());
            echo json_encode($response);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $q = $this->db->query("SELECT * from user where email='$email' and password='$password'");
            if ($q->num_rows() > 0) {
                $user_data = [
                    "username" => $email,
                    "logged_in" => true
                ];

                $this->session->set_userdata($user_data);
                //   redirect('home');
                $response = array("status" => 200, "msg" => "Logged in Successfully", "redirect_url" => base_url('home'));
                echo json_encode($response);
            } else {
                $response = array("status" => 401, "msg" => "Invalid email and password");
                echo json_encode($response);
            }
        }
    }

    public function register()
	{
		$this->load->view('admin/register');
	}

    public function insert_user()
	{
		// print_r($this->input->post());
        $name=$this->input->post('name');
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        // $conf_pass=$this->input->post('conf_pass');
         
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('conf_pass', 'Password Confirmation', 'required|matches[password]');
        
        if($this->form_validation->run() == FALSE)
        {
            $response=array("staus"=>401,"msg"=>validation_errors());
            echo json_encode($response);
              
        }
        else
        {
            $user_data=[
                'name'=>$name,
                'email'=>$email,
                'password'=>$password
            ];
            
            $q=$this->db->insert('user',$user_data);
            if($q){
                 $response=array("status"=>200,"msg"=>"Registered successfully please login to continue","redirect_url" => base_url('auth'));
                 echo json_encode($response);
            }else{
                $response=array("status"=>401,"msg"=>"Some Error");
                echo json_encode($response);
            }
        }
	}

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }

}
