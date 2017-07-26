<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	session_start();
	$busq = strip_tags($_POST["texto_buscar"]);

	require('CocheController.php');
	$miCoche = new CocheController();
	$array = $miCoche->buscar_coches($busq);
	
	if (count($array)>0){
		$_SESSION['busqueda_coches'] = $array;

		$rdo = $busq;
		header('Location: ../../View/Resultado_busqueda.php?rdo='.$busq);
		die();
	}
	else{
		$rdo = "No hay ningun coche que coincida con su busqueda.!";
		header('Location: ../../View/Pagina_Resultado.php?rdo='.$rdo);
		die();
	}

}else{
	$rdo = "Fallo en el formulario.!";
	header('Location: ../../View/Pagina_Resultado.php?rdo='.$rdo);
	die();
}
?>