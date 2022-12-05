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
							<li class='breadcrumb-item active' aria-current='page'>Funcionários</li>
						</ol>
					</nav>
					<h3>Funcionários <button class='btn btn-sm btn-primary my-sm-0' onclick="window.location.href = '<?php print base_url('funcionarios/novo'); ?>'">
								<img src='<?php print base_url('assets/img/novo.png'); ?>' alt='Novo'>Novo</button> </h3>
					
					<table class='table'>
						<thead>
							<tr>
								<th scope='col'>#</th>
								<th scope='col'>Nome</th>
								<th scope='col'>CPF</th>
								<th scope='col'>Alterar</th>
								<th scope='col'>Excluir</th>
							</tr>
						</thead>
						<tbody>
						<?php if(isset($lista_funcionarios)) {
							$quant = sizeof($lista_funcionarios);
							if($quant > 0) {
								for($i=0; $i<$quant; $i++) {
									$url_alterar = base_url('funcionarios/'.$lista_funcionarios[$i][0]);
									$url_excluir = base_url('funcionarios/excluir/'.$lista_funcionarios[$i][0]);
									$url_img = base_url('assets/img');
									print "<tr>
										<td>{$lista_funcionarios[$i][0]}</td>
										<th scope='row'>{$lista_funcionarios[$i][1]}</th>
										<td>{$lista_funcionarios[$i][2]}</td>
										<td><button class='btn btn-sm btn-warning my-sm-0' onclick=\"window.location.href = '{$url_alterar}'\">
											<img src='{$url_img}/alterar.png' alt='Alterar'></button></td>
										<td><button class='btn btn-sm btn-danger my-sm-0' onclick=\"window.location.href = '{$url_excluir}'\">
											<img src='{$url_img}/excluir.png' alt='Excluir'></button></td>
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
		