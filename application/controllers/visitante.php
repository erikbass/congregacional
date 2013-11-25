<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class visitante extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('visitante_model');
			$this->load->model('pessoa_model');
			$this->load->helpers('functions');
			$this->load->library('masterpage');

			if ($this->session->userdata('logged') == false){ redirect('login', 'refresh'); }
		}

		function index(){
			$data['list'] = $this->visitante_model->recuperaTodos();
			$this->masterpage->generatorPage('masterpage_default','visitante/index',$data);
		}

		function visualizar()
		{
			$visitanteId = $this->uri->segment(3,0);
			if($visitanteId == 0)
			{
				redirect('visitante');
			}
			else
			{
				$data['visitante'] = $this->visitante_model->recuperaPorId($visitanteId);
				$this->masterpage->generatorPage('masterpage_default','visitante/visualizar',$data);
			}
		}

		function novo(){
			$this->load->helper(array('form','url'));
			$this->load->library('form_validation');

			////////////////////// Tratando os erros
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_message('required', '<strong> %s </strong> é um campo obrigatório!');

			$this->form_validation->set_rules('nome','Nome','required');
			$this->form_validation->set_rules('telefone','Telefone','required');
			$this->form_validation->set_rules('email','Email', 'required');
			$this->form_validation->set_rules('bairro','Bairro','required');
			$this->form_validation->set_rules('rua_numero','Rua/Numero','required');
			$this->form_validation->set_rules('data', 'Data da visita', 'required');

			if($this->form_validation->run() == true){
				if(count($_POST) > 0)
				{
					$_POST['status'] = 3;
					//$idPessoa = $this->pessoa_model->criar($_POST);
					$this->visitante_model->criar($_POST);

					redirect('visitante/novo?result=success');
				}
			}
			
			$this->masterpage->generatorPage('masterpage_default','visitante/novo');
		}

		function ultimos(){
			$data['ultimos'] = $this->visitante_model->ultimos();

			$data['qtdehomens'] = $this->visitante_model->contagemPorSexo('m');
			$data['qtdemulheres'] = $this->visitante_model->contagemPorSexo('f');
			
			$this->masterpage->generatorPage('masterpage_default','visitante/ultimos',$data);
		}
	}
?>