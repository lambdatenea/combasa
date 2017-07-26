<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$cliente_email = strip_tags($_POST["cliente_email"]);
	$cliente_password = strip_tags($_POST["cliente_password"]);

	require('ClienteController.php');
	$miCliente = new ClienteController();
	$array = $miCliente->logear_cliente($cliente_email, $cliente_password);


	if($array==="cod3"){
		$rdo = "La Consulta a la BBDD ha fallado.";
		header('Location: ../../View/Pagina_Resultado.php?rdo='.$rdo);
		die();
	}else if($array==="cod2"){
		$rdo = "No existe ese E-mail.";
		header('Location: ../../View/Pagina_Resultado.php?rdo='.$rdo);
		die();
	}else if($array==="cod1"){
		$rdo = "La Contraseña No Coincide.";
		header('Location: ../../View/Pagina_Resultado.php?rdo='.$rdo);
		die();
	}else{
		foreach($array as $row){
		$arrayUsuarioLogeado = array(
			"id" => $row->get_id(),
			"nombre" => $row->get_nombre(),
			"apellido" => $row->get_apellido(),
			"telefono" => $row->get_telefono(),
			"email" => $row->get_usuario(),
			"password" => $row->get_key(),			
			);

		$_SESSION['user_log'] = $arrayUsuarioLogeado;

		header('Location: ../../View/panel_de_control.php');
		die();
		}
	};
}else{
	$rdo = "Fallo en el formulario.!";
	header('Location: ../../View/Pagina_Resultado.php?rdo='.$rdo);
	die();
}

?>