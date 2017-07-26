<?php

   require('../../Model/ComentarioModel.php');
    class ComentarioController{
        private $comentario_modelo;
        private $comentario;
        const TAMANO_PAGINA = 4;
        
        public function __construct(){
          $this->comentario_modelo = new ComentarioModel();  
          $this->comentario = array();
        }
 
// CREATE
        public function crear_comentario($id_coche, $comentario, $nombre, $email, $fecha)
        {
            
            return $this->comentario_modelo->crear_comentario($id_coche, $comentario, $nombre, $email, $fecha);
            
        }
        
// READ/
        
        public function dame_comentarios($id)
        {

            return $this->comentario_modelo->dame_comentarios($id);

        }
 

        
    }
?>
