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
							<li class='breadcrumb-item'><a href='<?php print base_url('produtos'); ?>'>Produtos</a></li>
							<li class='breadcrumb-item active' aria-current='page'>Novo</li>
						</ol>
					</nav>
					<h3>Cadastrar novo produto</h3>
					
					<form method='post' action='<?php print base_url('produtos/novo'); ?>'>
						<div class='mb-3 row'>
							<label for='nomeProduto' class='col-sm-1 col-form-label'>Nome</label>
							<div class='col-sm-8'>
								<input type='text' class='form-control' id='nomeProduto' name='nomeProduto' required>
							</div>
						</div>
						<div class='mb-3 row'>
							<label for='preco' class='col-sm-1 col-form-label'>Preço</label>
							<div class='input-group col-sm-4'>
								<span class='input-group-text' id='reais-addon'>R$</span>
								<input type='text' class='form-control' id='preco' aria-label='Preço' aria-describedby='reais-addon' name='preco' required>
							</div>
						</div>
						<div class='mb-3 row'>
							<label for='descricao' class='col-sm-1 col-form-label'>Descrição</label>
							<div class='col-sm-10'>
								<textarea class='form-control' id='descricao' rows='2' name='descricao' required></textarea>
							</div>
						</div>
						<div class='mb-3 row'>
							<label for='foto' class='col-sm-1 col-form-label'>Foto</label>
							<div class='col-sm-8'>
								<input type='text' class='form-control' id='foto' name='foto' required>
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
		