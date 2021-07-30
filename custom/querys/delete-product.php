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
		if($quantity == 1)
		{
			unset($_SESSION['products'][$sku]);
		}
		else
		{
			$counter++;
			$quantity = $quantity - 1;
			$_SESSION['products']["$sku"]="$sku-$quantity";
			break;
		}		
	}
}

if($counter == 0)
{
	unset($_SESSION['products'][$sku]);
}

?>