<?php
    require('../../Model/ClienteModel.php');
   

    class ClienteController{
        private $cliente_modelo;
        private $cliente;
        const TAMANO_PAGINA = 4;
        
        public function __construct(){
          $this->cliente_modelo = new ClienteModel();  
          $this->cliente = array();
        }
 
// CREATE
        public function crear_cliente($nombre, $apellido, $telefono, $usuario, $key)
        {
            return $this->cliente_modelo->crear_cliente($nombre, $apellido, $telefono, $usuario, $key);
        }
        
// READ/
        
        public function dame_clientes()
        {
            return $this->cliente_modelo->dame_clientes();
        }
 
// UPDATE
        public function actualizar_cliente($id, $nombre, $apellido, $telefono, $usuario, $key)
        {
            return $this->cliente_modelo->actualizar_cliente($id, $nombre, $apellido, $telefono, $usuario, $key);
        }

// DELETE        
        public function eliminar_cliente($id)
        {
            return $this->cliente_modelo->eliminar_cliente($id);
        }
        
// FUNCIONES DE CONTRASEÑAS 
        public function logear_cliente($user,$pwd)
        {
            return $this->cliente_modelo->logear_cliente($user,$pwd);
        }
        
        public function cambiar_password($id, $password)
        {
            return $this->cliente_modelo->cambiar_password($id, $password);
        }
    }
?>
