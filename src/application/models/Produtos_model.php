<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	
	public function getProdutos() {
		$requisicao = "SELECT p.idProduto AS idProduto, p.nomeProduto AS nomeProduto, p.preco AS preco,
						p.descricao AS descricao, p.foto AS foto, f.nome AS funcionario
						FROM produto AS p, funcionario as f WHERE (p.idFuncionario = f.idFuncionario);";
		$query = $this->db->query($requisicao);
		$results = $query->result(); //executando requisicao
		
		$resposta = array();
		foreach ($results as $row) {
			$resposta[] =array(
				$idProduto = $row->idProduto,
				$nomeProduto = $row->nomeProduto,
				$preco = $row->preco,
				$descricao = $row->descricao,
				$foto = $row->foto,
				$funcionario = $row->funcionario
			);
		}
		return $resposta;
	}
}
?>