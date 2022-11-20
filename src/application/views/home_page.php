<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang='pt-br'>
	<head><?php print $head; ?></head>
	<body>
		<?php print $menu; ?>
		<div class='container-fluid'>
			<section class='row'>
				<div class='col-md-3' role='main'>
					<div class='card' style='width: 18rem;'>
						<img src='<?php echo base_url('assets/img/cupcake-baunilha.jpg');?>' height='250' class='card-img-top' alt='Cupcake de  baunilha'>
						<div class='card-body'>
							<h5 class='card-title'>Cupcake de baunilha</h5>
							<p class='card-text'>Massa fofinha e creme de baunilha.</p>
							<h5><span class="badge bg-secondary text-white">R$ 5,90</span></h5>
						</div>
					</div>
				</div>
				<div class='col-md-3' role='main'>
					<div class='card' style='width: 18rem;'>
						<img src='<?php echo base_url('assets/img/cupcake-chocolate.jpg');?>' height='250' class='card-img-top' alt='Cupcake de  baunilha'>
						<div class='card-body'>
							<h5 class='card-title'>Cupcake de chocolate</h5>
							<p class='card-text'>Uma explosão de chocolate.</p>
							<h5><span class="badge bg-secondary text-white">R$ 7,90</span></h5>
						</div>
					</div>
				</div>
				<div class='col-md-3' role='main'>
					<div class='card' style='width: 18rem;'>
						<img src='<?php echo base_url('assets/img/cupcake-redvelvet.jpg');?>' height='250' class='card-img-top' alt='Cupcake de  baunilha'>
						<div class='card-body'>
							<h5 class='card-title'>Cupcake red velvet</h5>
							<p class='card-text'>Sabor inconfundível.</p>
							<h5><span class="badge bg-secondary text-white">R$ 8,90</span></h5>
						</div>
					</div>
					
				<div class='col-md-12' role='main'>

					<?php if(isset($consulta)) { print "
					<div class='table-responsive'>
						<table class='table'>
							<thead class='thead-light'>
								<tr>
									<th scope='col'>Entrada</th>
									<th scope='col'>Paciente</th>
									<th scope='col'>Nascimento</th>
									<th scope='col'>Procedimento</th>
									<th scope='col'>Quant. Vagas</th>
									<th scope='col'>CID10</th>
									<th scope='col'>Prioridade</th>
									<th scope='col'>Obs. Entrada</th>
									<th scope='col'>Remetente</th>
									<th scope='col'>Solicitante</th>
									<th scope='col'>Motivo</th>
									<th scope='col'>Obs. Saída</th>
									<th scope='col'>Destinatário</th>
									<th scope='col'>Saída</th>
									<th scope='col'>Obs. Remessa</th>
									<th scope='col'>Nro Remessa</th>
								</tr>
							</thead>
							<tbody>";
								$quant = sizeof($consulta);
								if($quant > 0) {
									for($i=0; $i<$quant; $i++) {
										print "<tr";
											if($consulta[$i][10] == '') print" class='table-success'";
											if($consulta[$i][15] != '') print" class='table-info'";
										print">";
										print "<td>{$consulta[$i][0]}</td>";
										print "<th scope='row'>{$consulta[$i][1]}</th>";
										for($j=2; $j<16; $j++) {
											print "<td>";
												if($consulta[$i][$j] == $_SESSION['nivel1_Classificacao']) print "<b>{$consulta[$i][$j]}</b></td>";
												else if($j==15 && !empty($consulta[$i][15])) print "<a href='".base_url("remessa/anexo/{$consulta[$i][15]}")."' target='_blank'>{$consulta[$i][15]}</a></td>";
												else print "{$consulta[$i][$j]}</td>";
										}print "</tr>";
									}
								}
								else {
									print "<tr class='table-secondary'>
										<td colspan='16'>Nenhum resultado encontrado! Altere os campos acima para filtrar.</td>
									</tr>";
								}
						print"</tbody>
						</table>
					</div>";
					} ?>
					
				</div>
			</section>
		</div>
		<?php print $footer; ?>
	</body>
</html>
		