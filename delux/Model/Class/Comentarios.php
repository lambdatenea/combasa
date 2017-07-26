<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class Comentarios{
        private $id;
        private $id_coche;
        private $comentario;
        private $nombre;
        private $email;
        private $fecha;
        
        public function __construct($id, $id_coche, $comentario, $nombre, $email, $fecha)
        {
            $this->id = $id;
            $this->id_coche = $id_coche;
            $this->comentario = $comentario;
            $this->nombre = $nombre;
            $this->email = $email;
            $this->fecha = $fecha;
        }
//        Getters
        public function get_id()
        {
            return $this->id;
        }
        
        public function get_id_coche()
        {
            return $this->id_coche;
        }
        
        public function get_comentario()
        {
            return $this->comentario;
        }
        
        public function get_nombre()
        {
             return $this->nombre;
        }
        
        public function get_email()
        {
             return $this->email;
        }
        
        public function get_fecha()
        {
             return $this->fecha;
        }

//        Setters
        
        public function set_id($id)
        {
            $this->id = $id;
        }
        
        public function set_cliente($id_coche)
        {
            $this->id_coche = $id_coche;
        }
        public function set_id_coche($comentario)
        {
            $this->comentario = $comentario;
        }
        
        public function set_marca($nombre)
        {
             $this->nombre = $nombre;
        }
        
        public function set_modelo($email)
        {
            $this->email = $email;
        }
        
        public function set_comentario($fecha)
        {
            $this->fecha = $fecha;
        }
    }
?>