<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$cliente_email = strip_tags($_POST["cliente_email"]);

	require('../mail/MailController.php');
	$mailer = new MailController();
	$enviado = $mailer->enviar_correo($cliente_email, 'usuario', 2, 'toor1234');

    $rdo = "Se te ha enviado un correo con tu contraseña.!";
    header('Location: ../../View/Pagina_Resultado.php?rdo='.$rdo);
    die();

}else{	
	$rdo = "Fallo en el formulario.!";
	header('Location: ../../View/Pagina_Resultado.php?rdo='.$rdo);
	die();
};

?>