<?php 

//Variables
$sku = $_POST["sku"];
$counter = 0;
//Variables

session_name('carrito');
session_start();

foreach($_SESSION['products'] as $posicion => $products)
{
	list($product, $quantity) = explode('-', $products);

	if($product == $sku)
	{
		$counter++;
		$quantity++;

		$_SESSION['products']["$sku"]="$sku-$quantity";
	}
}

if($counter == 0)
{
	$_SESSION['products']["$sku"]="$sku-1";
}

?>