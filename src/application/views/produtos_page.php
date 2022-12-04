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
							<li class='breadcrumb-item active' aria-current='page'>Produtos</li>
						</ol>
					</nav>
					<h3>Produtos <form class='form-inline' method='post' action='<?php print base_url('produtos/novo'); ?>'><button class='btn btn-sm btn-primary my-sm-0' type='submit'>
									<img src='<?php print base_url('assets/img/novo.png'); ?>' alt='Novo'>Novo</button></form></h3>
					<table class='table'>
						<thead>
							<tr>
								<th scope='col'>#</th>
								<th scope='col'>Nome</th>
								<th scope='col'>Preço</th>
								<th scope='col'>Descrição</th>
								<th scope='col'>Foto</th>
								<th scope='col'>Cadastrado por</th>
								<th scope='col'>Alterar</th>
								<th scope='col'>Excluir</th>
							</tr>
						</thead>
						<tbody>
						<?php if(isset($lista_produtos)) {
							$quant = sizeof($lista_produtos);
							if($quant > 0) {
								for($i=0; $i<$quant; $i++) {
									$url_alterar = base_url('produtos/'.$lista_produtos[$i][0]);
									$url_excluir = base_url('produtos/excluir/'.$lista_produtos[$i][0]);
									$url_img = base_url('assets/img');
									print "<tr>
										<td>{$lista_produtos[$i][0]}</td>
										<th scope='row'>{$lista_produtos[$i][1]}</th>
										<td>{$lista_produtos[$i][2]}</td>
										<td>{$lista_produtos[$i][3]}</td>
										<td>{$lista_produtos[$i][4]}</td>
										<td>{$lista_produtos[$i][5]}</td>
										<td><form class='form-inline' method='post' action='{$url_alterar}'>
											<button class='btn btn-sm btn-warning my-sm-0' type='submit'>
											<img src='{$url_img}/alterar.png' alt='Alterar'></button></form></td>
										<td><form class='form-inline' method='post' action='{$url_excluir}'>
											<button class='btn btn-sm btn-danger my-sm-0' type='submit'>
											<img src='{$url_img}/excluir.png' alt='Excluir'></button></form></td>
									</tr>";
								}
							}
						} ?>
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</body>
</html>
		