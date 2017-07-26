<?php
    require_once('Singleton.php');
    require('Class/Comentarios.php');

    class ComentarioModel{
        private $conexion;
        
        public function __construct() {
            $this->conexion = Singleton::getInstance();
        }
        
        public function crear_comentario($id_coche, $comentario, $nombre, $email, $fecha)
        {       
                  
            $sql = "INSERT INTO comentarios VALUES(NULL, :id_coche, :comentario, :nombre, :email, :fecha)";
            
            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            
            $stmt->bindValue(':id_coche', $id_coche);
            $stmt->bindValue(':comentario', $comentario);
            $stmt->bindValue(':nombre', $nombre);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':fecha', $fecha);
            
            $rdo = $stmt->execute();
            return $rdo;
        }

        public function dame_comentarios($id)
        {
            
            // Realizar una consulta MySQL
            if(!$this->conexion){echo "Error en la conexion.";}

            $sql = 'Select * From comentarios WHERE id_coche = :id';
            $stmt = $this->conexion->prepare($sql);
            
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            $stmt->bindValue(':id', $id);

            $stmt->execute();
            $data = array();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            while($row){ 
                $data[] = $row;
                //$data[] = new ComentarioController($row['comentario'], $row['nombre'], $row['email'], $row['fecha']);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            return $data;
        }     

    }


?>
