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
		/* Obtiene Codigo de Kit de Inicio */
		$item = $_GET["item"];
		/* Obtiene Codigo de Kit de Inicio */

		/* Obtiene Codigo de Playera */
		$item2 = $_GET["item2"];
		/* Obtiene Codigo de Playera */



		/*vars*/



		$queryResult = $pdo->prepare("SELECT codigo, nombre, pais FROM control_ci where correo = :email");

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

			/*Agregar kit de inicio*/

			/*Agregar playera*/
			$_SESSION['products'][$item2]=$item2."-1";
			/*Agregar playera*/

			



			header("location: index.php");

			exit;

		}

	}

}



header ('Location: https://mitiendanikken.com/');

exit;





?>

