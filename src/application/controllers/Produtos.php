<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {
	public function index() {
		$data['head'] = $this->view_core->getHead('Jacareí Cupcakes | Painel do funcionário');
		$data['menu'] = $this->view_core->getMenu('produtos');
		
		//carrega lista de produtos
		$this->load->model('produtos_model');
		$data['lista_produtos'] = $this->produtos_model->getProdutos();
		$this->load->view('produtos_page', $data);
	}
	
	public function novo() {
	}
	
	public function editar($produto) {
		$data['head'] = $this->view_core->getHead('Jacareí Cupcakes | Editar produto');
		$data['menu'] = $this->view_core->getMenu('produtos');
		
		//carrega dados do produto para edição
		$this->load->model('produtos_model');
		$data['produto'] = $this->produtos_model->getProduto($produto);
		$this->load->view('produto_edit_page', $data);
	}
}
