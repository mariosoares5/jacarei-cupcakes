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
							<li class='breadcrumb-item active' aria-current='page'>Novo</li>
						</ol>
					</nav>
					<h3>Cadastrar novo funcionário</h3>
					
					<form method='post' action='<?php print base_url('funcionarios/novo'); ?>'>
						<div class='mb-3 row'>
							<label for='nome' class='col-sm-1 col-form-label'>Nome</label>
							<div class='col-sm-8'>
								<input type='text' class='form-control' id='nome' name='nome' required>
							</div>
						</div>
						<div class='mb-3 row'>
							<label for='cpf' class='col-sm-1 col-form-label'>CPF</label>
							<div class='col-sm-4'>
								<input type='text' class='form-control' id='cpf' name='cpf' required>
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
								<img src='<?php print base_url('assets/img/salvar.png'); ?>' alt='Salvar'>Salvar</button>
							</div>
						</div>
					</form>
				</div>
			</section>
		</div>
	</body>
</html>
		