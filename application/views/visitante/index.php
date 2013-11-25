<div class="row-fluid">
	<div class="span">
		<div class="widget-box transparent">
			<div class="widget-header widget-header-flat">
				<h4 class="lighter">
					<i class="icon-star orange"></i>
					Visitantes
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
								<th>
									Ações
								</th>
							</tr>
						</thead>

						<tbody>
							<?php
								foreach($list as $visitante){

									$diasemana = diaSemana($visitante->data_visita);

									echo "
										<tr>
											<td>
												<a href='./visitante/visualizar/$visitante->id'>$visitante->nome</a>
											</td>
											<td>
												<a href='./visitante/visualizar/$visitante->id'>$diasemana</a>
												<b class='green'></b>
											</td>
											<td style='text-align:center;'>
												<a href='./visitante/visualizar/$visitante->id' class='btn btn-info'>
													<i class='icon-info-sign'></i>
													Ver
												</a>
												<a href='./pessoa/editar/$visitante->id' class='btn btn-primary'>
													<i class='icon-edit'></i>
													Editar
												</a>
												<a href='./pessoa/excluir/$visitante->id' class='btn btn-danger'>
													<i class='icon-trash'></i>
													Excluir
												</a>
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

