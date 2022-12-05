<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionarios extends CI_Controller {
	public function index() {
		$data['head'] = $this->view_core->getHead('Jacareí Cupcakes | Painel do funcionário');
		$data['menu'] = $this->view_core->getMenu('funcionarios');
		//carrega lista de funcionários
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
	
	public function editar($funcionario) {
		$this->load->model('funcionarios_model');
		if(!isset($_POST['idFuncionario'])) {
			$data['head'] = $this->view_core->getHead('Jacareí Cupcakes | Alterar funcionário');
			$data['menu'] = $this->view_core->getMenu('funcionarios');
			//carrega dados do funcionario para edição
			$data['funcionario'] = $this->funcionarios_model->getFuncionario($funcionario);
			if($data['funcionario'] != NULL)
				$this->load->view('funcionario_edit_page', $data);
			else //ao tentar acessar via url um funcionario invalido, redireciona para lista
				redirect(base_url('funcionarios'));
		}
		else {
			$senha_sha256 = strtoupper(hash('sha256', trim($_POST['cpf']).trim($_POST['senha'])));
			$this->funcionarios_model->updateFuncionario( $_POST['idFuncionario'],
				$_POST['nome'], $_POST['cpf'], $senha_sha256 );
			//carrega a lista com o funcionario alterado
			redirect(base_url('funcionarios'));
		}
	}
	
	public function excluir($funcionario) {
		$this->load->model('funcionarios_model');
		if(!isset($_POST['idFuncionario'])) {
			$data['head'] = $this->view_core->getHead('Jacareí Cupcakes | Excluir funcionário');
			$data['menu'] = $this->view_core->getMenu('funcionarios');
			//carrega dados do funcionário para confirmação da exclusão
			$data['funcionario'] = $this->funcionarios_model->getFuncionario($funcionario);
			if($data['funcionario'] != NULL)
				$this->load->view('funcionario_delete_page', $data);
			else //ao tentar acessar via url um funcionário invalido, redireciona para lista
				redirect(base_url('funcionarios'));
		}
		else {
			$this->funcionarios_model->deleteFuncionario($_POST['idFuncionario']);
			//carrega a lista após deletar funcionário
			redirect(base_url('funcionarios'));
		}
	}
}
