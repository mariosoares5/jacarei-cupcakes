<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	
	public function getProdutos() {
		$requisicao = "SELECT nomeProduto, preco, descricao, foto FROM produto;";
		$query = $this->db->query($requisicao);
		$results = $query->result(); //executando requisicao
		
		$resposta = array();
		foreach ($results as $row) {
			$resposta[] =array(
				$nomeProduto = $row->nomeProduto,
				$preco = $row->preco,
				$descricao = $row->descricao,
				$foto = $row->foto
			);
		}
		return $resposta;
	}
}
?>