<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->library('form_validation');

        if($_POST){
            $this->form_validation->set_rules('login', 'Login', 'required');
            $this->form_validation->set_rules('senha', 'senha', 'required');
            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
            $this->form_validation->set_message('required', '<strong style="text-transform: capitalize;"> %s </strong> é um campo obrigatório!');

            $this->load->model('usuario_model', 'usuario');
            $this->load->model('pessoa_model');

            $query = $this->usuario->validate();

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login/index');
            } else {
                if ($query) {
                    $nome = $this->pessoa_model->recuperaNome();
                    $data = array(
                        'login' => $this->input->post('login'),
                        'logged' => true,
                        'usuario' => $nome
                    );
                    $this->session->set_userdata($data);
                    redirect('visitante/ultimos');
                } else {
                    echo "<script type='text/javascript'>alert('Some text');</script>";
                    redirect('login');
                }
            }
        } else {
            $this->load->view('login/index');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('logged');
        @session_destroy();
        redirect('home', 'refresh');
    }
}