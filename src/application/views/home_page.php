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
					<form action='consulta' method='post'>
						<div class='form-row'>
							<label for='inputDataI' class='col-sm-1 col-form-label'>Data inicial</label>
							<div class='form-group col-md-2'>
								<div class='input-group'>
									<div class='input-group-prepend' data-toggle='tooltip' title='Considerar data inicial?'>
										<div class='input-group-text'> <input type='checkbox' id='checkConsideraDataI' name='consideraDataI' value='1' onclick='mostrarDataI()' <?php if(isset($consideraDataI) && $consideraDataI==1) print" checked"; ?>> </div>
									</div>
									<input type='text' class='form-control' id='inputDataI' name='dataI' placeholder='Data inicial' <?php if(isset($dataI) && $consideraDataI==1) print" value='{$dataI}'"; else print"readOnly"; ?>>
									<script type='text/javascript'>
										function mostrarDataI() {
											var checkBox = document.getElementById("checkConsideraDataI");
											var inputDataI = document.getElementById("inputDataI");
											if (checkBox.checked == true){
												var data = new Date(); data.setYear(data.getFullYear()-1);
												inputDataI.value = data.toLocaleDateString();
												inputDataI.readOnly = false;
											} else {
												inputDataI.value = "";
												inputDataI.readOnly = true;
											}
										}
									</script>
								</div>
							</div>
							<label for='inputDataF' class='col-sm-1 col-form-label'>Data final</label>
							<div class='form-group col-md-2'>
								<input type='text' class='form-control' id='inputDataF' name='dataF' placeholder='Data final' value='<?php if(isset($dataF)) print"{$dataF}"; else print date('d/m/Y') ?>' required>
							</div>
							<div class='form-group col-md-6'>
								<input type='text' class='form-control' id='inputProced' name='proced' placeholder='Procedimento' <?php if(isset($proced)) print" value='{$proced}'"; ?> onkeyup='this.value = this.value.toUpperCase();'>
							</div>
						</div>
						<div class='form-row'>
							<div class='form-group col-md-4'>
								<input type='text' class='form-control' id='inputPaciente' name='paciente' placeholder='Nome do paciente' <?php if(isset($paciente)) print" value='{$paciente}'"; ?> onkeyup='this.value = this.value.toUpperCase();'>
							</div>
							<div class='form-group col-md-2'>
								<input type='text' class='form-control' id='inputNasc' name='nasc' placeholder='Nascimento' <?php if(isset($nasc)) print" value='{$nasc}'"; ?>>
							</div>
							<div class='form-group col-md-6'>
								<button type='submit' class='btn btn-primary' onclick='textTrim()'>Consultar</button>
								<script type='text/javascript'>
									function textTrim() {
										var inputProced = document.getElementById("inputProced");
										var inputPaciente = document.getElementById("inputPaciente");
										inputProced.value=inputProced.value.trim();
										inputPaciente.value=inputPaciente.value.trim();
									}
								</script>
								<?php if(isset($erro)) print "&nbsp;&nbsp;<small style='color:red;'>Favor preencher ao menos um campo (nome do paciente, nascimento ou procedimento).</small>"; ?>
							</div>
						</div>
					</form>

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
		