<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang='pt-br'>
	<head>
		<?php print $head; ?>
		<link href='<?php echo base_url('assets/css/bootstrap-signin.css');?>' rel='stylesheet'>
	</head>
	<body class='text-center'>
		<?php print $header; ?>
		<form class='form-signin' action='<?php echo base_url('login');?>' method='post'>
			<img width='64' height='64' alt='ProtES' src='<?php echo base_url('assets/img/protes-64.png');?>' title='ProtES | Protocolo de entrada e saída de procedimentos'>
			<h2>ProtES Web <small><i><?php print $WEB_VERSION; ?></i></small></h2>
			<h4 class='mb-4'>Consulte entradas e saídas</h4>
			<input type='hidden' name='preenchido' value=1>
			<label for='inputUser' class='sr-only'>Usuário</label>
			<?php
				if( isset($login) )
					echo "\n<input name='login' value='{$login}' type='username' id='inputUser' class='form-control' placeholder='Usuário' required autofocus>";
				else
					echo "\n<input name='login' type='username' id='inputUser' class='form-control' placeholder='Usuário' required autofocus>";
			?>
			<label for='inputPassword' class='sr-only'>Senha</label>
			<input name='senha' type='password' id='inputPassword' class='form-control' placeholder='Senha' required>
			<button class='btn btn-lg btn-primary btn-block' type='submit'>Entrar</button>
			<?php
				if( isset($erro) && $erro!=NULL )
					echo "<small style='text-align:center; color:red;'>{$erro}</small>";
			?>
			<p class='mt-5 text-muted'>&copy; <a target='_blank' href='http://www.cophem.com.br/'>Cophem</a></p>
		</form>
		
		<div class='container'>
			<div class='row'>
				<div class='col-sm-8 col-10 mx-auto alert alert-primary alert-dismissible fade show' role='alert'>
					<small>Utilizamos cookies essenciais e tecnologias semelhantes para aprimorar a sua experiência. Ao continuar navegando, você concorda com nossa <a target='_blank' href='https://protes.com.br/politicas/privacidade'>Política de Privacidade</a> e com nossos <a target='_blank' href='https://protes.com.br/politicas/termos'>Termos e condições gerais de uso</a>.</small>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
					</button>
				</div>
			</div>
		</div>
	</body>
</html>




