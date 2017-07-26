<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$coche_id = strip_tags($_POST["coche_id"]);

	session_start();
    require('../carrito/Carrito.php');

	$miCarrito = new Carrito();
	$miCarrito->remove_producto($coche_id);

	die();
}else{	
	$rdo = "No tienes permisos para ver esta pagina.!";
	header('Location: ../../View/Pagina_Resultado.php?rdo='.$rdo);
	die();
};