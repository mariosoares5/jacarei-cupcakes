<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionarios_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	
	public function getFuncionarios() {
		$requisicao = "SELECT idFuncionario, nome, cpf
					FROM funcionario ORDER BY idFuncionario;";
		$query = $this->db->query($requisicao);
		$results = $query->result(); //executando requisicao
		
		$resposta = array();
		foreach ($results as $row) {
			$resposta[] =array(
				$idFuncionario = $row->idFuncionario,
				$nome = $row->nome,
				$cpf = $row->cpf
			);
		}
		return $resposta;
	}
	
	public function getFuncionario($id) {
		$query = $this->db->query("SELECT idFuncionario, nome, cpf FROM funcionario WHERE idFuncionario={$id};");
		return $query->row();
	}
	
	public function addFuncionario($nome, $cpf, $senha) {
		$data = array(
			'nome' => $nome,
			'cpf' => $cpf,
			'senha' => $senha
		);
		return $this->db->insert('funcionario',$data);
	}
	
	public function updateFuncionario($idFuncionario, $nome, $cpf, $senha) {
		$data = array(
			'nome' => $nome,
			'cpf' => $cpf,
			'senha' => $senha
		);
		$this->db->where('idFuncionario', $idFuncionario);
		return $this->db->update('funcionario',$data);
	}
	
	public function deleteFuncionario($idFuncionario) {
		$this->db->where('idFuncionario', $idFuncionario);
		return $this->db->delete('funcionario');
	}
}
?>