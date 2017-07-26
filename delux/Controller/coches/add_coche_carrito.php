<?php 
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$coche_id = strip_tags($_POST["coche_id"]);
	$coche_precio = strip_tags($_POST["coche_precio"]);
	$coche_marca = strip_tags($_POST["coche_marca"]);
	$coche_modelo = strip_tags($_POST["coche_modelo"]);
	$coche_foto = strip_tags($_POST["coche_foto_miniatura"]);

	session_start();

    require('../carrito/Carrito.php');

	$miCarrito = new Carrito();

	//array que crea un producto
	$coche = array(
		"id"		=>	$coche_id,
		"cantidad"	=>	1,
		"precio"	=>	$coche_precio,
		"modelo"	=>	$coche_marca,
		"marca"	=>	$coche_modelo,
		"foto"	=>	$coche_foto
	);

	$miCarrito->add($coche);

	die();
}else{	
	$rdo = "No tienes permisos para ver esta pagina.!";
	header('Location: ../../View/Pagina_Resultado.php?rdo='.$rdo);
	die();
};