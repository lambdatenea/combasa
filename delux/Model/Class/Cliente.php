<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class Cliente{
        private $id;
        private $nombre;
        private $apellido;
        private $telefono;
        private $usuario;
        private $key;
        
        public function __construct($id, $nombre, $apellido, $telefono, $usuario, $key)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->telefono = $telefono;
            $this->usuario = $usuario;
            $this->key = $key;
        }
//        Getters
        public function get_id()
        {
            return $this->id;
        }
        
        public function get_nombre()
        {
            return $this->nombre;
        }
        
        public function get_apellido()
        {
            return $this->apellido;
        }
        
        public function get_telefono()
        {
             return $this->telefono;
        }
        
        public function get_usuario()
        {
             return $this->usuario;
        }
        
        public function get_key()
        {
             return $this->key;
        }

//        Setters
        
        public function set_id($id)
        {
            $this->id = $id;
        }
        
        public function set_nombre($nombre)
        {
            $this->nombre = $nombre;
        }
        public function set_apellido($apellido)
        {
            $this->apellido = $apellido;
        }
        
        public function set_telefono($telefono)
        {
             $this->telefono = $telefono;
        }
        
        public function set_usuario($usuario)
        {
            $this->usuario = $usuario;
        }
        
        public function set_key($key)
        {
            $this->key = $key;
        }
    }
?>