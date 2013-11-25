<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MasterPage{
	private $masterPage = '';
	private $contentPages = array();
	private $ci = null;

	public function __construct($masterPage = ''){
		$this->CI = get_instance();
		if(!empty($masterPage)){
			$this->setMasterPage($masterPage);
		}
	}

	public function setMasterPage($masterPage){
		if(!file_exists(APPPATH.'views/'.$masterPage.EXT)){
			throw new Exception(APPPATH.'views/'.$masterPage.EXT);			
		}

		$this->masterPage = $masterPage;
	}

	public function getMasterPage(){
		return $this->masterPage;
	}

	public function addContentPage($file,$tag,$content=array()){
		$this->contentPages[$tag] = $this->CI->load->view($file,$content,true);
	}

	public function show($content = array()){
		$masterPage = $this->CI->load->view($this->masterPage,$content,true);
		
		foreach ($this->contentPages as $tag => $content) {
			$masterPage = str_replace('<mp:'.ucfirst(strtolower($tag)).'/>', $content, $masterPage);
		}

		echo $masterPage;
	}

	public function generatorPage($setMP,$addCP,$content=array()){
		$this->setMasterPage($setMP);
		$this->addContentPage($addCP,'content',$content);
		$this->show();
	}
}

?>