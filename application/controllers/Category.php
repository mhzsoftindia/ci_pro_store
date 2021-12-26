<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // $this->load->library(array('session','form_validation'));
        $this->load->database();
        $this->load->model('category_model');
    }
    
    public function index(){
        $data['data'] = $this->category_model->get_category();
        $this->load->view('admin/templete/header');
        $this->load->view('admin/category/category_list',$data);
        $this->load->view('admin/templete/footer');
    }

    public function create_category()
    {
        $this->load->view('admin/templete/header');
        $this->load->view('admin/category/category_add');
        $this->load->view('admin/templete/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('cat_name', 'Category Name', 'required');
        $this->form_validation->set_rules('cat_descr', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/templete/header');
            $this->load->view('admin/category/category_add');
            $this->load->view('admin/templete/footer');
        } else {

            $data = [
                'category_name' => $this->input->post('cat_name'),
                'description' => $this->input->post('cat_descr')
            ];

            $res = $this->category_model->insert_category($data);
            if ($res) {
                redirect('category/');
            } else {
                echo  "Error";
            }
        }
    }

    public function edit($id)
    {
        $data['data'] = $this->category_model->get_by_id($id);
        $this->load->view('admin/templete/header');
        $this->load->view('admin/category/category_edit', $data);
        $this->load->view('admin/templete/footer');
    }

    public function update($id)
    {
        $data = [
            'category_name' => $this->input->post('cat_name'),
            'description' => $this->input->post('cat_descr')
        ];

        // print_r($data);
        // exit;

        $res = $this->category_model->update_cat($data,$id);
        if ($res) {
            redirect('category/');
        } else {
            echo  "Error";
        }
    }

    public function delete($id)
    {
        $res = $this->category_model->delete_cat($id);

        if ($res) {
            redirect('category/');
        } else {
            echo "Error";
        }
    }


}