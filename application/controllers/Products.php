<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // $this->load->library(array('session','form_validation'));
        $this->load->database();
        $this->load->model('product_model');
    }

    public function index()
    {
        $data['data'] = $this->product_model->get_product();
        // print_r($data);
        // exit();
        $this->load->view('admin/templete/header');
        $this->load->view('admin/products/product_list', $data);
        $this->load->view('admin/templete/footer');
    }

    public function create_product()
    {
        $this->load->view('admin/templete/header');
        $this->load->view('admin/products/product_add');
        $this->load->view('admin/templete/footer');
    }

    public function add()
    {   
        $img=time().$_FILES['prod_img']['name'];
        $config['upload_path']          = 'uploads/';
        $config['allowed_types']        = "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF";
        // $config['max_size']             = 100;
        $config['max_width']            = 2048;
        // $config['max_height']           = 768;
        $config['file_name']           = $img;

        $this->load->library('upload',$config);
        
        if ($this->upload->do_upload('prod_img'))
        {
            $data = array('upload_data' => $this->upload->data());

            // $this->load->view('upload_success', $data);
            print_r($data);

        }
        else
        {
              
                $error = array('error' => $this->upload->display_errors());

                // $this->load->view('upload_form', $error);
                 print_r($error);
        }
       
        exit();  
        $this->form_validation->set_rules('prod_name', 'Name', 'required');
        $this->form_validation->set_rules('prod_sku', 'SKU', 'required');
        $this->form_validation->set_rules('prod_price', 'Price', 'required');
        $this->form_validation->set_rules('prod_descr', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/templete/header');
            $this->load->view('admin/products/product_add');
            $this->load->view('admin/templete/footer');
        } else {
            $data = [
                'name' => $this->input->post('prod_name'),
                'sku' => $this->input->post('prod_sku'),
                'price' => $this->input->post('prod_price'),
                'description' => $this->input->post('prod_descr')
            ];

            $res = $this->product_model->insert_prod($data);
            if ($res) {
                redirect('products/');
            } else {
                echo  "Error";
            }
        }
    }

    public function edit($id)
    {
        $data['product'] = $this->product_model->get_by_id($id);
        $this->load->view('admin/templete/header');
        $this->load->view('admin/products/product_edit', $data);
        $this->load->view('admin/templete/footer');
    }

    public function update($id)
    {
        $data = [
            'name' => $this->input->post('prod_name'),
            'sku' => $this->input->post('prod_sku'),
            'price' => $this->input->post('prod_price'),
            'description' => $this->input->post('prod_descr')
        ];
        $res = $this->product_model->update_prod($data, $id);
        if ($res) {
            redirect('products/');
        } else {
            echo  "Error";
        }
    }

    public function delete($id)
    {
        $res = $this->product_model->delete_prod($id);

        if ($res) {
            redirect('products/');
        } else {
            echo "Error";
        }
    }
}
