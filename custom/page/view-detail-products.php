<?php 



require_once('../../functions.php'); /*Funciones*/



session_name('carrito');

session_start();



/*vars*/

$country = $_SESSION["country"];

$discount = $_SESSION["discount"];

$money = Type_money($country);

$sum_total = 0;

$sum_retail = 0;

$sum_discount = 0;

$counter = 0;

/*vars*/



foreach($_SESSION['products'] as $posicion => $products)

{

	list($sku, $quantity) = explode('-', $products);


	
	if($sku == '9707' || $sku == '9708' || $sku == '9709' || $sku == '9710' || $sku == '9711' || $sku == '9712' || $sku == '9713' || $sku == '9714' ){


		$queryResult = $pdo->prepare("SELECT DISTINCT t0.sku, CASE WHEN t0.nombre_producto is null or t0.nombre_producto = '' THEN t0.nombre_original_producto ELSE t0.nombre_producto END as nombre_producto, t0.precio_sugerido, t0.aplica_iva, t1.valor, t0.menudeo from control_art t0 inner join control_iva t1 on t0.pais = t1.pais where t0.sku = :sku and t0.pais = :country and t0.esta_activo = 1");

	}else{



		$queryResult = $pdo->prepare("SELECT DISTINCT t0.sku, CASE WHEN t0.nombre_producto is null or t0.nombre_producto = '' THEN t0.nombre_original_producto ELSE t0.nombre_producto END as nombre_producto, t0.precio_sugerido, t0.aplica_iva, t1.valor, t0.menudeo from control_art t0 inner join control_iva t1 on t0.pais = t1.pais where t0.sku = :sku and t0.pais = :country and t0.esta_activo = 1 and t0.precio_sugerido > 0");

	}
	
	$queryResult->execute(array(':country' => $country, ':sku' => $sku));

	$done = $queryResult->fetch();

	if($done)

	{

		$name_product = $done['nombre_producto'];

		$price_product = $done['precio_sugerido'];

		$price_discount_product = 0;

		$apply_iva_product = $done['aplica_iva'];

		$iva_product = $done['valor'];

		$retail_product = $done['menudeo'];



		$total = $price_product;

		$total_retail = $retail_product;

		$total_discount = $price_discount_product;



		if($apply_iva_product == 1)

		{

			$total = $total * $iva_product;

			$total_retail = $total_retail * $iva_product;

			$total_discount = $total_discount * $iva_product;

		}



		$sub_total = $total * $quantity;

		$sub_retail = $total_retail * $quantity;

		$sub_discount = $total_discount * $quantity;



		$sum_total = $sum_total + $sub_total;

		$sum_retail = $sum_retail + $sub_retail;

		$sum_discount = $sum_discount + $sub_discount;



		?>

		<button <?php if($sku == "5006" || $sku == "9712" || $sku == "9711" || $sku == "5032" || $sku == 5032){ ?> style="display: none;"<?php } ?> class="close" type="button" onclick="Delete_product('<?php echo $sku ?>');"><strong>&times;</strong></button>

		<img src="https://tv-store.s3.amazonaws.com/Products/images/<?php echo $sku ?>.jpg" class="img-responsive pull-left format-img" alt="NIKKEN" />

		<p><strong><?php echo $sku ?></strong> - <?php echo $name_product ?></p>

		<h5><strong>Precio: </strong> <?php echo $money . " " . number_format($total, 2) ?> / <strong>Cantidad:</strong> </strong> <?php echo number_format($quantity, 0) ?></h5>

		<h5 class="text-right"><strong>Total: </strong> <?php echo $money . " " . number_format($sub_total, 2) ?></h5>

		<hr>

		<?php

	}



	$counter++;

}



if($country == 1 && $discount == 1)

{ 

	?>

	<h5 class="text-right"><strong>TOTAL:</strong> <?php echo $money . number_format($sum_total, 2) ?></h5>

	<h5 class="text-right"><strong>DESCUENTO 20%:</strong> <?php echo $money . number_format($sum_retail, 2) ?></h5>

	<h4 class="text-right"><strong>TOTAL A PAGAR:</strong> <u><?php echo $money . number_format($sum_total - $sum_retail, 2) ?></u></h4>

	<?php 

}

else

{

	?><h4 class="text-right"><strong>TOTAL A PAGAR:</strong> <u><?php echo $money . number_format($sum_total, 2) ?></u></h4><?php

}



if($counter == 0)

{

	?><script>document.getElementById("btn-process").disabled = true;</script><?php

}
elseif ($sku == 5032 and $counter <= 1 ) {
	?><script>document.getElementById("btn-process").disabled = true;</script><?php
}

else

{

	?><script>document.getElementById("btn-process").disabled = false;</script><?php

}



?>