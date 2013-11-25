<div class="span6">

	<?php
		if(empty($visitante->foto)){
			$foto = 'foto-default.jpg';
		} else {
			$foto = $visitante->foto;
		}
	?>
				
	<div class="row">
		<div class="widget-header widget-header-flat">
			<h4 class="lighter">
				<i class="icon-user orange"></i>
				Visitante
			</h4>
		</div>

		<div class="col-xs-12 col-sm-9">
			<h4 class="blue">
				<span class="middle"><?= $visitante->nome ?></span>
			</h4>

			<div class="profile-user-info">

				<div class="profile-info-row">
					<div class="profile-info-name"> Endereço </div>

					<div class="profile-info-value">
						<i class="icon-map-marker light-orange bigger-110"></i>
						<span><?= $visitante->rua_numero ?></span>. Bairro <?= $visitante->bairro ?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Telefone </div>

					<div class="profile-info-value">
						<span><?= telefoneMask($visitante->telefone) ?></span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Convidado por </div>

					<div class="profile-info-value">
						<span><?= $visitante->convidado_por ?></span>
					</div>
				</div>

			</div>

			<div class="hr hr-8 dotted"></div>

			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name"> Email: </div>

					<div class="profile-info-value">
						<a target="_blank" href="mailto:<?= $visitante->email ?>"><?= $visitante->email ?></a>
					</div>
				</div>
			</div>
		</div><!-- /span -->
	</div>
	<hr>	
	<br>

	<a class="btn btn-small btn-info" href="../../visitante">
		<i class="icon-arrow-left"></i>
		Voltar p/ lista
	</a>
	<a class="btn btn-sm btn-success" href="../../pessoa/editar/<?= $visitante->id_pessoa ?>">
		<i class="icon-edit"></i>
		<span class="bigger-110">Editar</span>
	</a>

</div>