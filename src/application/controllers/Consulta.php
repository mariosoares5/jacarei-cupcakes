<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta extends CI_Controller {
	public function index() {
		$data['head'] = $this->view_core->getHead('Jacareí Cupcakes');
		$data['menu'] = $this->view_core->getMenu('consulta');
		$data['footer'] = $this->view_core->getFooter();
		
		//carrega produtos e mostra vitrine
		$this->load->model('consulta_model');
		$data['vitrine'] = $this->consulta_model->getProdutos();
		$this->load->view('home_page', $data);
	}
}
