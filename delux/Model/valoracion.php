<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {	
	$id = strip_tags($_POST["id"]);
      $fm = strip_tags($_POST["fm"]);

	require('Singleton.php');
	$conexion = Singleton::getInstance();
}else{
	echo "Error en la peticion.";
}

// Comprobamos que se ha realizado la conexion correctamente.
if(!$conexion){echo "Error en la conexion.";}

// Sentencia de SQL.
            if($fm == 1){
                  $sql3 = 'Select me_gusta From coches WHERE id_coche = :id';
                  $stmt3 = $conexion->prepare($sql3);
                  if (!$stmt3){echo "Error en la sentencia. " . $conexion->error;}
                  $stmt3->bindValue(':id',$id);
                  $stmt3->execute();
                  $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                  $count3 = $row3['me_gusta'];
                  echo json_encode($count3);
            }

            if($fm == 2){
                  $sql3 = 'Select no_me_gusta From coches WHERE id_coche = :id';
                  $stmt3 = $conexion->prepare($sql3);
                  if (!$stmt3){echo "Error en la sentencia. " . $conexion->error;}
                  $stmt3->bindValue(':id',$id);
                  $stmt3->execute();
                  $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                  $count3 = $row3['no_me_gusta'];
                  echo json_encode($count3);
            }
            
            if($fm == 3){
       		$sql2 = 'Select me_gusta From coches WHERE id_coche = :id';
                  $stmt2 = $conexion->prepare($sql2);
                  if (!$stmt2){echo "Error en la sentencia. " . $conexion->error;}
                  $stmt2->bindValue(':id',$id);
                  $stmt2->execute();
                  $row = $stmt2->fetch(PDO::FETCH_ASSOC);
                  $count = $row['me_gusta'];
                  
                  $sql='UPDATE coches SET me_gusta=:uno WHERE id_coche=:id';
                  $stmt = $conexion->prepare($sql);
      			if (!$stmt){echo "Error en la sentencia. " . $conexion->error;}
      			$count = $count+1;
                  $stmt->bindValue(':uno',$count);
                  $stmt->bindValue(':id',$id);
                  $rdo = $stmt->execute();
            }

            if($fm == 4){
                  $sql2 = 'Select no_me_gusta From coches WHERE id_coche = :id';
                  $stmt2 = $conexion->prepare($sql2);
                  if (!$stmt2){echo "Error en la sentencia. " . $conexion->error;}
                  $stmt2->bindValue(':id',$id);
                  $stmt2->execute();
                  $row = $stmt2->fetch(PDO::FETCH_ASSOC);
                  $count = $row['no_me_gusta'];
                      

                  $sql='UPDATE coches SET no_me_gusta=:uno WHERE id_coche=:id';
                  $stmt = $conexion->prepare($sql);
                        if (!$stmt){echo "Error en la sentencia. " . $conexion->error;}
                        $count = $count+1;
                  $stmt->bindValue(':uno',$count);
                  $stmt->bindValue(':id',$id);
                  $rdo = $stmt->execute();
            }

?>