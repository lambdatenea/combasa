<?php
    require('Singleton.php');
    require('Class/Cliente.php');

    class ClienteModel{
        private $conexion;
        private $usuarios = array();
        
        public function __construct() {
            $this->conexion = Singleton::getInstance();
        }
        
        public function crear_cliente($nombre, $apellido, $telefono, $usuario, $key)
        {       
            $sql = "INSERT INTO clientes VALUES(NULL, :nombre, :apellido, :telefono, :email, :pwdencriptada)";
            
            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            
            //Encriptamos la contraseña.
            $pwdencriptada=password_hash($key,PASSWORD_DEFAULT);

            //$pwdencriptada = md5($key);
            //echo $pwdencriptada;
            $stmt->bindValue(':nombre', $nombre);
            $stmt->bindValue(':apellido', $apellido);
            $stmt->bindValue(':telefono', $telefono);
            $stmt->bindValue(':email', $usuario);
            $stmt->bindValue(':pwdencriptada', $pwdencriptada);
            
            $rdo = $stmt->execute();

            return $rdo;
        }

        public function dame_clientes()
        {
            // Realizar una consulta MySQL
            if(!$this->conexion){echo "Error en la conexion.";}

            $sql = 'Select * From clientes';
            $stmt = $this->conexion->prepare($sql);
            
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
    
            $stmt->execute();
            $data = array();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            while($row){
                $data[] = new Cliente($row['cli_id'], $row['cli_nombre'], $row['cli_apellido'], $row['cli_telf'], $row['cli_usuario'], $row['cli_key']);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            return $data;
        }

        public function actualizar_cliente($id, $nombre, $apellido, $telefono, $usuario, $key)
        {
            // Realizar una consulta MySQL
            if(!$this->conexion){echo "Error en la conexion.";}

            $sql='UPDATE clientes SET cli_nombre=:nombre, cli_apellido=:apellido, cli_telf=:telefono, cli_usuario=:usuario, cli_key=:key 
                    WHERE cli_id=:id';
            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            
            //Encriptamos la contraseña.
            $pwdencriptada=password_hash($key,PASSWORD_DEFAULT);

            $stmt->bindValue(':nombre',$nombre);
            $stmt->bindValue(':apellido',$apellido);
            $stmt->bindValue(':telefono',$telefono);
            $stmt->bindValue(':usuario',$usuario);
            $stmt->bindValue(':key',$pwdencriptada);
            $stmt->bindValue(':id',$id);

            $rdo = $stmt->execute();
            
            return $rdo;
        }
        
// DELETE
        public function eliminar_cliente($id)
        {
            // Realizar una consulta MySQL
            if(!$this->conexion){echo "Error en la conexion.";}

            $sql = 'DELETE FROM clientes WHERE cli_id = :id';

            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            
            $stmt->bindValue(':id',$id);
            
            $rdo = $stmt->execute();
            
            return $rdo;
        }

        public function logear_cliente($cliente_email, $cliente_password){
            // Realizar una consulta MySQL
            if(!$this->conexion){echo "Error en la conexion.";}

            $sql = "Select * From clientes where cli_usuario = :email";

            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}

            $stmt->bindValue(':email', $cliente_email);
            
            $rdo = $stmt->execute();
            $result = $stmt->fetchAll();

            //Comprobamos que no ha habido ningun error en la consulta.
            if($rdo){
                //Comprobamos que hay algun dato devuelto en el array de la consulta.
                if (!empty($result)){
                    foreach($result as $row){
                    //Com
                    $coincide=password_verify($cliente_password, $row['cli_key']);
                        //Comprobamos que cuando el usuario existe, su contraseña coincide con la que viene de la interfaz de entrada.
                        if($coincide){
                            $data[] = new Cliente($row['cli_id'], $row['cli_nombre'], $row['cli_apellido'], $row['cli_telf'], $row['cli_usuario'], $row['cli_key']);
                            return $data;
                        }else{
                            $data = "cod1"; //El usuario existe, pero su contraseña no coincide con la entrada.
                            return $data;
                        };
                    };
                }else{
                    $data = "cod2"; //No hay ningun usuario con ese email.
                    return $data;
                };
            }
            else{
                $data = "cod3"; //Ha fallado la consulta SQL.
                return $data;
            }

        }

        public function logout_cliente(){
            Singleton::destruirConexion();
        }
        
        public function cambiar_password($email, $password){
            // Realizar una consulta MySQL
            if(!$this->conexion){echo "Error en la conexion.";}

            $sql='UPDATE clientes SET cli_key=:key 
                    WHERE cli_usuario=:email';
            $stmt = $this->conexion->prepare($sql);
            if (!$stmt){echo "Error en la sentencia. " . $this->conexion->error;}
            
            //Encriptamos la contraseña.
            $pwdencriptada=password_hash($password, PASSWORD_DEFAULT);

            $stmt->bindValue(':key',$pwdencriptada);
            $stmt->bindValue(':email',$email);

            $rdo = $stmt->execute();
            
            return $rdo;
        }

    }


?>
