<?php 

require_once('../../functions.php'); /*Funciones*/

session_name('carrito');
session_start();

$country = $_SESSION["country"];
$discount = $_SESSION["discount"];
$discount_letter = "S";
$email = $_SESSION["email"];
$kit = $_SESSION["kit"];

$products_checkout = "";

foreach($_SESSION['products'] as $posicion => $products)
{
	list($sku, $quantity) = explode('-', $products);

	if($country == 1 && $discount == 1)
	{
		$discount_letter = "SD";
	}

	$products_checkout = $products_checkout . $sku . ":" . $quantity . ";";
}

$products_checkout = substr($products_checkout, 0, -1);
$data = base64_encode($email . "&" . $products_checkout . "&" . $discount_letter);

if($kit == 1)
{
	echo "1///https://nikkenlatam.com/services/checkout/redirect.php?app=incorporacion&data=$data";
}
else
{
	echo "1///https://nikkenlatam.com/services/checkout/redirect.php?app=710&data=$data";
}

?>