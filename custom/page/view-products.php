<?php 

require_once('../../functions.php'); /*Funciones*/

session_name('carrito');
session_start();

/*vars*/
$country = $_SESSION["country"];
/*vars*/
if ($country == 2) {
	

?>
<div class="container page-title col-md-12 searchable-container" id="descanso">
	<blockquote class="blockquote items">
		<center> Descanso</center>

	</blockquote>
	<?php 
	$queryResult = $pdo->prepare("SELECT DISTINCT t0.sku, t0.nombre_producto, t0.precio_sugerido, t0.aplica_iva, t1.valor, t0.tags, t0.puntos, t0.vc_mayoreo from control_art t0 inner join control_iva t1 on t0.pais = t1.pais where t0.pais = :country and t0.aplica_tv = 1 and t0.esta_activo = 1 and t0.precio_sugerido > 0 and t0.valido_desde <= now() and t0.valido_hasta >= now() and t0.marca = 2");
	$queryResult->execute(array(':country' => $country));
	while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
	{
		$format_name = remove_tilde($row['nombre_producto']);
		$price = $row['precio_sugerido'];
		$apply_iva = $row['aplica_iva'];
		$iva = $row['valor'];
		$money = Type_money($country);

		$total = $price;
		if($apply_iva == 1)
		{
			$total = $total * $iva;
		}

		?>



		<div class="col-sm-3 items" data-name="<?php echo $row['nombre_producto'] . $row['sku'] . $format_name ?>" >
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<img src="https://tv-store.s3.amazonaws.com/Products/images/<?php echo $row['sku'] ?>.jpg" alt="NIKKEN" />
						<h2><?php echo $money . " " . number_format($total, 2) ?></h2>
						<p><strong><?php echo $row['sku'] ?></strong>&nbsp;&nbsp;<?php echo $row['nombre_producto'] ?></p>
						<a onclick="Add_product('<?php echo $row['sku'] ?>');" data-toggle="modal" href='#modal-shopping' class="btn btn-default add-to-cart"><i class="fa fa-shopping-basket"></i> Agregar al carrito</a>
					</div>
				</div>
				<div class="choose">
					<ul class="nav nav-pills nav-justified">
						<li><a href=""><i class="fa fa-plus-square"></i>Puntos: <?php echo number_format($row['puntos'], 0) ?></a></li>
						<li><a href=""><i class="fa fa-plus-square"></i>VC: <?php echo number_format($row['vc_mayoreo'], 2) ?></a></li>
					</ul>
				</div>
			</div>
		</div>

		<?php
	}
	?>	</div>
	<div class="container page-title col-md-12 searchable-container" id="agua">
		<blockquote class="blockquote items" >
			<center> Agua </center>

		</blockquote>

		<?php 


		$queryResult = $pdo->prepare("SELECT DISTINCT t0.sku, t0.nombre_producto, t0.precio_sugerido, t0.aplica_iva, t1.valor, t0.tags, t0.puntos, t0.vc_mayoreo from control_art t0 inner join control_iva t1 on t0.pais = t1.pais where t0.pais = :country and t0.aplica_tv = 1 and t0.esta_activo = 1 and t0.precio_sugerido > 0 and t0.valido_desde <= now() and t0.valido_hasta >= now() and t0.marca = 3");
		$queryResult->execute(array(':country' => $country));
		while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
		{
			$format_name = remove_tilde($row['nombre_producto']);
			$price = $row['precio_sugerido'];
			$apply_iva = $row['aplica_iva'];
			$iva = $row['valor'];
			$money = Type_money($country);

			$total = $price;
			if($apply_iva == 1)
			{
				$total = $total * $iva;
			}

			?>
			
				<div class="col-sm-3 items" data-name="<?php echo $row['nombre_producto'] . $row['sku'] . $format_name ?>" >
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="https://tv-store.s3.amazonaws.com/Products/images/<?php echo $row['sku'] ?>.jpg" alt="NIKKEN" />
								<h2><?php echo $money . " " . number_format($total, 2) ?></h2>
								<p><strong><?php echo $row['sku'] ?></strong>&nbsp;&nbsp;<?php echo $row['nombre_producto'] ?></p>
								<a onclick="Add_product('<?php echo $row['sku'] ?>');" data-toggle="modal" href='#modal-shopping' class="btn btn-default add-to-cart"><i class="fa fa-shopping-basket"></i> Agregar al carrito</a>
							</div>
						</div>
						<div class="choose">
							<ul class="nav nav-pills nav-justified">
								<li><a href=""><i class="fa fa-plus-square"></i>Puntos: <?php echo number_format($row['puntos'], 0) ?></a></li>
								<li><a href=""><i class="fa fa-plus-square"></i>VC: <?php echo number_format($row['vc_mayoreo'], 2) ?></a></li>
							</ul>
						</div>
					</div>
				</div>

				<?php
			}

			?>
		</div>
			<div class="container page-title col-md-12 searchable-container" id="aire">
		<blockquote class="blockquote items">
			<center> Aire </center>

		</blockquote>

		<?php 


		$queryResult = $pdo->prepare("SELECT DISTINCT t0.sku, t0.nombre_producto, t0.precio_sugerido, t0.aplica_iva, t1.valor, t0.tags, t0.puntos, t0.vc_mayoreo from control_art t0 inner join control_iva t1 on t0.pais = t1.pais where t0.pais = :country and t0.aplica_tv = 1 and t0.esta_activo = 1 and t0.precio_sugerido > 0 and t0.valido_desde <= now() and t0.valido_hasta >= now() and t0.marca = 4");
		$queryResult->execute(array(':country' => $country));
		while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
		{
			$format_name = remove_tilde($row['nombre_producto']);
			$price = $row['precio_sugerido'];
			$apply_iva = $row['aplica_iva'];
			$iva = $row['valor'];
			$money = Type_money($country);

			$total = $price;
			if($apply_iva == 1)
			{
				$total = $total * $iva;
			}

			?>
			
				<div class="col-sm-3 items" data-name="<?php echo $row['nombre_producto'] . $row['sku'] . $format_name ?>" >
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="https://tv-store.s3.amazonaws.com/Products/images/<?php echo $row['sku'] ?>.jpg" alt="NIKKEN" />
								<h2><?php echo $money . " " . number_format($total, 2) ?></h2>
								<p><strong><?php echo $row['sku'] ?></strong>&nbsp;&nbsp;<?php echo $row['nombre_producto'] ?></p>
								<a onclick="Add_product('<?php echo $row['sku'] ?>');" data-toggle="modal" href='#modal-shopping' class="btn btn-default add-to-cart"><i class="fa fa-shopping-basket"></i> Agregar al carrito</a>
							</div>
						</div>
						<div class="choose">
							<ul class="nav nav-pills nav-justified">
								<li><a href=""><i class="fa fa-plus-square"></i>Puntos: <?php echo number_format($row['puntos'], 0) ?></a></li>
								<li><a href=""><i class="fa fa-plus-square"></i>VC: <?php echo number_format($row['vc_mayoreo'], 2) ?></a></li>
							</ul>
						</div>
					</div>
				</div>

				<?php
			}

			?>
		</div>
			<div class="container page-title col-md-12 searchable-container" id="luz">
		<blockquote class="blockquote items">
			<center> Luz </center>

		</blockquote>

		<?php 


		$queryResult = $pdo->prepare("SELECT DISTINCT t0.sku, t0.nombre_producto, t0.precio_sugerido, t0.aplica_iva, t1.valor, t0.tags, t0.puntos, t0.vc_mayoreo from control_art t0 inner join control_iva t1 on t0.pais = t1.pais where t0.pais = :country and t0.aplica_tv = 1 and t0.esta_activo = 1 and t0.precio_sugerido > 0 and t0.valido_desde <= now() and t0.valido_hasta >= now() and t0.marca = 5");
		$queryResult->execute(array(':country' => $country));
		while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
		{
			$format_name = remove_tilde($row['nombre_producto']);
			$price = $row['precio_sugerido'];
			$apply_iva = $row['aplica_iva'];
			$iva = $row['valor'];
			$money = Type_money($country);

			$total = $price;
			if($apply_iva == 1)
			{
				$total = $total * $iva;
			}

			?>
			
				<div class="col-sm-3 items" data-name="<?php echo $row['nombre_producto'] . $row['sku'] . $format_name ?>" >
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="https://tv-store.s3.amazonaws.com/Products/images/<?php echo $row['sku'] ?>.jpg" alt="NIKKEN" />
								<h2><?php echo $money . " " . number_format($total, 2) ?></h2>
								<p><strong><?php echo $row['sku'] ?></strong>&nbsp;&nbsp;<?php echo $row['nombre_producto'] ?></p>
								<a onclick="Add_product('<?php echo $row['sku'] ?>');" data-toggle="modal" href='#modal-shopping' class="btn btn-default add-to-cart"><i class="fa fa-shopping-basket"></i> Agregar al carrito</a>
							</div>
						</div>
						<div class="choose">
							<ul class="nav nav-pills nav-justified">
								<li><a href=""><i class="fa fa-plus-square"></i>Puntos: <?php echo number_format($row['puntos'], 0) ?></a></li>
								<li><a href=""><i class="fa fa-plus-square"></i>VC: <?php echo number_format($row['vc_mayoreo'], 2) ?></a></li>
							</ul>
						</div>
					</div>
				</div>

				<?php
			}

			?>
		</div>
		<div class="container page-title col-md-12 searchable-container" id="nutricion">
		<blockquote class="blockquote items">
			<center> Nutricion</center>

		</blockquote>

		<?php 


		$queryResult = $pdo->prepare("SELECT DISTINCT t0.sku, t0.nombre_producto, t0.precio_sugerido, t0.aplica_iva, t1.valor, t0.tags, t0.puntos, t0.vc_mayoreo from control_art t0 inner join control_iva t1 on t0.pais = t1.pais where t0.pais = :country and t0.aplica_tv = 1 and t0.esta_activo = 1 and t0.precio_sugerido > 0 and t0.valido_desde <= now() and t0.valido_hasta >= now() and t0.marca = 6");
		$queryResult->execute(array(':country' => $country));
		while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
		{
			$format_name = remove_tilde($row['nombre_producto']);
			$price = $row['precio_sugerido'];
			$apply_iva = $row['aplica_iva'];
			$iva = $row['valor'];
			$money = Type_money($country);

			$total = $price;
			if($apply_iva == 1)
			{
				$total = $total * $iva;
			}

			?>
			
				<div class="col-sm-3 items" data-name="<?php echo $row['nombre_producto'] . $row['sku'] . $format_name ?>" >
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="https://tv-store.s3.amazonaws.com/Products/images/<?php echo $row['sku'] ?>.jpg" alt="NIKKEN" />
								<h2><?php echo $money . " " . number_format($total, 2) ?></h2>
								<p><strong><?php echo $row['sku'] ?></strong>&nbsp;&nbsp;<?php echo $row['nombre_producto'] ?></p>
								<a onclick="Add_product('<?php echo $row['sku'] ?>');" data-toggle="modal" href='#modal-shopping' class="btn btn-default add-to-cart"><i class="fa fa-shopping-basket"></i> Agregar al carrito</a>
							</div>
						</div>
						<div class="choose">
							<ul class="nav nav-pills nav-justified">
								<li><a href=""><i class="fa fa-plus-square"></i>Puntos: <?php echo number_format($row['puntos'], 0) ?></a></li>
								<li><a href=""><i class="fa fa-plus-square"></i>VC: <?php echo number_format($row['vc_mayoreo'], 2) ?></a></li>
							</ul>
						</div>
					</div>
				</div>

				<?php
			}

			?>
		</div>
		<div class="container page-title col-md-12 searchable-container" id="accesorios">
		<blockquote class="blockquote items">
			<center> Accesorios </center>

		</blockquote>

		<?php 


		$queryResult = $pdo->prepare("SELECT DISTINCT t0.sku, t0.nombre_producto, t0.precio_sugerido, t0.aplica_iva, t1.valor, t0.tags, t0.puntos, t0.vc_mayoreo from control_art t0 inner join control_iva t1 on t0.pais = t1.pais where t0.pais = :country and t0.aplica_tv = 1 and t0.esta_activo = 1 and t0.precio_sugerido > 0 and t0.valido_desde <= now() and t0.valido_hasta >= now() and t0.marca = 7");
		$queryResult->execute(array(':country' => $country));
		while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
		{
			$format_name = remove_tilde($row['nombre_producto']);
			$price = $row['precio_sugerido'];
			$apply_iva = $row['aplica_iva'];
			$iva = $row['valor'];
			$money = Type_money($country);

			$total = $price;
			if($apply_iva == 1)
			{
				$total = $total * $iva;
			}

			?>
			
				<div class="col-sm-3 items" data-name="<?php echo $row['nombre_producto'] . $row['sku'] . $format_name ?>" >
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="https://tv-store.s3.amazonaws.com/Products/images/<?php echo $row['sku'] ?>.jpg" alt="NIKKEN" />
								<h2><?php echo $money . " " . number_format($total, 2) ?></h2>
								<p><strong><?php echo $row['sku'] ?></strong>&nbsp;&nbsp;<?php echo $row['nombre_producto'] ?></p>
								<a onclick="Add_product('<?php echo $row['sku'] ?>');" data-toggle="modal" href='#modal-shopping' class="btn btn-default add-to-cart"><i class="fa fa-shopping-basket"></i> Agregar al carrito</a>
							</div>
						</div>
						<div class="choose">
							<ul class="nav nav-pills nav-justified">
								<li><a href=""><i class="fa fa-plus-square"></i>Puntos: <?php echo number_format($row['puntos'], 0) ?></a></li>
								<li><a href=""><i class="fa fa-plus-square"></i>VC: <?php echo number_format($row['vc_mayoreo'], 2) ?></a></li>
							</ul>
						</div>
					</div>
				</div>

				<?php
			}

			?>
		</div>

		<div class="container page-title col-md-12 searchable-container" id="soporte">
		<blockquote class="blockquote items">
			<center> Soporte </center>

		</blockquote>

		<?php 


		$queryResult = $pdo->prepare("SELECT DISTINCT t0.sku, t0.nombre_producto, t0.precio_sugerido, t0.aplica_iva, t1.valor, t0.tags, t0.puntos, t0.vc_mayoreo from control_art t0 inner join control_iva t1 on t0.pais = t1.pais where t0.pais = :country and t0.aplica_tv = 1 and t0.esta_activo = 1 and t0.precio_sugerido > 0 and t0.valido_desde <= now() and t0.valido_hasta >= now() and t0.marca = 8");
		$queryResult->execute(array(':country' => $country));
		while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
		{
			$format_name = remove_tilde($row['nombre_producto']);
			$price = $row['precio_sugerido'];
			$apply_iva = $row['aplica_iva'];
			$iva = $row['valor'];
			$money = Type_money($country);

			$total = $price;
			if($apply_iva == 1)
			{
				$total = $total * $iva;
			}

			?>
			
				<div class="col-sm-3 items" data-name="<?php echo $row['nombre_producto'] . $row['sku'] . $format_name ?>" >
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="https://tv-store.s3.amazonaws.com/Products/images/<?php echo $row['sku'] ?>.jpg" alt="NIKKEN" />
								<h2><?php echo $money . " " . number_format($total, 2) ?></h2>

								<p><strong><?php echo $row['sku'] ?></strong>&nbsp;&nbsp;<?php echo $row['nombre_producto'] ?></p>
								<a onclick="Add_product('<?php echo $row['sku'] ?>');" data-toggle="modal" href='#modal-shopping' class="btn btn-default add-to-cart"><i class="fa fa-shopping-basket"></i> Agregar al carrito</a>
							</div>
						</div>
						<div class="choose">
							<ul class="nav nav-pills nav-justified">
								<li><a href=""><i class="fa fa-plus-square"></i>Puntos: <?php echo number_format($row['puntos'], 0) ?></a></li>
								<li><a href=""><i class="fa fa-plus-square"></i>VC: <?php echo number_format($row['vc_mayoreo'], 2) ?></a></li>
							</ul>
						</div>
					</div>
				</div>

				<?php
			}

			?>
		</div>
		<div class="container page-title col-md-12 searchable-container" id="joyeria">
		<blockquote class="blockquote items">
			<center> Joyería </center>

		</blockquote>

		<?php 


		$queryResult = $pdo->prepare("SELECT DISTINCT t0.sku, t0.nombre_producto, t0.precio_sugerido, t0.aplica_iva, t1.valor, t0.tags, t0.puntos, t0.vc_mayoreo from control_art t0 inner join control_iva t1 on t0.pais = t1.pais where t0.pais = :country and t0.aplica_tv = 1 and t0.esta_activo = 1 and t0.precio_sugerido > 0 and t0.valido_desde <= now() and t0.valido_hasta >= now() and t0.marca = 9");
		$queryResult->execute(array(':country' => $country));
		while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
		{
			$format_name = remove_tilde($row['nombre_producto']);
			$price = $row['precio_sugerido'];
			$apply_iva = $row['aplica_iva'];
			$iva = $row['valor'];
			$money = Type_money($country);

			$total = $price;
			if($apply_iva == 1)
			{
				$total = $total * $iva;
			}

			?>
			
				<div class="col-sm-3 items" data-name="<?php echo $row['nombre_producto'] . $row['sku'] . $format_name ?>" >
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="https://tv-store.s3.amazonaws.com/Products/images/<?php echo $row['sku'] ?>.jpg" alt="NIKKEN" />
								<h2><?php echo $money . " " . number_format($total, 2) ?></h2>
								<p><strong><?php echo $row['sku'] ?></strong>&nbsp;&nbsp;<?php echo $row['nombre_producto'] ?></p>
								<a onclick="Add_product('<?php echo $row['sku'] ?>');" data-toggle="modal" href='#modal-shopping' class="btn btn-default add-to-cart"><i class="fa fa-shopping-basket"></i> Agregar al carrito</a>
							</div>
						</div>
						<div class="choose">
							<ul class="nav nav-pills nav-justified">
								<li><a href=""><i class="fa fa-plus-square"></i>Puntos: <?php echo number_format($row['puntos'], 0) ?></a></li>
								<li><a href=""><i class="fa fa-plus-square"></i>VC: <?php echo number_format($row['vc_mayoreo'], 2) ?></a></li>
							</ul>
						</div>
					</div>
				</div>

				<?php
			}

			?>
		</div>
		<div class="container page-title col-md-12 searchable-container" id="cuidadodelapiel">
		<blockquote class="blockquote items">
			<center> Cuidado de la piel </center>

		</blockquote>

		<?php 


		$queryResult = $pdo->prepare("SELECT DISTINCT t0.sku, t0.nombre_producto, t0.precio_sugerido, t0.aplica_iva, t1.valor, t0.tags, t0.puntos, t0.vc_mayoreo from control_art t0 inner join control_iva t1 on t0.pais = t1.pais where t0.pais = :country and t0.aplica_tv = 1 and t0.esta_activo = 1 and t0.precio_sugerido > 0 and t0.valido_desde <= now() and t0.valido_hasta >= now() and t0.marca = 10");
		$queryResult->execute(array(':country' => $country));
		while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
		{
			$format_name = remove_tilde($row['nombre_producto']);
			$price = $row['precio_sugerido'];
			$apply_iva = $row['aplica_iva'];
			$iva = $row['valor'];
			$money = Type_money($country);

			$total = $price;
			if($apply_iva == 1)
			{
				$total = $total * $iva;
			}

			?>
			
				<div class="col-sm-3 items" data-name="<?php echo $row['nombre_producto'] . $row['sku'] . $format_name ?>" >
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="https://tv-store.s3.amazonaws.com/Products/images/<?php echo $row['sku'] ?>.jpg" alt="NIKKEN" />
								<h2><?php echo $money . " " . number_format($total, 2) ?></h2>
								<p><strong><?php echo $row['sku'] ?></strong>&nbsp;&nbsp;<?php echo $row['nombre_producto'] ?></p>
								<a onclick="Add_product('<?php echo $row['sku'] ?>');" data-toggle="modal" href='#modal-shopping' class="btn btn-default add-to-cart"><i class="fa fa-shopping-basket"></i> Agregar al carrito</a>
							</div>
						</div>
						<div class="choose">
							<ul class="nav nav-pills nav-justified">
								<li><a href=""><i class="fa fa-plus-square"></i>Puntos: <?php echo number_format($row['puntos'], 0) ?></a></li>
								<li><a href=""><i class="fa fa-plus-square"></i>VC: <?php echo number_format($row['vc_mayoreo'], 2) ?></a></li>
							</ul>
						</div>
					</div>
				</div>

				<?php
			}

			?>
		</div>
		<div class="page-title col-md-12 searchable-container" id="aseo">
		<blockquote class="blockquote items">
			<center> Aseo </center>

		</blockquote>

		<?php 


		$queryResult = $pdo->prepare("SELECT DISTINCT t0.sku, t0.nombre_producto, t0.precio_sugerido, t0.aplica_iva, t1.valor, t0.tags, t0.puntos, t0.vc_mayoreo from control_art t0 inner join control_iva t1 on t0.pais = t1.pais where t0.pais = :country and t0.aplica_tv = 1 and t0.esta_activo = 1 and t0.precio_sugerido > 0 and t0.valido_desde <= now() and t0.valido_hasta >= now() and t0.marca = 11");
		$queryResult->execute(array(':country' => $country));
		while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
		{
			$format_name = remove_tilde($row['nombre_producto']);
			$price = $row['precio_sugerido'];
			$apply_iva = $row['aplica_iva'];
			$iva = $row['valor'];
			$money = Type_money($country);

			$total = $price;
			if($apply_iva == 1)
			{
				$total = $total * $iva;
			}

			?>
			
				<div class="col-sm-3 items" data-name="<?php echo $row['nombre_producto'] . $row['sku'] . $format_name ?>" >
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="https://tv-store.s3.amazonaws.com/Products/images/<?php echo $row['sku'] ?>.jpg" alt="NIKKEN" />
								<h2><?php echo $money . " " . number_format($total, 2) ?></h2>
								<p><strong><?php echo $row['sku'] ?></strong>&nbsp;&nbsp;<?php echo $row['nombre_producto'] ?></p>
								<a onclick="Add_product('<?php echo $row['sku'] ?>');" data-toggle="modal" href='#modal-shopping' class="btn btn-default add-to-cart"><i class="fa fa-shopping-basket"></i> Agregar al carrito</a>
							</div>
						</div>
						<div class="choose">
							<ul class="nav nav-pills nav-justified">
								<li><a href=""><i class="fa fa-plus-square"></i>Puntos: <?php echo number_format($row['puntos'], 0) ?></a></li>
								<li><a href=""><i class="fa fa-plus-square"></i>VC: <?php echo number_format($row['vc_mayoreo'], 2) ?></a></li>
							</ul>
						</div>
					</div>
				</div>

				<?php
			}

			?>
		</div>
		<div class="container page-title col-md-12 searchable-container" id="otros">
		<blockquote class="blockquote items">
			<center> Otros </center>

		</blockquote>

		<?php 


		$queryResult = $pdo->prepare("SELECT DISTINCT t0.sku, t0.nombre_producto, t0.precio_sugerido, t0.aplica_iva, t1.valor, t0.tags, t0.puntos, t0.vc_mayoreo from control_art t0 inner join control_iva t1 on t0.pais = t1.pais where t0.pais = :country and t0.aplica_tv = 1 and t0.esta_activo = 1 and t0.precio_sugerido > 0 and t0.valido_desde <= now() and t0.valido_hasta >= now() and t0.marca != 2 and t0.marca != 3 and t0.marca != 4 and t0.marca != 5 and t0.marca != 6 and t0.marca != 7 and t0.marca != 8 and t0.marca != 9 and t0.marca != 10 and t0.marca != 11");
		$queryResult->execute(array(':country' => $country));
		while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
		{
			$format_name = remove_tilde($row['nombre_producto']);
			$price = $row['precio_sugerido'];
			$apply_iva = $row['aplica_iva'];
			$iva = $row['valor'];
			$money = Type_money($country);

			$total = $price;
			if($apply_iva == 1)
			{
				$total = $total * $iva;
			}

			?>
			
				<div class="col-sm-3 items" data-name="<?php echo $row['nombre_producto'] . $row['sku'] . $format_name ?>" >
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="https://tv-store.s3.amazonaws.com/Products/images/<?php echo $row['sku'] ?>.jpg" alt="NIKKEN" />
								<h2><?php echo $money . " " . number_format($total, 2) ?></h2>
								<p><strong><?php echo $row['sku'] ?></strong>&nbsp;&nbsp;<?php echo $row['nombre_producto'] ?></p>
								<a onclick="Add_product('<?php echo $row['sku'] ?>');" data-toggle="modal" href='#modal-shopping' class="btn btn-default add-to-cart"><i class="fa fa-shopping-basket"></i> Agregar al carrito</a>
							</div>
						</div>
						<div class="choose">
							<ul class="nav nav-pills nav-justified">
								<li><a href=""><i class="fa fa-plus-square"></i>Puntos: <?php echo number_format($row['puntos'], 0) ?></a></li>
								<li><a href=""><i class="fa fa-plus-square"></i>VC: <?php echo number_format($row['vc_mayoreo'], 2) ?></a></li>
							</ul>
						</div>
					</div>
				</div>

				<?php
			}
			?>
</div>
<?php
		}else{
$queryResult = $pdo->prepare("SELECT DISTINCT t0.sku, t0.nombre_producto, t0.precio_sugerido, t0.aplica_iva, t1.valor, t0.tags, t0.puntos, t0.vc_mayoreo from control_art t0 inner join control_iva t1 on t0.pais = t1.pais where t0.pais = :country and t0.aplica_tv = 1 and t0.esta_activo = 1 and t0.precio_sugerido > 0 and t0.valido_desde <= now() and t0.valido_hasta >= now() order by RAND()");
$queryResult->execute(array(':country' => $country));
while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
{
	$format_name = remove_tilde($row['nombre_producto']);
	$price = $row['precio_sugerido'];
	$apply_iva = $row['aplica_iva'];
	$iva = $row['valor'];
	$money = Type_money($country);

	$total = $price;
	if($apply_iva == 1)
	{
		$total = $total * $iva;
	}

	?>
	<div class="col-sm-3" data-name="<?php echo $row['nombre_producto'] . $row['sku'] . $format_name ?>">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="https://tv-store.s3.amazonaws.com/Products/images/<?php echo $row['sku'] ?>.jpg" alt="NIKKEN" />
					<h2><?php echo $money . " " . number_format($total, 2) ?></h2>
					<p><?php echo $row['nombre_producto'] ?></p>
					<a onclick="Add_product('<?php echo $row['sku'] ?>');" data-toggle="modal" href='#modal-shopping' class="btn btn-default add-to-cart"><i class="fa fa-shopping-basket"></i> Agregar al carrito</a>
				</div>
			</div>
			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					<li><a href=""><i class="fa fa-plus-square"></i>Puntos: <?php echo number_format($row['puntos'], 0) ?></a></li>
					<li><a href=""><i class="fa fa-plus-square"></i>VC: <?php echo number_format($row['vc_mayoreo'], 2) ?></a></li>
				</ul>
			</div>
		</div>
	</div>
	<?php
}

?>

<!-- Habilitar buscador -->
<script>
	$(document).ready( function() {

	    var test = new simpleSort('.ss-box', 'div');

	    $('#ss-name-filter').on('propertychange change keyup paste input mouseup', function() {
	        test.filter('data-name', $(this).val());
	    });
	});    
</script>
<!-- Habilitar buscador -->
<?php

		}

			?>