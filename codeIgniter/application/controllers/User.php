<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('user/index');
        $this->load->view('template/footer');
    }

    public function getuser() {
        $data['user'] = $this->user_model->get_user();
        echo json_encode($data);
    }

    public function searchUser(){
        $value = $this->input->post('text');
        $query = $this->user_model->search_user($value);
        echo json_encode($query);
    }
    public function search_by_date(){
        $start = $this->input->post('inicio');
        $end = $this->input->post('fim');
        $data = $this->user_model->search_by_date($start, $end);
        echo json_encode($data);
    }

    public function save() {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'birthDate' => $this->input->post('birthDate'),
            'phoneNumber' => $this->input->post('phoneNumber')
        );
        $this->user_model->inserir_user($data);
    }

    public function edit($id) {
        $data['user'] = $this->user_model->get_user_by_id($id);
        $this->load->view('user/edit', $data);
    }

    public function atualizar() {
        $id = $this->input->post('id');
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'birthDate' => $this->input->post('birthDate'),
            'phoneNumber' => $this->input->post('phoneNumber')
        );
        var_dump($data);
        $this->user_model->update_user($id, $data);
        
    }

    public function deletar() {
        $id = $this->input->post('id');
        $this->user_model->delete_user($id);
        return true;
    }
}
?>