<?php

class product_model extends CI_Model {


    public function insert_prod($data){

        $this->db->insert('product',$data);
        return true;
    }

    public function get_product(){

        $q=$this->db->get('product');
        return $q->result();
    }

    public function get_by_id($id){
          $this->db->where('id',$id);
          $q=$this->db->get('product');
          return $q->row();
    }

    public function update_prod($data,$id){
        $this->db->where('id',$id);
        $this->db->update('product',$data);
        return true;
    }
    public function delete_prod($id){
        $this->db->where('id',$id);
        $this->db->delete('product');
        return true;
    }


}