<?php 

require('functions.php');

session_name('carrito');
session_start();

if(isset($_GET["email"]))
{
	if($_GET["email"] != "")
	{
		/*vars*/
		$email = base64_decode($_GET["email"]);
		/*vars*/

		$queryResult = $pdo->prepare("SELECT codigo, nombre, pais, creacion FROM control_ci where correo = :email and tipo = 'CI' and estatus = 1 and b1 = 1");
		$queryResult->execute(array(':email' => $email));
		$done = $queryResult->fetch();
		if($done)
		{
			if(Validate_date($done['creacion']) > 7)
			{
				//Enviar a la tienda virtual
				$email_abi_query = base64_encode($email);
				header ("Location: https://mitiendanikken.com/mitiendanikken/auto/login/$email_abi_query");
				exit;
				//Enviar a la tienda virtual
			}
			else
			{

				$country_abi = $done['pais'];
				$discount = 0;

				$_SESSION["code"] = $done['codigo'];
				$_SESSION["name"] = $done['nombre'];

				$_SESSION["country"] = $country_abi;
				if($country_abi == 1){	$discount = 1;	}

				$_SESSION["email"] = $email;
				$_SESSION["kit"] = 0;
				$_SESSION["discount"] = $discount;
				$_SESSION["products"] = array();

				header("location: index.php");
				exit;
			}
		}
	}
}

header ('Location: https://mitiendanikken.com/');
exit;


?>