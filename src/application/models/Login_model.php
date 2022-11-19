<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	 
	public function getUser($login) {
		$query = $this->db->query("SELECT idUser, nomeUser, login, password, vigenteUser FROM protes_users WHERE login='{$login}';");
		return $query->row();
	}
	
	public function getParametro($nomeParametro) {
		$query = $this->db->query("SELECT valorParametro FROM protes_parametros WHERE nomeParametro='{$nomeParametro}'");
		$row = $query->row();
		return $row->valorParametro;
	}
	public function getOnlineParametro($nomeParametro) {
		$query = $this->db->query("SELECT valorParametro FROM protes_online_parametros WHERE nomeParametro='{$nomeParametro}'");
		$row = $query->row();
		return $row->valorParametro;
	}
}
?>