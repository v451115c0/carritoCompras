<?php 

require_once('conexion.php'); /*Conexión a base de datos*/

//Current date
function Current_date()
{
	date_default_timezone_set("America/Bogota");

	$date = date("Y-m-d");
	$time = date("H:i:s");

	return $date . " " . $time;
}
//Current date

//Remove tilde
function remove_tilde($cadena) {
    $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
    $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
    $texto = str_replace($no_permitidas, $permitidas ,$cadena);

    return $texto;
}
//Remove tilde

//Money type
function Type_money($country)
{
    if($country == 8)
    {
        return "₡";
    }
    elseif($country == 3)
    {
        return "S/";
    }
    elseif($country == 6)
    {
        return "Q";
    }
    else
    {
        return "$";
    }
}
//Money type

//Search product E
function Search_product_letter($sku, $letter, $retail, $suggested_price, $country)
{
    $dbHost = '104.238.83.157';
    $dbName = 'nikkenla_marketing';
    $dbUser = 'nikkenla_mkrt';
    $dbPass = 'NNikken2011$$';

    try
    {
        if($sku == "13501")
        {
            $sku = $sku . "1";
        }

        if($country == 1 && $letter == "E")
        {
            if($sku == "1359")
            {
                $sku = $sku . "1";
            }
        }

        $sku = $sku . $letter;

        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $queryResult = $pdo->prepare("SELECT DISTINCT t0.menudeo, t0.precio_sugerido from control_art t0 where t0.sku = :sku and t0.pais = :country and t0.esta_activo = 1 and t0.precio_sugerido > 0");
        $queryResult->execute(array(':country' => $country, ':sku' => $sku));
        $done = $queryResult->fetch();
        if($done)
        {
            return array($done['menudeo'], $done['precio_sugerido']);
        }
        else
        {
            return array($retail, $suggested_price);
        }
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
        exit;
    }
}

//Search products checkout
function Checkout_product($sku, $country, $letter)
{
    $dbHost = '104.238.83.157';
    $dbName = 'nikkenla_marketing';
    $dbUser = 'nikkenla_mkrt';
    $dbPass = 'NNikken2011$$';

    try
    {   
        if($sku != "5006")
        {
            $sku_letter = $sku;
            if($sku_letter == "13501")
            {
                $sku_letter = $sku_letter . "1";
            }

            if($country == 1 && $letter == "E")
            {
                if($sku_letter == "1359")
                {
                    $sku_letter = $sku_letter . "1";
                }
            }

            $sku_letter = $sku_letter . $letter;

            $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $queryResult = $pdo->prepare("SELECT sku from control_art t0 where t0.sku = :sku and t0.pais = :country and t0.esta_activo = 1 and t0.precio_sugerido > 0");
            $queryResult->execute(array(':country' => $country, ':sku' => $sku_letter));
            $done = $queryResult->fetch();
            if($done)
            {
                return $sku_letter;
            }
            else
            {
                return $sku;
            }
        }
        else
        {
            return $sku;
        }
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
        exit;
    }
}
//Search products checkout

//Validate seven days
function Validate_date($created_date)
{
    $date1 = Current_date();
    $date2 = $created_date;

    if (!is_integer($date1)) $date1 = strtotime($date1);
    if (!is_integer($date2)) $date2 = strtotime($date2);
    return floor(abs($date1 - $date2) / 60 / 60 / 24);
}
//Validate seven days

?>