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
		if(!isset($_POST['nomeProduto'])) {
			$data['head'] = $this->view_core->getHead('Jacareí Cupcakes | Cadastrar produto');
			$data['menu'] = $this->view_core->getMenu('produtos');
			
			//mostra tela de cadastro de produto
			$this->load->view('produto_novo_page', $data);
		}
		else {
			$this->load->model('produtos_model');
			$this->produtos_model->addProduto(
				$_POST['nomeProduto'], $_POST['preco'], $_POST['descricao'],
				$_POST['foto'], $_SESSION['id_usuario'] );
			
			//carrega a lista com o novo produto
			redirect(base_url('produtos'));
		}
	}
	
	public function editar($produto) {
		if(!isset($_POST['idProduto'])) {
			$data['head'] = $this->view_core->getHead('Jacareí Cupcakes | Editar produto');
			$data['menu'] = $this->view_core->getMenu('produtos');
			
			//carrega dados do produto para edição
			$this->load->model('produtos_model');
			$data['produto'] = $this->produtos_model->getProduto($produto);
			$this->load->view('produto_edit_page', $data);
		}
		else {
			$this->load->model('produtos_model');
			$this->produtos_model->updateProduto( $_POST['idProduto'],
				$_POST['nomeProduto'], $_POST['preco'], $_POST['descricao'],
				$_POST['foto'], $_SESSION['id_usuario'] );
			
			//carrega a lista com o produto alterado
			redirect(base_url('produtos'));
		}
	}
}
