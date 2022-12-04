<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	
	public function getProdutos() {
		$requisicao = "SELECT p.idProduto AS idProduto, p.nomeProduto AS nomeProduto, p.preco AS preco,
						p.descricao AS descricao, p.foto AS foto, f.nome AS funcionario
						FROM produto AS p, funcionario as f WHERE (p.idFuncionario = f.idFuncionario) ORDER BY p.idProduto;";
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
	
	public function getProduto($id) {
		$query = $this->db->query("SELECT idProduto, nomeProduto, preco, descricao, foto FROM produto WHERE idProduto={$id};");
		return $query->row();
	}
	
	public function addProduto($nomeProduto, $preco, $descricao, $foto, $idFuncionario) {
		$data = array(
			'nomeProduto' => $nomeProduto,
			'preco' => $preco,
			'descricao' => $descricao,
			'foto' => $foto,
			'idFuncionario' => $idFuncionario
		);
		return $this->db->insert('produto',$data);
	}
	
	public function updateProduto($idProduto, $nomeProduto, $preco, $descricao, $foto, $idFuncionario) {
		$data = array(
			'nomeProduto' => $nomeProduto,
			'preco' => $preco,
			'descricao' => $descricao,
			'foto' => $foto,
			'idFuncionario' => $idFuncionario
		);
		$this->db->where('idProduto', $idProduto);
		return $this->db->update('produto',$data);
	}
}
?>