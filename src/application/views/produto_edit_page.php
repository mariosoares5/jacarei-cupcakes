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
							<li class='breadcrumb-item active' aria-current='page'><?php print $produto->nomeProduto; ?></li>
						</ol>
					</nav>
					<h3>Editar produto</h3>
					
					<div class='mb-3 row'>
						<label for='idProduto' class='col-sm-1 col-form-label'>Código</label>
						<div class='col-sm-3'>
							<input type='text' readonly class='form-control' id='idProduto' name='idProduto' value='<?php print $produto->idProduto; ?>'>
						</div>
					</div>
					<div class='mb-3 row'>
						<label for='nomeProduto' class='col-sm-1 col-form-label'>Nome</label>
						<div class='col-sm-8'>
							<input type='text' class='form-control' id='nomeProduto' name='nomeProduto' value='<?php print $produto->nomeProduto; ?>' required>
						</div>
					</div>
					<div class='mb-3 row'>
						<label for='preco' class='col-sm-1 col-form-label'>Preço</label>
						<div class='input-group col-sm-4'>
							<span class='input-group-text' id='reais-addon'>R$</span>
							<input type='text' class='form-control' id='preco' aria-label='Preço' aria-describedby='reais-addon' name='preco' value='<?php print $produto->preco; ?>' required>
						</div>
					</div>
					<div class='mb-3 row'>
						<label for='descricao' class='col-sm-1 col-form-label'>Descrição</label>
						<div class='col-sm-10'>
							<textarea class='form-control' id='descricao' rows='2' name='descricao' required><?php print $produto->descricao; ?></textarea>
						</div>
					</div>
					<div class='mb-3 row'>
						<label for='foto' class='col-sm-1 col-form-label'>Foto</label>
						<div class='col-sm-8'>
							<input type='text' class='form-control' id='foto' name='foto' value='<?php print $produto->foto; ?>' required>
						</div>
					</div>
					
				</div>
			</section>
		</div>
	</body>
</html>
		