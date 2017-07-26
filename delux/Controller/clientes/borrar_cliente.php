<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {	
	$cliente_id = strip_tags($_POST["cliente_id"]);

	// Creando la conexion.
	require('../../Model/Singleton.php');
	$conexion = Singleton::getInstance();
}else{
	echo "Error en la peticion.";
}

// Comprobamos que se ha realizado la conexion correctamente.
if(!$conexion){echo "Error en la conexion.";}

// Sentencia de SQL.
$sql = "DELETE FROM clientes WHERE cli_id = :id";

$stmt = $conexion->prepare($sql);
if (!$stmt){echo "Error en la sentencia. " . $conexion->error;}

$stmt->bindValue(':id', $cliente_id);

$rdo = $stmt->execute();

if($rdo){
	if ($stmt->fetch()>0){
		echo "ok";
	}else{
		echo "fail";
	};
}
else{
	echo "fail";
}

?>