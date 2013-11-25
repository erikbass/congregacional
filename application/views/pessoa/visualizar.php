<div class="span6">

	<?php
		if(empty($pessoa->foto)){
			$foto = 'foto-default.jpg';
		} else {
			$foto = $pessoa->foto;
		}
	?>
				
	<div class="row">
		<div class="col-xs-12 col-sm-3 center">
			<span class="profile-picture">
				<img src="../../../fotos/<?= $foto ?>" id="foto" alt="<?= $pessoa->nome ?>" class="editable img-responsive">
			</span>

			<form method="post" action="../do_upload/<?= $pessoa->id ?>" enctype="multipart/form-data" />
				<input type="file" name="userfile" size="20" />
				<button type="submit" class="btn btn-small">
					<i class="icon-picture"></i>
					Enviar foto
				</button>
			</form>

			<div class="space space-4"></div>
		</div><!-- /span -->

		<div class="col-xs-12 col-sm-9">
			<h4 class="blue">
				<span class="middle"><?= $pessoa->nome ?></span>
				<?php
					if ($pessoa->status_id == 1){
						$corStatus = 'primary';
					} elseif ($pessoa->status_id == 2) {
						$corStatus = 'yellow';
					} else {
						$corStatus = 'red';
					}
				?>
				<span class="label label-<?= $corStatus ?> arrowed-in-right">
					<i class="icon-circle smaller-80 align-middle"></i>
					&nbsp;<?= $pessoa->status ?>
				</span>
			</h4>

			<div class="profile-user-info">

				<div class="profile-info-row">
					<div class="profile-info-name"> Endereço </div>

					<div class="profile-info-value">
						<i class="icon-map-marker light-orange bigger-110"></i>
						<span><?= $pessoa->rua_numero ?></span>. Bairro <?= $pessoa->bairro ?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Telefone </div>

					<div class="profile-info-value">
						<span><?= telefoneMask($pessoa->telefone) ?></span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name">Nascimento </div>

					<div class="profile-info-value">
						<span><?= dataMask($pessoa->data_nascimento) ?></span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Batismo </div>

					<div class="profile-info-value">
						<span><?= dataMask($pessoa->data_batismo) ?></span>
					</div>
				</div>

			</div>

			<div class="hr hr-8 dotted"></div>

			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name"> Email: </div>

					<div class="profile-info-value">
						<a target="_blank" href="mailto:<?= $pessoa->email ?>"><?= $pessoa->email ?></a>
					</div>
				</div>
			</div>
		</div><!-- /span -->
	</div>
	<hr>	
	<br>

	<a class="btn btn-small btn-info" href="../../pessoa">
		<i class="icon-arrow-left"></i>
		Voltar p/ lista
	</a>
	<a class="btn btn-sm btn-success" href="../editar/<?= $pessoa->id ?>">
		<i class="icon-edit"></i>
		<span class="bigger-110">Editar</span>
	</a>

</div>