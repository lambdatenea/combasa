<?php

    require('../../Model/Singleton.php');
    require('../../Model/Class/Compra.php');
    require('../../Model/Class/Coche.php');
    // Creando un Singleton

    class CompraModel{
        private $conexion;
        
        public function __construct() {
            $this->conexion = Singleton::getInstance();
        }
        
// CREATE
        public function comprar($id_cliente, $id_coche, $fecha)
        {          
            // Insertamos un nuevo coche
            $sql = 'INSERT INTO compras VALUES(NULL, :id_cliente, :id_coche, :fecha)';
            
            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}

            $stmt->bindValue(':id_cliente',$id_cliente);
            $stmt->bindValue(':id_coche',$id_coche);
            $stmt->bindValue(':fecha',$fecha);
            
            $rdo = $stmt->execute();
            
            return $rdo;
        }
// READ
        public function dame_compras($id_cliente)
        {
            // Realizar una consulta MySQL
            if(!$this->conexion){echo "Error en la conexion.";}

            $sql = 'SELECT * FROM coches, compras WHERE compras.id_coche = coches.id_coche AND compras.id_cliente = :id_cliente';
          
            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            
            $stmt->bindValue(':id_cliente',$id_cliente);
            $stmt->execute();


            /* obtener los valores */
            $coches = array();
            $compras = array();
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC); 
            while ($row) {
               $coche = new Coche($row['id_coche'], $row['marca'], $row['n_bastidor'], $row['tipo'], $row['n_puertas'], $row['precio'], $row['caballos'], $row['combustible'], $row['modelo'], $row['id_proveedor'], $row['tipo2'], $row['tipo3'], $row['foto']);
               $compra = new Compra($row['id_compra'], $id_cliente, $coche, $row['fecha']);
               array_push($compras, $compra);
               $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
           
            return $compras;
        }
        
// UPDATE
        public function actualizar_compra($id_compra, $id_cliente, $id_coche, $fecha)
        {
            // Realizar una consulta MySQL
            if(!$this->conexion){echo "Error en la conexion.";}

            $sql = 'UPDATE proveedores SET id_cliente = :id_cliente, id_coche = :id_coche, fecha = :fecha WHERE id_compra = :id_compra';
            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            
            $stmt->bindValue(':id_cliente',$id_cliente);
            $stmt->bindValue(':id_coche',$id_coche);
            $stmt->bindValue(':fecha',$fecha);
            $stmt->bindValue(':id_compra',$id_compra);
            
            $rdo = $stmt->execute();

            return $rdo;
        }
        
// DELETE
        public function eliminar_compra($id)
        {
            // Realizar una consulta MySQL
            if(!$this->conexion){echo "Error en la conexion.";}

            $sql = 'DELETE FROM compras WHERE id_compra = :id';

            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            
            $stmt->bindValue(':id',$id);
            
            $rdo = $stmt->execute();

            return $rdo;
        }
    }

?>
