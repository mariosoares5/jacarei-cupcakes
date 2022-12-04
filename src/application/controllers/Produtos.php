<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {
	public function index() {
		$data['head'] = $this->view_core->getHead('Jacareí Cupcakes');
		$data['menu'] = $this->view_core->getMenu('produtos');
		
		//carrega produtos e mostra vitrine
		$this->load->model('produtos_model');
		$data['lista_produtos'] = $this->produtos_model->getProdutos();
		$this->load->view('produtos_page', $data);
	}
	
	public function novo() {
	}
	
	public function editar($produto) {
	}
}
