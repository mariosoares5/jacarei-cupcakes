<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_core{
	public function getHead($titulo) {
		$bootstrap_css = base_url('assets/css/bootstrap.min.css');
		$protes_style_css = base_url('assets/css/protes_jacarei_style.css');
		$jquery_js = base_url('assets/js/jquery.min.js');
		$bootstrap_js = base_url('assets/js/bootstrap.min.js');
		$logo_img = base_url('assets/img/jac_cupcakes.png');
		$favicon_ico = base_url('assets/img/jac_cupcakes.ico');
		return "<meta charset='utf-8'>
				<meta http-equiv='X-UA-Compatible' content='IE=edge'>
				<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
				<meta name='robots' content='noindex'>
				<title>{$titulo}</title>
				<link href='{$logo_img}' rel='icon' type='image/png' sizes='64x64'>
				<link href='{$favicon_ico}' rel='icon' type='image/vnd.microsoft.icon' sizes='16x16'>
				<!-- Bootstrap -->
				<link href='{$bootstrap_css}' rel='stylesheet'>
				<link href='{$protes_style_css}' rel='stylesheet'>
				<script src='{$jquery_js}'></script>
				<script src='{$bootstrap_js}'></script>
				<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
				<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
				<!--[if lt IE 9]>
				  <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
				  <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
				<![endif]-->";
	}
	
	public function getMenu($active) {
		$jac_cupcakes_home = base_url('');
		$logo_img = base_url('assets/img/jac_cupcakes.png');
		$menu = "<nav class='navbar fixed-top navbar-expand-lg navbar-light bg-light'>
					<span class='navbar-brand'>
						<a href='{$jac_cupcakes_home}'><img src='{$logo_img}' width='30' height='30' class='d-inline-block align-top' alt='ProtES'></a>
						Jacareí Cupcakes <small><i></i></small>
					</span>
					<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarText' aria-controls='navbarText' aria-expanded='false' aria-label='Toggle navigation'>
						<span class='navbar-toggler-icon'></span>
					</button>
					<div class='collapse navbar-collapse' id='navbarText'>
						<ul class='navbar-nav mr-auto'>
							<li class='nav-item"; if($active=='consulta')$menu.=" active"; $menu.="'>
								<a class='nav-link' href='{$jac_cupcakes_home}'>Consulta situação <span class='sr-only'>(current)</span></a>
							</li>
							<li class='nav-item dropdown"; if(strstr($active,"relatorio")!=false)$menu.=" active"; $menu.="'>
								<a class='nav-link dropdown-toggle' href='{$jac_cupcakes_home}relatorio_demanda' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
								Relatórios</a>
								<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
									<a class='dropdown-item"; if($active=='relatorio_demanda')$menu.=" active"; $menu.="' href='{$jac_cupcakes_home}relatorio_demanda'>Demanda</a>
									<!-- a class='dropdown-item"; if($active=='relatorio_entradas')$menu.=" active"; $menu.="' href='{$jac_cupcakes_home}relatorio_entradas'>Entradas</a -->
									<!-- a class='dropdown-item"; if($active=='relatorio_saidas')$menu.=" active"; $menu.="' href='{$jac_cupcakes_home}relatorio_saidas'>Saídas</a -->
									<!-- a class='dropdown-item"; if($active=='relatorio_remessas')$menu.=" active"; $menu.="' href='{$jac_cupcakes_home}relatorio_remessas'>Remessas</a -->
								</div>
							</li>
						</ul>
						<form class='form-inline' action='".base_url('login/sair')."'>
							<button class='btn btn-sm btn-outline-primary my-2 my-sm-0' type='submit'>Sair</button>
						</form>
					</div>
					
				</nav>";
		return $menu;
	}
	
	public function getHeader() { //apenas para quando não estiver logado para possibilitar getMenu
		$jac_cupcakes_home = base_url('');
		$logo_img = base_url('assets/img/jac_cupcakes.png');
		return	"<nav class='navbar fixed-top navbar-expand-lg navbar-light bg-light'>
					<span class='navbar-brand'>
						<a href='{$jac_cupcakes_home}'><img src='{$logo_img}' width='30' height='30' class='d-inline-block align-top' alt='ProtES'></a>
						Jacareí Cupcakes <small><i></i></small>
					</span>
				</nav>";
	}
	
	public function getFooter() {
		$up_img = base_url('assets/img/up-32.png');
		return "<footer class='footer fixed-bottom pt-2 bg-light'>
					<small class='row py-2'>
						<div class='col-md-6 text-muted text-center'>Rodapé</div>
					</small>
				</footer>
				<a href='#topo' class='scrollToTop'><img src='{$up_img}'></a>
				<script>
				$(document).ready(function(){
					//Verifica se a Janela está no topo
					$(window).scroll(function(){
						if ($(this).scrollTop() > 100) { $('.scrollToTop').fadeIn(); } else { $('.scrollToTop').fadeOut(); }
					});
					//Animação subida
					$('.scrollToTop').click(function(){ $('html, body').animate({scrollTop : 0},800); return false; });
				});
				</script>";
	}
}
?>