<div class="row-fluid">
	<div class="span">
		<div class="widget-box transparent">
			<div class="widget-header widget-header-flat">
				<h4 class="lighter">
					<i class="icon-star orange"></i>
					Pessoas cadastradas
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
									Telefone
								</th>
								<th class="hidden-phone">
									<i class="icon-caret-right blue"></i>
									Status
								</th>
								<th>Ações</th>
							</tr>
						</thead>

						<tbody>
							<?php
								foreach($list as $pessoa){

									if ($pessoa->status_id == 1){
										$corStatus = 'green';
									} elseif ($pessoa->status_id == 2) {
										$corStatus = 'blue';
									} else {
										$corStatus = 'red';
									}

									echo "
										<tr>
											<td>
												<a href='pessoa/visualizar/$pessoa->id'>$pessoa->nome</a>
											</td>
											<td>
												<a href='pessoa/visualizar/$pessoa->id'>".telefoneMask($pessoa->telefone)."</a>
											</td>
											<td>
												<i class='icon-circle light-$corStatus middle'></i>
												<a href='pessoa/visualizar/$pessoa->id'> $pessoa->status</a>
											</td>
						
											<td style='text-align:center;'>
												<a href='pessoa/visualizar/$pessoa->id' class='btn btn-info'>
													<i class='icon-info-sign'></i>
													Ver
												</a>
												<a href='pessoa/editar/$pessoa->id' class='btn btn-primary'>
													<i class='icon-edit'></i>
													Editar
												</a>
												<a href='pessoa/excluir/$pessoa->id' class='btn btn-danger'>
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

