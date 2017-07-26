<?php

    require('../../Model/Singleton.php');
    require('../../Model/Class/Proveedor.php');
    // Creando un Singleton

    class ProveedorModel{
        private $conexion;
        
        public function __construct() {
            $this->conexion = Singleton::getInstance();
        }
        
// CREATE
        public function crear_proveedor($nombre, $telefono, $direccion, $fax = null, $foto = null)
        {          
            // Insertamos un nuevo coche
            $sql = 'INSERT INTO proveedores VALUES(NULL, :nombre, :telf, :dir, :fax, :foto)';
            
            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            
            if(is_null($fax)){
                $fax = " ";
            }
            
            if(is_null($foto)){
                $foto = " ";
            }
            
            $stmt->bindValue(':nombre',$nombre);
            $stmt->bindValue(':telf',$telefono);
            $stmt->bindValue(':dir',$direccion);
            $stmt->bindValue(':fax',$fax);
            $stmt->bindValue(':foto',$foto);
            
            $rdo = $stmt->execute();
            
            return $rdo;
        }
// READ
        public function dame_proveedores()
        {
            // Realizar una consulta MySQL
            if(!$this->conexion){echo "Error en la conexion.";}

            $sql = 'SELECT * FROM proveedores';
          
            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            
            $stmt->execute();


            /* obtener los valores */
            $proveedores = array();
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC); 
            while ($row) { 
               $proveedor = new Proveedor($row['id_proveedor'], $row['nombre'], $row['telefono'], $row['fax'], $row['direccion'], $row['foto']);
               array_push($proveedores, $proveedor);
               $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
                        
            return $proveedores;
        }
        
// UPDATE
        public function actualizar_proveedor($id, $nombre,  $telefono, $direccion, $fax = null, $foto = null)
        {
            // Realizar una consulta MySQL
            if(!$this->conexion){echo "Error en la conexion.";}

            $sql = 'UPDATE proveedores SET nombre = :nombre, telefono = :telf, fax = :fax, direccion = :dir, foto = :foto  WHERE id_proveedor = :id';
            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            
            if(is_null($fax)){
                $fax = " ";
            }
            
            if(is_null($foto)){
                $foto = " ";
            }
            
            $stmt->bindValue(':nombre',$nombre);
            $stmt->bindValue(':telf',$telefono);
            $stmt->bindValue(':dir',$direccion);
            $stmt->bindValue(':fax',$fax);
            $stmt->bindValue(':foto',$foto);
            $stmt->bindValue(':id',$id);
            
            $rdo = $stmt->execute();
            
            return $rdo;
        }
        
// DELETE
        public function eliminar_proveedor($id)
        {
            // Realizar una consulta MySQL
            if(!$this->conexion){echo "Error en la conexion.";}

            $sql = 'DELETE FROM proveedores WHERE id_proveedor = :id';

            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            
            $stmt->bindValue(':id',$id);
            
            $rdo = $stmt->execute();
            
            return $rdo;
        }
    }

?>
