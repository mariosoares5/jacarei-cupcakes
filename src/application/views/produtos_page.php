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
					<h3>Produtos</h3>
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
									print "<tr>
										<td>{$lista_produtos[$i][0]}</td>
										<th scope='row'>{$lista_produtos[$i][1]}</th>
										<td>{$lista_produtos[$i][2]}</td>
										<td>{$lista_produtos[$i][3]}</td>
										<td>{$lista_produtos[$i][4]}</td>
										<td>{$lista_produtos[$i][5]}</td>
										<td></td>
										<td></td>
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
		