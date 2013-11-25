<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class pessoa extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper(array('form', 'url'));
			$this->load->model('pessoa_model');
			$this->load->model('visitante_model');
			$this->load->helper('functions');
			$this->load->library('masterpage');

			if ($this->session->userdata('logged') == false){ redirect('login', 'refresh'); }

			// para topo
			$data['lastvisitantes'] = $this->visitante_model->recuperaPorId(1);
		}

		function index(){
			$data['list'] = $this->pessoa_model->recuperaTodosAtivos();
			$this->masterpage->generatorPage('masterpage_default','pessoa/index',$data);
		}

		function visualizar()
		{

			$pessoaId = $this->uri->segment(3,0);

			if($pessoaId == 0)
			{
				redirect('pessoa');
			}
			else
			{
				$data['pessoa'] = $this->pessoa_model->recuperaPorId($pessoaId);
				$this->masterpage->generatorPage('masterpage_default','pessoa/visualizar',$data);
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


			if($this->form_validation->run() == true){
				if(count($_POST) > 0)
				{
					$this->pessoa_model->criar($_POST);
					redirect('pessoa/novo?result=success');
				}
			}
			
			$this->masterpage->generatorPage('masterpage_default','pessoa/novo');
		}

		function editar($id = 0){
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

			if(count($_POST) == 0){
				$data['pessoa'] = $this->pessoa_model->recuperaPorId($id);
				$this->masterpage->generatorPage('masterpage_default','pessoa/editar',$data);
			}


			if($this->form_validation->run() == true){
				if(count($_POST) > 0)
				{
					$idPessoa = $this->pessoa_model->atualizar($_POST);
					redirect("pessoa/editar/$idPessoa?result=success");
				}
			}
			
			//$this->masterpage->generatorPage('masterpage_default','pessoa/editar');
		}

		function excluir($id){
			
			$idPessoa = $this->pessoa_model->excluir($id);
			redirect("pessoa?result=success");		
		}

		function do_upload($id)
		{
			$config['upload_path'] = './fotos/';
			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);


			if (! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('visualizar/$id?result=error', $error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$foto = $data['upload_data']['file_name'];
				$sql = "UPDATE 
							pessoa
	   					SET 
	   						foto = '$foto'
	 					WHERE 
	 						id = $id";
				$this->db->query($sql);

				redirect("pessoa/visualizar/$id?result=success");
			}
		}
	}
?>