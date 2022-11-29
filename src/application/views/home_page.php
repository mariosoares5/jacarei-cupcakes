<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang='pt-br'>
	<head><?php print $head; ?></head>
	<body>
		<?php print $menu; ?>
		<div class='container-fluid'>
			<section class='row'>
			<?php if(isset($vitrine)) {
				$quant = sizeof($vitrine);
				if($quant > 0) {
					for($i=0; $i<$quant; $i++) {
						print "<div class='col-md-3 mb-3' role='main'>
							<div class='card' style='width: 18rem;'>
								<img src='";
						print base_url("assets/img/{$vitrine[$i][3]}");
						print "' height='250' class='card-img-top'
								alt='{$vitrine[$i][0]}'>
								<div class='card-body'>
									<h5 class='card-title'>{$vitrine[$i][0]}</h5>
									<p class='card-text'>{$vitrine[$i][2]}</p>
									<h5><span class='badge bg-secondary text-white'>R$ {$vitrine[$i][1]}</span></h5>
								</div>
							</div>
						</div>";
						
						/*	if($vitrine[$i][10] == '') print" ";
							if($vitrine[$i][15] != '') print" ";
						*/
					}
				}
			} ?>
			</section>
		</div>
		<?php print $footer; ?>
	</body>
</html>
		