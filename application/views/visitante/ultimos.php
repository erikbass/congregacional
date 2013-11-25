<div class="row-fluid">
	<div class="widget-box">
		<div class="widget-header widget-header-flat widget-header-small">
			<h5>
				<i class="icon-signal"></i>
				Visitantes
			</h5>
		</div>

		<div class="widget-body">
			<div class="widget-main">
				<!-- -->
				<div id="piechart-placeholder"></div>
			</div><!-- /widget-main -->
		</div><!-- /widget-body -->
	</div>
</div>
<hr>
<div class="row-fluid">
	<div class="span">
		<div class="widget-box transparent">
			<div class="widget-header widget-header-flat">
				<h4 class="lighter">
					<i class="icon-star orange"></i>
					Últimos visitantes cadastrados
				</h4>

				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
						<i class="icon-chevron-up"></i>
					</a>
				</div>
			</div>

			<div class="widget-body"><div class="widget-body-inner"><div class="widget-body-inner"><div class="widget-body-inner"><div class="widget-body-inner">
				<div class="widget-main no-padding">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>
									<i class="icon-caret-right blue"></i>
									Nome
								</th>
								<th>
									<i class="icon-caret-right blue"></i>
									Data da visita
								</th>
								<th class="hidden-phone">
									<i class="icon-caret-right blue"></i>
									Telefone
								</th>
							</tr>
						</thead>

						<tbody>
							<?php
								foreach($ultimos as $visitante){
									echo "
										<tr>
											<td>$visitante->nome</td>
											<td>
												".diaSemana($visitante->data_visita)."
											</td>
											<td class='hidden-phone'>
												".telefoneMask($visitante->telefone)."
											</td>
										</tr>
									";
								}
							?>
						</tbody>
					</table>
				</div><!--/widget-main-->
			</div></div></div></div></div><!--/widget-body-->
		</div><!--/widget-box-->
	</div>
</div>

<script type="text/javascript">
	jQuery(function($) {		
	  var placeholder = $('#piechart-placeholder').css({'width':'50%' , 'min-height':'150px'});
	  var data = [
		{ label: "Homens (<?= $qtdehomens ?>)",  data: <?= $qtdehomens ?>, color: "#2091CF"},
		{ label: "Mulheres (<?= $qtdemulheres ?>)",  data: <?= $qtdemulheres ?>, color: "#DA5430"}
	  ]
	  function drawPieChart(placeholder, data, position) {
	 	  $.plot(placeholder, data, {
			series: {
				pie: {
					show: true,
					tilt:1,
					highlight: {
						opacity: 0.25
					},
					stroke: {
						color: '#fff',
						width: 5
					},
					startAngle: 0
				}
			},
			legend: {
				show: true,
				position: position || "ne", 
				labelBoxBorderColor: null,
				margin:[0,0]
			},
			grid: {
				hoverable: true,
				clickable: true
			}
		 })
	 }
	 drawPieChart(placeholder, data, 'right');
})
</script>