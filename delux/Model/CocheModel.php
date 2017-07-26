<?php

    require('../../Model/Singleton.php');
    require('../../Model/Class/Coche.php');

    class CocheModel{
        private $conexion;
        
        public function __construct() {
            $this->conexion = Singleton::getInstance();
        }
        
// CREATE
        public function crear_coche($marca, $bastidor, $tipo, $tipo2, $tipo3, $puertas, $precio, $caballos, $combustible, $modelo, $id_proveedor, $foto)
        {          
            // Insertamos un nuevo coche
            $sql = 'INSERT INTO coches VALUES(NULL,:marca, :bastidor, :tipo, :puertas, :precio, :caballos, :combustible, :modelo, :id_proveedor, :tipo2, :tipo3, :foto) ';
            
            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            
            if(is_null($tipo2)){
                $tipo2 = " ";
            }
            
            if(is_null($tipo3)){
                $tipo3 = " ";
            }
            
            if(is_null($foto)){
                $foto = " ";
            }
            
            $stmt->bindValue(':marca',$marca);
            $stmt->bindValue(':bastidor',$bastidor);
            $stmt->bindValue(':tipo',$tipo);
            $stmt->bindValue(':puertas',$puertas);
            $stmt->bindValue(':precio',$precio);
            $stmt->bindValue(':caballos',$caballos);
            $stmt->bindValue(':combustible',$combustible);
            $stmt->bindValue(':modelo',$modelo);
            $stmt->bindValue(':id_proveedor',$id_proveedor);
            $stmt->bindValue(':tipo2',$tipo2);
            $stmt->bindValue(':tipo3',$tipo3);
            $stmt->bindValue(':foto',$foto);
            
            $rdo = $stmt->execute();
            
            return $rdo;
        }
// READ
        public function dame_coches_by_marca($marca)
        {
            // Realizar una consulta MySQL
            if(!$this->conexion){echo "Error en la conexion.";}

            $sql = 'SELECT * From coches WHERE marca = :marca and cantidad>0';
            
            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            
            $stmt->bindValue(':marca', $marca);
            
            $stmt->execute();

            /* obtener los valores */
            $coches = array();
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC); 
            while ($row) {
               $coche = new Coche($row['id_coche'], $row['marca'], $row['n_bastidor'], $row['tipo'], $row['n_puertas'], $row['precio'], $row['caballos'], $row['combustible'], $row['modelo'], $row['id_proveedor'], $row['tipo2'], $row['tipo3'], $row['foto'], $row['cantidad']);
               array_push($coches, $coche);
               $row = $stmt->fetch(PDO::FETCH_ASSOC); 
            }
            
            return $coches;
        }

        public function dame_coches_by_id($id)
        {
            // Realizar una consulta MySQL
            if(!$this->conexion){echo "Error en la conexion.";}

            $sql = 'SELECT * From coches WHERE id_coche = :id';
            
            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            
            $stmt->bindValue(':id', $id);
            
            $stmt->execute();

            /* obtener los valores */
            $coches = array();
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC); 
            while ($row) {
               $coche = new Coche($row['id_coche'], $row['marca'], $row['n_bastidor'], $row['tipo'], $row['n_puertas'], $row['precio'], $row['caballos'], $row['combustible'], $row['modelo'], $row['id_proveedor'], $row['tipo2'], $row['tipo3'], $row['foto'], $row['cantidad'], $row['descripcion']);
               array_push($coches, $coche);
               $row = $stmt->fetch(PDO::FETCH_ASSOC); 
            }
            
            return $coches;
        }
        
        public function dame_coches($marca, $tipo = null, $puertas = null, $combustible = null, $min = null, $max = null)
        {
            // Realizar una consulta MySQL
            if(!$this->conexion){echo "Error en la conexion.";}

            $sql = 'SELECT * From coches WHERE marca = :marca and cantidad>0';

            if(!is_null($tipo)){
                $sql .= ' and (tipo=:tipo or tipo2=:tipo2 or tipo3=:tipo3)';
            }
            
            if(!is_null($combustible)){
                $sql .= ' and combustible = :combustible';
            }
            
            if(!is_null($min) and !is_null($max)){
                $sql .= ' and (precio >= :min and precio <= :max)';
            }
            
            if(!is_null($puertas)){
                $sql .= ' and n_puertas = :puertas';
            }
            
            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            
            $stmt->bindValue(':marca', $marca);
            
            if(!is_null($tipo)){
                $stmt->bindValue(':tipo', $tipo);
                $stmt->bindValue(':tipo2', $tipo);
                $stmt->bindValue(':tipo3', $tipo);
            }
            
            if(!is_null($combustible)){
                $stmt->bindValue(':combustible', $combustible);
            }
            
            if(!is_null($min) and !is_null($max)){
                $stmt->bindValue(':min', $min);
                $stmt->bindValue(':max', $max);
            }
            
            if(!is_null($puertas)){
                $stmt->bindValue(':puertas', $puertas);
            }
            
            $stmt->execute();

            /* obtener los valores */
            $coches = array();
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            while ($row) {
               $coche = new Coche($row['id_coche'], $row['marca'], $row['n_bastidor'], $row['tipo'], $row['n_puertas'], $row['precio'], $row['caballos'], $row['combustible'], $row['modelo'], $row['id_proveedor'], $row['tipo2'], $row['tipo3'], $row['foto'], $row['cantidad'], $row['descripcion']);
               array_push($coches, $coche);
               $row = $stmt->fetch(PDO::FETCH_ASSOC); 
            }
            
            return $coches;
        }
        
        public function buscar_coches($texto)
        {
            // Realizar una consulta MySQL
            if(!$this->conexion){echo "Error en la conexion.";}          

            $sql = 'SELECT * From coches WHERE marca LIKE "%":marca"%" or tipo LIKE "%":tipo"%" or tipo2 LIKE "%":tipo2"%" or tipo3 LIKE "%":tipo3"%" or modelo LIKE "%":modelo"%" or combustible LIKE "%":combustible"%"';
    
            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
                        
            $stmt->bindValue(':marca', $texto);
            $stmt->bindValue(':tipo', $texto);
            $stmt->bindValue(':combustible', $texto);
            $stmt->bindValue(':modelo', $texto);
            $stmt->bindValue(':tipo2', $texto);
            $stmt->bindValue(':tipo3', $texto);
            $stmt->execute();

            /* obtener los valores */
            $coches = array();
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC); 
            while ($row) {
               $coche = new Coche($row['id_coche'], $row['marca'], $row['n_bastidor'], $row['tipo'], $row['n_puertas'], $row['precio'], $row['caballos'], $row['combustible'], $row['modelo'], $row['id_proveedor'], $row['tipo2'], $row['tipo3'], $row['foto'], $row['cantidad'], $row['descripcion']);
               array_push($coches, $coche);
               $row = $stmt->fetch(PDO::FETCH_ASSOC); 
            }
            
            return $coches;
        }
        
// UPDATE
        public function actualizar_coche($id, $bastidor, $tipo, $tipo2, $tipo3, $puertas, $precio, $caballos, $combustible, $modelo, $foto, $cantidad)
        {
            // Realizar una consulta MySQL
            if(!$this->conexion){echo "Error en la conexion.";}

            $sql = 'UPDATE coches SET n_bastidor = :bastidor, tipo = :tipo, n_puertas = :puertas, precio = :precio, caballos = :caballos, combustible = :combustible, modelo = :modelo, tipo2 = :tipo2, tipo3 = :tipo3, foto = :foto, cantidad = :cantidad WHERE id_coche = :id';
            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            
            if(is_null($tipo2)){
                $tipo2 = " ";
            }
            
            if(is_null($tipo3)){
                $tipo3 = " ";
            }
            
            if(is_null($foto)){
                $foto = " ";
            }
            
            $stmt->bindValue(':id', $id);;
            $stmt->bindValue(':bastidor', $bastidor);
            $stmt->bindValue(':tipo', $tipo);
            $stmt->bindValue(':puertas', $puertas);
            $stmt->bindValue(':precio', $precio);
            $stmt->bindValue(':caballos', $caballos);
            $stmt->bindValue(':combustible', $combustible);
            $stmt->bindValue(':modelo', $modelo);
            $stmt->bindValue(':tipo2', $tipo2);
            $stmt->bindValue(':tipo3', $tipo3);
            $stmt->bindValue(':foto', $foto);
            $stmt->bindValue(':cantidad', $cantidad);
            
            $rdo = $stmt->execute();
            
            return $rdo;
        }
        
        
        
// DELETE
        public function eliminar_coche($id)
        {
            // Realizar una consulta MySQL
            if(!$this->conexion){echo "Error en la conexion.";}

            $sql = 'DELETE FROM coches WHERE id_coche = :id';

            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            
            $stmt->bindValue(':id', $id);
                        
            $rdo = $stmt->execute();

            return $rdo;
        }
    }

?>
