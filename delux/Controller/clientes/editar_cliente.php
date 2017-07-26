<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$cliente_id = strip_tags($_POST["cliente_id"]);
	$cliente_nombre = strip_tags($_POST["cliente_nombre"]);
	$cliente_apellido = strip_tags($_POST["cliente_apellido"]);
	$cliente_telefono = strip_tags($_POST["cliente_telefono"]);
	$cliente_email = strip_tags($_POST["cliente_email"]);
	$cliente_password = strip_tags($_POST["cliente_password"]);

	require('ClienteController.php');
	$miCliente = new ClienteController();
	$rdo = $miCliente->actualizar_cliente($cliente_id, $cliente_nombre, $cliente_apellido, $cliente_telefono, $cliente_email, $cliente_password);
	
	if ($rdo){
		$rdo = "Se ha actualizado el usuario correctamente.!";
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