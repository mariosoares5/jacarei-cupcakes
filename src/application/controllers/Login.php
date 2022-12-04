<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index() {
		if(isset($_SESSION['id_usuario']) && isset($_SESSION['nome_usuario'])) { 
			// Usuário já logado! Redireciona para a página de consulta
			redirect(base_url('produtos'));
		}
		else {
			if(!isset($_POST['login'])) {
				//PAGINA DE LOGIN
				$data['head'] = $this->view_core->getHead('Jacareí Cupcakes | Login');
				$data['header'] = $this->view_core->getHeader();
				$this->load->view('login_page', $data);
			} else {
				//AUTENTICACAO OU PAGINA DE ERRO NO LOGIN
				$data['login'] = isset($_POST['login']) ? addslashes(trim($_POST['login'])) : FALSE;
				$senha = isset($_POST['senha']) ? strtoupper(hash('sha256', trim($_POST['login']).trim($_POST['senha']))) : FALSE;
				
				if(!$data['login'] || !$senha)
					$data['erro'] = 'Voc&ecirc; deve digitar sua senha e login.';
				else {
					$row = $this->login_model->getUser($data['login']);
					
					if($row != NULL) {
						if(!strcmp($senha, $row->senha)) {
							$data['erro'] = NULL;
							// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
							$_SESSION['id_usuario']= $row->idFuncionario;
							$_SESSION['nome_usuario'] = stripslashes($row->nome);
							// Usuário logado, redireciona para a página de produtos
							redirect(base_url('produtos'));
						} else //Senha invalida 
							$data['erro'] = 'Login ou senha inv&aacute;lidos!';
					} else 
						$data['erro'] = 'Login ou senha inv&aacute;lidos!';
				}
			
				if($data['erro'] != NULL) {
					$data['head'] = $this->view_core->getHead('Jacareí Cupcakes | Login');
					$data['header'] = $this->view_core->getHeader();
					$this->load->view('login_page', $data);
				}
			}
		}
	}
	
	public function sair() {
		session_destroy(); redirect(base_url('')); //encerra sessao e redireciona para a vitrine
	}
}
?>