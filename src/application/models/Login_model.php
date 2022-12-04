<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	 
	public function getUser($login) {
		$query = $this->db->query("SELECT idFuncionario, nome, cpf, senha FROM funcionario WHERE cpf='{$login}';");
		return $query->row();
	}
}
?>