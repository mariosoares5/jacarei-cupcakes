<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionarios extends CI_Controller {
	public function index() {
		$data['head'] = $this->view_core->getHead('Jacareí Cupcakes | Painel do funcionário');
		$data['menu'] = $this->view_core->getMenu('funcionarios');
		//carrega lista de produtos
		$this->load->model('funcionarios_model');
		$data['lista_funcionarios'] = $this->funcionarios_model->getFuncionarios();
		$this->load->view('funcionarios_page', $data);
	}
	
	public function novo() {
		if(!isset($_POST['nome'])) {
			$data['head'] = $this->view_core->getHead('Jacareí Cupcakes | Cadastrar funcionário');
			$data['menu'] = $this->view_core->getMenu('funcionarios');
			//mostra tela de cadastro de funcionario
			$this->load->view('funcionario_novo_page', $data);
		}
		else {
			$this->load->model('funcionarios_model');
			$senha_sha256 = strtoupper(hash('sha256', trim($_POST['cpf']).trim($_POST['senha'])));
			$this->funcionarios_model->addFuncionario(
				$_POST['nome'], $_POST['cpf'], $senha_sha256 );
			//carrega a lista com o novo funcionario
			redirect(base_url('funcionarios'));
		}
	}
	
	public function editar($produto) {
		$this->load->model('produtos_model');
		if(!isset($_POST['idProduto'])) {
			$data['head'] = $this->view_core->getHead('Jacareí Cupcakes | Alterar produto');
			$data['menu'] = $this->view_core->getMenu('produtos');
			//carrega dados do produto para edição
			$data['produto'] = $this->produtos_model->getProduto($produto);
			if($data['produto'] != NULL)
				$this->load->view('produto_edit_page', $data);
			else //ao tentar acessar via url um produto invalido, redireciona para lista
				redirect(base_url('produtos'));
		}
		else {
			$this->produtos_model->updateProduto( $_POST['idProduto'],
				$_POST['nomeProduto'], $_POST['preco'], $_POST['descricao'],
				$_POST['foto'], $_SESSION['id_usuario'] );
			//carrega a lista com o produto alterado
			redirect(base_url('produtos'));
		}
	}
	
	public function excluir($produto) {
		$this->load->model('produtos_model');
		if(!isset($_POST['idProduto'])) {
			$data['head'] = $this->view_core->getHead('Jacareí Cupcakes | Excluir produto');
			$data['menu'] = $this->view_core->getMenu('produtos');
			//carrega dados do produto para confirmação da exclusão
			$data['produto'] = $this->produtos_model->getProduto($produto);
			if($data['produto'] != NULL)
				$this->load->view('produto_delete_page', $data);
			else //ao tentar acessar via url um produto invalido, redireciona para lista
				redirect(base_url('produtos'));
		}
		else {
			$this->produtos_model->deleteProduto($_POST['idProduto']);
			//carrega a lista após deletar produto
			redirect(base_url('produtos'));
		}
	}
}
