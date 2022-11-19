<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index() {
		if(isset($_SESSION['id_usuario']) && isset($_SESSION['nome_usuario'])) { 
			// Usuário já logado! Redireciona para a página de consulta
			redirect(base_url(''));
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
						if(!strcmp($senha, $row->password)) {
							if($row->vigenteUser==1) { //vigente?
								$data['erro'] = NULL;
								// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
								$_SESSION['id_usuario']= $row->idUser;
								$_SESSION['nome_usuario'] = stripslashes($row->nomeUser);
								//dados adicionais da sessao
								$_SESSION['organizacao'] = $this->login_model->getParametro('organizacao');
								$_SESSION['diretoria'] = $this->login_model->getParametro('diretoria');
								$_SESSION['gerencia'] = $this->login_model->getParametro('gerencia');
								$_SESSION['dataBackup'] = $this->login_model->getOnlineParametro('dataBackup');
								$_SESSION['horaBackup'] = $this->login_model->getOnlineParametro('horaBackup');
								$_SESSION['nivel1_Classificacao'] = $this->login_model->getParametro('nivel1_Classificacao');
								$_SESSION['nivel2_Classificacao'] = $this->login_model->getParametro('nivel2_Classificacao');
								// Usuário logado, redireciona para a página de consulta
								redirect(base_url(''));
							}
							else //Usuario bloqueado 
								$data['erro'] = 'Seu usu&aacute;rio n&atilde;o est&aacute; ativo! Contate o administrador para continuar.';
						} else //Senha invalida 
							$data['erro'] = 'Login ou senha inv&aacute;lidos!';
					} else 
						$data['erro'] = 'Login ou senha inv&aacute;lidos!';
				}
			
				if($data['erro'] != NULL) {
					$data['WEB_VERSION'] = $this->view_core->getWEB_VERSION();
					$data['head'] = $this->view_core->getHead('ProtES | Consulte entradas e saídas de procedimentos');
					$this->load->view('login_page', $data);
				}
			}
		}
	}
	
	public function sair() {
		session_destroy(); redirect(base_url('login')); //encerra sessao e redireciona para a página de login
	}
}
?>