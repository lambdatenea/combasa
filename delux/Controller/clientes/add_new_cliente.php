<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	session_start();

	$cliente_nombre = strip_tags($_POST["cliente_nombre"]);
	$cliente_apellido = strip_tags($_POST["cliente_apellido"]);
	$cliente_telefono = strip_tags($_POST["cliente_telefono"]);
	$cliente_email = strip_tags($_POST["cliente_email"]);
	$cliente_password = strip_tags($_POST["cliente_password"]);

	require('ClienteController.php');
	$miCliente = new ClienteController();
	$rdo = $miCliente->crear_cliente($cliente_nombre, $cliente_apellido, $cliente_telefono, $cliente_email, $cliente_password);
	
	if ($rdo){
		$rdo = "Se ha creado el usuario correctamente.!";

		require "../../Model/Class/QR.php";
		$text = $cliente_password;
		$name = $cliente_email;
		$miQR = new QR($text, $name);
		$miQR->creaQR($text, $name);
		$_SESSION['QR'] = $name;
		$_SESSION['tempEmail'] = $cliente_email;

		// Envio de correo electrónico de bienvenida
	    require('../mail/MailController.php');
		$mailer = new MailController();
		$mailer->enviar_correo($cliente_email, $cliente_nombre, 1, $cliente_password);

		// Fin envio correo electrónico
		//header('Location: ../../View/Pagina_Resultado.php?rdo='.$rdo);
		//die();
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