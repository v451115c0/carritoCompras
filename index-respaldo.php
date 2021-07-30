<?php 

session_name('carrito');
session_start();

if(empty($_SESSION["code"]))
{
	header ('Location: https://mitiendanikken.com/');
	exit;
}
else
{
	$name_abi = $_SESSION["name"];
	$country_abi = $_SESSION["country"];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Incorporación 7/10 - Un comienzo ganador">
    <meta name="author" content="NIKKEN Latinoamérica">
    <title>Carrito de compras | NIKKEN Latinoamérica</title>

    <!-- No indexación -->
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<!-- No indexación -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="custom/img/icons/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="custom/img/icons/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="custom/img/icons/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="custom/img/icons/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="custom/img/icons/apple-touch-icon-144x144-precomposed.png">

	<!-- Librerias de notificaciones   -->
    <link href="plugins/notification/animate.min.css" rel="stylesheet"/>
    <link href="plugins/notification/paper-dashboard.css" rel="stylesheet"/>

    <!--BUSCADOR EDDIE-->
    <link href="custom/css/search-multiple.css" rel="stylesheet">

	<!-- Librerias adicionales -->
	<link href="custom/css/main.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6 ">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-address-card"></i> Bienvenido <strong><?php echo $name_abi ?></strong></a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/Nikkenlatinoamerica" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/nikkenlatam/" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://www.youtube.com/user/nikkenlatinoamerica/videos?flow=grid&view=1" target="_blank"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="custom/img/logos/logo.png" alt="NIKKEN" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<button class="btn btn-success" data-toggle="modal" data-target="#modal-shopping">Carrito de compras <i class="fa fa-shopping-basket"></i></button>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	</header>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="features_items"><!--features_items-->						
						<div class="row">
				           <div class="col-sm-12">
				               	<div class="form-group text-center">
				               		<label for="ss-name-filter">A continuación ingresa el código o nombre del producto que quieres añadir al carrito de compras <i class="fa fa-shopping-basket"></i></label>             
				                    <div class="form-group margin-top">
										<div class="input-group">
											<input type="text" class="form-control text-center" id="ss-name-filter" placeholder="Código o nombre del producto">
											<div class="input-group-addon"><i class="fa fa-search"></i></div>
										</div>
									</div>
									<?php 

									if($country_abi == 1)
									{
										?>
										<div class="row">
											<div class="col-sm-6">
												<input type="radio" name="optionsRadios" id="optionsRadios1" value="1" onclick="Change_discount(1);" checked><strong>&nbsp;<u>Es una compra para mi</u></strong>
											</div>
											<div class="col-sm-6">
												<input type="radio" name="optionsRadios" id="optionsRadios2" value="0" onclick="Change_discount(0);"><strong>&nbsp;<u>Es una compra para mi cliente</u></strong>
											</div>
										</div>
										<?php
									}

									?>
				                </div>
				           </div>
				        </div>
				        <hr style="border: 1px solid #007E47; border-style: dashed; margin-top: 5px;">
						<div id="view-products" class="ss-box"></div>

					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>

	<div class="modal fade" id="modal-shopping">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center">Productos en el carrito</h4>
				</div>
				<div class="modal-body">
					<div id="view-detail-products"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Añadir mas productos <i class="fa fa-shopping-basket"></i></button>
					<button type="button" class="btn btn-success" onclick="Checkout();" id="btn-process">Proceder a pagar</button>
				</div>
			</div>
		</div>
	</div>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2018 <strong>NIKKEN Latinoamérica</strong>. Todos los derechos reservados.</p>
				</div>
			</div>
		</div>
	</footer><!--/Footer-->
	
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>

    <!-- Librerias adicionales -->
    <script src="plugins/Interpretador Ajax/interpretadorAjax.js"></script>
    <script src="plugins/buscadorDiv/simpleSort.js"></script>

    <!-- Librerias de notificaciones   -->
    <script src="plugins/notification/bootstrap-notify.js"></script>
	
	<!--buscador-->
	<script src="custom/js/custom-search-multiple.js"></script>
	
	<script src="custom/js/main.js"></script>
	<script src="custom/js/smooth-scroll.min.js"></script>
    <script>View_products(); View_detail_products();</script>
	
	<?php 
		if($_SESSION["kit"] == 1) 
		{
			?>
			<script>
		    	$("#modal-shopping").modal();
		    </script>
			<?php
		}
	?>

	<script type="text/javascript" src="plugins/Inactivo/inactivo.js"></script> <!-- CERRAR SESION INACTIVO -->
	<script> $.idle(600, function() {window.location.href = "http://mitiendanikken.com/"; }); </script><!-- CERRAR SESION INACTIVO -->
    
</body>
</html>