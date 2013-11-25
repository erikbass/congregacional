<div class="row-fluid">
	<div class="span6">
		<div id="piechart-placeholder"></div>
	</div>
</div>

<div class="row-fluid">
	<div class="span">
		<div class="widget-box transparent">
			<div class="widget-header widget-header-flat">
				<h4 class="lighter">
					<i class="icon-star orange"></i>
					Top 5 (Faltas)
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
									Registro
								</th>
								<th class="hidden-phone">
									<i class="icon-caret-right blue"></i>
									Setor
								</th>
								<th class="hidden-phone">
									<i class="icon-caret-right blue"></i>
									Faltas no mês
								</th>
							</tr>
						</thead>

						<tbody>
							<?php
								foreach($list as $funcionario){
									echo "
										<tr>
											<td>$funcionario->nome</td>
											<td>
												<b class='green'></b>
											</td>
											<td></td>
											<td class='hidden-phone'>
												<b class='blue'>0</b>
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
		{ label: "Dias trabalhados",  data: 321, color: "#2091CF"},
		{ label: "Faltas",  data: 123, color: "#DA5430"}
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