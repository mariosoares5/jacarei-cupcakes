<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang='pt-br'>
	<head><?php print $head; ?></head>
	<body>
		<?php print $menu; ?>
		<div class='container-fluid'>
			<section class='row'>
				<div class='col-md-12' role='main'>
					<nav aria-label='breadcrumb'>
						<ol class='breadcrumb'>
							<li class='breadcrumb-item'><a href='<?php print base_url(''); ?>'>Home</a></li>
							<li class='breadcrumb-item'><a href='<?php print base_url('funcionarios'); ?>'>Funcionários</a></li>
							<li class='breadcrumb-item active' aria-current='page'><?php print $funcionario->nome; ?></li>
						</ol>
					</nav>
					<h3>Alterar funcionário</h3>
					
					<form method='post' action='<?php print base_url('funcionarios/editar/'.$funcionario->idFuncionario); ?>'>
						<div class='mb-3 row'>
							<label for='idFuncionario' class='col-sm-1 col-form-label'>Código</label>
							<div class='col-sm-3'>
								<input type='text' readonly class='form-control' id='idFuncionario' name='idFuncionario' value='<?php print $funcionario->idFuncionario; ?>'>
							</div>
						</div>
						<div class='mb-3 row'>
							<label for='nome' class='col-sm-1 col-form-label'>Nome</label>
							<div class='col-sm-8'>
								<input type='text' class='form-control' id='nome' name='nome' value='<?php print $funcionario->nome; ?>' required>
							</div>
						</div>
						<div class='mb-3 row'>
							<label for='cpf' class='col-sm-1 col-form-label'>CPF</label>
							<div class='col-sm-4'>
								<input type='text' class='form-control' id='cpf' name='cpf' value='<?php print $funcionario->cpf; ?>' required>
							</div>
						</div>
						<div class='mb-3 row'>
							<label for='senha' class='col-sm-1 col-form-label'>Senha</label>
							<div class='col-sm-5'>
								<input type='password' class='form-control' id='senha' name='senha' required>
							</div>
						</div>
						
						<div class='mb-3 row'>
							<div class='col-sm-8 offset-sm-1'>
								<button class='btn btn-sm btn-success my-sm-0' type='submit'>
								<img src='<?php print base_url('assets/img/salvar.png'); ?>' alt='Alterar'>Alterar</button>
							</div>
						</div>
					</form>
				</div>
			</section>
		</div>
	</body>
</html>
		