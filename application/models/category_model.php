<?php

class category_model extends CI_Model {


    public function insert_category($data){

        $this->db->insert('product_category',$data);
        return true;
    }

    public function get_category(){

        $q=$this->db->get('product_category');
        return $q->result();
    }

    public function get_by_id($id){
          $this->db->where('id',$id);
          $q=$this->db->get('product_category');
          return $q->row();
    }

    public function update_cat($data,$id){
       
        $this->db->where('id',$id);
        $this->db->update('product_category',$data);
        return true;
    }

    public function delete_cat($id){
        $this->db->where('id',$id);
        $this->db->delete('product_category');
        return true;
    }


}