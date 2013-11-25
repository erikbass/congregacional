<div class="row-fluid">
	<div class="span">
		<div class="widget-box">
			<div class="widget-header widget-header-flat">
				<h4 class="lighter">
					<i class="icon-star orange"></i>
					Tela de edição
				</h4>
			</div>
			<br>
			<a href="javascript:back(-1);" class="btn btn-small btn-info">
				<i class="icon-arrow-left"></i>
				Voltar p/ lista
			</a>
			<a href="../../pessoa/visualizar/<?= $pessoa->id ?>" class="btn btn-small btn-success">
				<i class="icon-user"></i>
				Ver perfil
			</a>

			<div class="row">
				<div class="col-sm-4" style="margin:30px auto; float:none;">
					


					<div class="widget-box">
						<div class="widget-header">							
							<h4>
								<i class="icon-user"></i>
								Editar: <?= $pessoa->nome ?>
							</h4>
						</div>

						<?php 
						echo validation_errors();
						echo form_open('pessoa/editar');
						?>
							<div class="widget-body">
								<div class="widget-body-inner" style="display: block;">
									<div class="widget-main">
										<input type="hidden" name="id" value="<?= $pessoa->id ?>">

										<label for="nome">Nome</label>
										<div>
											<input type="text" name="nome" id="nome" value="<?= $pessoa->nome ?>" class="form-control">
										</div>

										<div>
											<?php
												$selected_f = ''; $selected_m = '';
												if($pessoa->sexo == 'm'){
													$selected_m = 'selected';
												} elseif ($pessoa->sexo == 'f') {
													$selected_f = 'selected';
												}
											?>
											<label for="sexo">Sexo</label>											
											<select name="sexo" id="sexo" class="form-control">
												<option value="f" <?= $selected_f ?>>Feminino</option>
												<option value="m" <?= $selected_m ?>>Masculino</option>
											</select>
										</div>

										<div>
											<label for="data">Data de nascimento</label>
											<div class="input-group">
												<input type="text" data-date-format="dd/mm/yyyy" id="data_nascimento" name="data_nascimento" class="form-control date-picker input-mask-date" value="<?= dataMask($pessoa->data_nascimento) ?>">
												<span class="input-group-addon">
													<i class="icon-calendar bigger-110"></i>
												</span>
											</div>
										</div>

										<div>
											<label for="telefone">
												Telefone
												<small class="text-warning">(99) 9999-9999</small>
											</label>

											<div class="input-group">										
												<input type="text" id="telefone" name="telefone" class="form-control input-mask-phone" value="<?= $pessoa->telefone ?>">
												<span class="input-group-addon">
													<i class="icon-phone"></i>
												</span>
											</div>
										</div>

										<div>
											<label for="email">
												Email
											</label>

											<div class="input-group">
												<input type="text" id="email" name="email" class="form-control" value="<?= $pessoa->email ?>">
												<span class="input-group-addon">
													<i class="icon-envelope"></i>
												</span>
												
											</div>
										</div>

										<label for="bairro">Bairro</label>
										<div><input id="bairro" type="text" name="bairro" class="form-control" value="<?= $pessoa->bairro ?>"></div>

										<label for="rua">Rua/número</label>
										<div><input id="rua" type="text" name="rua_numero" class="form-control" value="<?= $pessoa->rua_numero ?>"></div>

										<div>
											<label for="visita">Status</label>											
											<select name="status" id="status" class="form-control">
												<?php
													comboStatus($pessoa->status_id);
												?>
											</select>
										</div>

										<div id="dataBatismo">
											<label for="data">Data do batismo</label>
											<div class="input-group">
												<input type="text" data-date-format="dd/mm/yyyy" id="data_batismo" name="data_batismo" class="form-control date-picker input-mask-date" value="<?= dataMask($pessoa->data_batismo) ?>">
												<span class="input-group-addon">
													<i class="icon-calendar bigger-110"></i>
												</span>
											</div>
										</div>

										<div class="form-actions center">
											<button class="btn btn-sm btn-info" type="submit">
												Salvar
												<i class="icon-save"></i>
											</button>
										</div>								
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			
		</div><!--/widget-box-->
	</div>
</div>

<script type="text/javascript">
	jQuery(function($) {
		$.mask.definitions['~']='[+-]';
		$('.input-mask-date').mask('99/99/9999');
		$('.input-mask-phone').mask('(99) 9999-9999');

		$('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
	});
</script>