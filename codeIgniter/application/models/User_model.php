<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_user() {
        return $this->db->get('user')->result();
    }

    public function inserir_user($data) {
        $this->db->insert('user', $data);
    }

    public function get_user_by_id($id) {
        return $this->db->get_where('user', array('id' => $id))->row();
    }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function delete_user($id) {
        $this->db->where('id', $id);
        $this->db->delete('user');
        if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
    }
    public function search_user($search) {
        $field = array('name','email');    
        $this->db->like('concat('.implode(',',$field).')',$search);
        $query = $this->db->get('user');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
    public function search_by_date($start_date, $end_date){
        $start_date ? $this->db->where('birthDate >=', $start_date) : '';
        $end_date ? $this->db->where('birthDate <=', $end_date) : '';
        $query = $this->db->get('user');
        return $query->result();
    }
    
}
?>