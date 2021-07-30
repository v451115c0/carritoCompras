<?php 

session_name('carrito');
session_start();

$_SESSION["discount"] = $_POST["discount"];

?>