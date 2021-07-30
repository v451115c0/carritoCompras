<?php 

require('conexion.php');

session_name('carrito');
session_start();

if(isset($_GET["email"]) || isset($_GET["item"]))
{
	if($_GET["email"] != "" || $_GET["item"] != "")
	{
		/*vars*/
		$email = base64_decode($_GET["email"]);
		$item = $_GET["item"];
		//$item2 = $_GET["item2"];
		/*vars*/

		$queryResult = $pdo->prepare("SELECT codigo, nombre, pais FROM control_ci_test where correo = :email and b2 = 1 and tipo = 'CI' and estatus = 0");
		$queryResult->execute(array(':email' => $email));
		$done = $queryResult->fetch();
		if($done)
		{
			$country_abi = $done['pais'];
			$discount = 0;

			$_SESSION["code"] = $done['codigo'];
			$_SESSION["name"] = $done['nombre'];

			$_SESSION["country"] = $country_abi;
			if($country_abi == 1){	$discount = 1;	}

			$_SESSION["email"] = $email;
			$_SESSION["kit"] = 1;
			$_SESSION["discount"] = $discount;
			$_SESSION["products"] = array();

			/*Agregar kit de inicio*/
			$_SESSION['products'][$item]=$item."-1";
			//$_SESSION['products'][$item2]=$item2."-1";
			/*Agregar kit de inicio*/

			header("location: index.php");
			exit;
		}
	}
}

header ('Location: https://mitiendanikken.com/');
exit;


?>