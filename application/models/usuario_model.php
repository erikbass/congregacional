<?php
class Usuario_model extends CI_Model {

    function validate() {
        $this->db->where('login', $this->input->post('login')); 
        $this->db->where('senha', md5($this->input->post('senha')));

        $query = $this->db->get('usuario'); 

        if ($query->num_rows == 1) {
            return true;
        }
    }

    function logged() {
        $logged = $this->session->userdata('logged');

        if (!isset($logged) || $logged != true) {
            echo 'Voce nao tem permissao para entrar nessa pagina.';
            die();
        }
    }
}