<div class="row-fluid">
	<div class="span">
		<div class="widget-box">
			<div class="widget-header widget-header-flat">
				<h4 class="lighter">
					<i class="icon-star orange"></i>
					Nova pessoa
				</h4>
			</div>
			<div class="row">
				<div class="col-sm-4" style="margin:30px auto; float:none;">
					<div class="widget-box">
						<div class="widget-header">							
							<h4>
								<i class="icon-user"></i>
								Cadastrar pessoa
							</h4>
						</div>

						<?php 
						echo validation_errors();
						echo form_open('pessoa/novo');
						?>
							<div class="widget-body">
								<div class="widget-body-inner" style="display: block;">
									<div class="widget-main">
										<label for="nome">Nome</label>
										<div>
											<input type="text" name="nome" id="nome" value="<?= set_value('nome'); ?>" class="form-control">
										</div>

										<div>
											<label for="sexo">Sexo</label>											
											<select name="sexo" id="sexo" class="form-control">
												<option value="f">Feminino</option>
												<option value="m">Masculino</option>
											</select>
										</div>

										<div>
											<label for="data">Data de nascimento</label>
											<div class="input-group">
												<input type="text" data-date-format="dd/mm/yyyy" id="data_nascimento" name="data_nascimento" class="form-control date-picker input-mask-date" value="<?= set_value('data_nascimento'); ?>">
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
												<input type="text" id="telefone" name="telefone" class="form-control input-mask-phone" value="<?= set_value('telefone'); ?>">
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
												<input type="text" id="email" name="email" class="form-control" value="<?= set_value('email'); ?>">
												<span class="input-group-addon">
													<i class="icon-envelope"></i>
												</span>
												
											</div>
										</div>

										<label for="bairro">Bairro</label>
										<div><input id="bairro" type="text" name="bairro" class="form-control" value="<?= set_value('bairro'); ?>"></div>

										<label for="rua">Rua/número</label>
										<div><input id="rua" type="text" name="rua_numero" class="form-control" value="<?= set_value('rua_numero'); ?>"></div>

										<div>
											<label for="visita">Status</label>											
											<select name="status" id="status" class="form-control">
												<?php
													comboStatus();
												?>
											</select>
										</div>

										<div id="dataBatismo" style="display:none;">
											<label for="data">Data do batismo</label>
											<div class="input-group">
												<input type="text" data-date-format="dd/mm/yyyy" id="data_batismo" name="data_batismo" class="form-control date-picker input-mask-date" value="<?= set_value('data_batismo'); ?>">
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


	$("#status").change(function(){
		var opt = $("#status option:selected").val();

		if(opt == 1){
			$("#dataBatismo").show();
		} else {
			$("#dataBatismo").hide();
			$("#data_batismo").val("");
		}
	});
</script>