<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Área Administrativa</title>
        <link rel="shortcut icon" href="<?= ARQUIVOS ?>images/favicon.ico" />
		<meta name="description" content="This is page-header (.page-header &gt; h1)" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="<?= ARQUIVOS ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?= ARQUIVOS ?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?= ARQUIVOS ?>themes/font-awesome/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="<?= ARQUIVOS ?>themes/font-awesome/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?= ARQUIVOS ?>themes/css/prettify.css" />
		<link rel="stylesheet" href="<?= ARQUIVOS ?>fonts.css" />

		<link rel="stylesheet" href="<?= ARQUIVOS ?>themes/css/w8.min.css" />
		<link rel="stylesheet" href="<?= ARQUIVOS ?>themes/css/w8-responsive.min.css" />
		<link rel="stylesheet" href="<?= ARQUIVOS ?>themes/css/w8-skins.min.css" />

		<link rel="stylesheet" href="<?= ARQUIVOS ?>themes/css/ace.min.css" />
		<link rel="stylesheet" href="<?= ARQUIVOS ?>themes/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="<?= ARQUIVOS ?>themes/css/ace-skins.min.css" />

		<link rel="stylesheet" href="<?= ARQUIVOS ?>datepicker.css" />

		<!--basic scripts-->

		<script src="<?= ARQUIVOS ?>js/jquery.min.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write("&amp;amp;amp;lt;script src='<?= ARQUIVOS ?>themes/js/jquery-1.9.1.min.js'&amp;amp;amp;gt;"+"&amp;amp;amp;lt;"+"/script&amp;amp;amp;gt;");
		</script>
		<script src="<?= ARQUIVOS ?>bootstrap/js/bootstrap.min.js"></script>
		<script src="<?= ARQUIVOS ?>themes/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="<?= ARQUIVOS ?>themes/js/jquery.ui.touch-punch.min.js"></script>
		
		<script src="<?= ARQUIVOS ?>themes/js/jquery.slimscroll.min.js"></script>
		<script src="<?= ARQUIVOS ?>themes/js/jquery.easy-pie-chart.min.js"></script>
		<script src="<?= ARQUIVOS ?>themes/js/jquery.sparkline.min.js"></script>
		
		<script src="<?= ARQUIVOS ?>themes/js/jquery.flot.min.js"></script>
		<script src="<?= ARQUIVOS ?>themes/js/jquery.flot.pie.min.js"></script>
		<script src="<?= ARQUIVOS ?>themes/js/jquery.flot.resize.min.js"></script>

		<script src="<?= ARQUIVOS ?>js/bootstrap-datepicker.min.js"></script>
		<script src="<?= ARQUIVOS ?>js/jquery.maskedinput.min.js"></script>

		<!--w8 scripts-->

		<script src="<?= ARQUIVOS ?>themes/js/w8-elements.min.js"></script>
		<script src="<?= ARQUIVOS ?>themes/js/w8.min.js"></script>

		<!-- basic scripts end -->

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="<?= ARQUIVOS ?>themes/css/ace-ie.min.css" />
		<![endif]-->
	</head>
	<body class="navbar-fixed">
        <div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="#" class="brand">
						<small>
							<i class="icon-home"></i>
							IMW Areal - Consolidação
						</small>
					</a><!--/.brand-->

					<ul class="nav ace-nav pull-right">
						<li class="light-blue user-profile">
							<a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
								<img class="nav-user-photo" src="<?= ARQUIVOS ?>themes/images/user.png" alt="Jason's Photo">
								<span id="user_info">
									<small>Bem-Vindo,</small>
									<strong style="text-transform: capitalize;"><?= $this->session->userdata('login'); ?></strong>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer" id="user_menu">
								<li>
									<a href="/consolidacao/sistema/index.php/login/logout">
										<i class="icon-off"></i>Sair
									</a>
								</li>
							</ul>
						</li>
					</ul><!--/.w8-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>            
		<div class="container-fluid" id="main-container">
			<a id="menu-toggler" href="#">
				<span></span>
			</a>

			<div class="fixed" id="sidebar">				
				<ul class="nav nav-list">
					<li>
						<a href="<?= MENU ?>">
							<i class="icon-dashboard"></i>
							<span>Painel</span>
						</a>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="icon-user"></i>
							<span>Visitante</span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul style="display: none;" class="submenu">
							<li>
								<a href="<?= MENU ?>visitante/novo">
									<i class="icon-double-angle-right"></i>
									<b>Novo visitante</b>
								</a>
							</li>
							<li>
								<a href="<?= MENU ?>visitante">
									<i class="icon-double-angle-right"></i>
									<b>Ver todos</b>
								</a>
							</li>
						</ul>
					</li>
                                        
                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="icon-group"></i>
							<span>Pessoa</span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul style="display: none;" class="submenu">
							<li>
								<a href="<?= MENU ?>pessoa/novo">
									<i class="icon-double-angle-right"></i>
									<b>Nova pessoa</b>
								</a>
							</li>
							<li>
								<a href="<?= MENU ?>pessoa">
									<i class="icon-double-angle-right"></i>
									<b>Ver todos</b>
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="icon-book"></i>
							<span>Relatórios</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul style="display: none;" class="submenu">
							<li>
								<a href="javascript:void(0);">
									<i class="icon-double-angle-right"></i>
									<b>Em breve...</b>
								</a>
							</li>
						</ul>						
					</li>

					<li>
						
					</li>

					<li class="">
						<a class="dropdown-toggle" href="#">
							<i class="icon-file"></i>
							<span>Outras Opções</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu" style="display: none;">
							<li>
								<a href="<?= MENU ?>home/informacoes">
									<i class="icon-double-angle-right"></i>
									Informações
								</a>
							</li>
						</ul>
					</li>
				</ul>
				<div id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>

			<div id="main-content" class="clearfix">
				<div id="breadcrumbs" style="display:none;">
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="index.php">Home</a>

							<span class="divider">
								<i class="icon-angle-right"></i>
							</span>
						</li>
						<li class="active">Painel</li>
					</ul><!--.breadcrumb-->

					<div id="nav-search">
						<form class="form-search">
							<span class="input-icon">
								
								
							</span>
						</form>
					</div><!--#nav-search-->
				</div>

				<div id="page-content" class="clearfix">
					<div class="page-header position-relative">
						<h1>Painel<small>
							<i class="icon-double-angle-right"></i> Área administrativa</small>
						</h1>
					</div><!--/.page-header-->

					<?php
						if (@$_GET['result'] == 'success'){
							echo '
							<div class="alert alert-block alert-success">
								<button data-dismiss="alert" class="close" type="button">
									<i class="icon-remove"></i>
								</button>
								<i class="icon-ok green"></i>
								Operação realizada com sucesso!
							</div>';
						}
					?>

					<mp:Content/>

				</div><!--/#page-content-->

			</div><!--/#main-content-->
		</div><!--/.fluid-container#main-container-->

		<a href="#" id="btn-scroll-up" class="btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>
	</body>
</html>
