<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta extends CI_Controller {
	public function index() {
		$data['WEB_VERSION'] = $this->view_core->getWEB_VERSION();
		$data['head'] = $this->view_core->getHead('ProtES | Consulte entradas e saídas de procedimentos');
		$data['menu'] = $this->view_core->getMenu('consulta');
		$data['footer'] = $this->view_core->getFooter();
		//Se dataF não foi transmitida, mostra a home da consulta
		if(!isset($_POST['dataF'])) {
			$this->load->view('home_page', $data);
		} else {
			//Se proced, paciente e nasc NÃO foram transmitidos, mostra mensagem de erro
			if($_POST['proced']=='' && $_POST['paciente']=='' && $_POST['nasc']=='') {
				$data['erro'] = 'vazio';
				$this->load->view('home_page', $data);
			}
			else { //Se proced, paciente OU nasc foram transmitidos, executa consulta e mostra resultados
				//virar datas
				$dataI = $_POST['dataI']; $dataF = $_POST['dataF'];
				if(substr($dataI,2,1)=="/" AND strlen($dataI)==10)
					$dataI = substr($dataI,6,4)."/".substr($dataI,3,2)."/".substr($dataI,0,2);
				if(substr($dataF,2,1)=="/" AND strlen($dataF)==10)
					$dataF = substr($dataF,6,4)."/".substr($dataF,3,2)."/".substr($dataF,0,2);
				//filtrar situacao e mostra resultados
				$this->load->model('consulta_model');
				$data['consulta'] = $this->consulta_model->getSituacao($dataI,$dataF,$_POST['proced'],$_POST['paciente'],$_POST['nasc']);
				$data['proced'] = $_POST['proced']; $data['paciente'] = $_POST['paciente']; $data['nasc'] = $_POST['nasc']; $data['dataI'] = $_POST['dataI']; $data['dataF'] = $_POST['dataF'];
				if(isset($_POST['consideraDataI'])) $data['consideraDataI']=1; else $data['consideraDataI']=0;
				$this->load->view('home_page', $data);
			}
		}
	}
}
