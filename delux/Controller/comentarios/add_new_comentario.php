<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id_coche = strip_tags($_GET["id"]);
	$comentario = strip_tags($_POST["comentario"]);
	$nombre = strip_tags($_POST["cliente_nombre"]);
	$email = strip_tags($_POST["cliente_email"]);

	$fecha = date("Y-m-d");

	require('comentarioscontroller.php');
	$var = new ComentarioController();
	$rdo = $var->crear_comentario($id_coche, $comentario, $nombre, $email, $fecha);
	
	if ($rdo){
		$rdo = "Se ha comentado correctamente.!";
		header('Location: ../../View/Pagina_Resultado.php?rdo='.$rdo);
		die();
	}
	else{
		$rdo = "Ha ocurrido un Error.!";
		header('Location: ../../View/Pagina_Resultado.php?rdo='.$rdo);
		die();
	}

}else{
	$rdo = "Fallo en el formulario.!";
	header('Location: ../../View/Pagina_Resultado.php?rdo='.$rdo);
	die();
}
?>
