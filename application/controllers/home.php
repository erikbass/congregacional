<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('pessoa_model');
		$this->load->library('masterpage');
		$this->load->model('visitante_model');
		$this->load->helpers('functions');

		if ($this->session->userdata('logged') == false){ redirect('login', 'refresh'); }
	}

	public function index()
	{
		$data['ultimos'] = $this->visitante_model->ultimos();

		$data['qtdehomens'] = $this->visitante_model->contagemPorSexo('m');
		$data['qtdemulheres'] = $this->visitante_model->contagemPorSexo('f');
		
		$this->masterpage->generatorPage('masterpage_default','visitante/ultimos',$data);	
	}

	public function informacoes(){
		$this->masterpage->generatorPage('masterpage_default','home/informacoes');	
	}
}	