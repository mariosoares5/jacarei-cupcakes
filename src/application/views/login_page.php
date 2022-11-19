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
			<img width='64' height='64' alt='ProtES' src='<?php echo base_url('assets/img/jac_cupcakes.png');?>' title='ProtES | Protocolo de entrada e saída de procedimentos'>
			<h2>Jacareí Cupcakes <small><i></i></small></h2>
			<h4 class='mb-4'>Painel do funcionário</h4>
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
		</form>
	</body>
</html>




