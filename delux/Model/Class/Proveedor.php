<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class Proveedor{
        private $id;
        private $nombre;
        private $telf;
        private $fax;
        private $direccion;
        private $coche;
        private $foto;


        public function __construct($id, $nombre, $telf, $fax, $direccion, $foto)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->telf = $telf;
            $this->fax = $fax;
            $this->direccion = $direccion;
            $this->foto = $foto;
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
        
        public function get_telf()
        {
             return $this->telf;
        }
        
        public function get_fax()
        {
             return $this->fax;
        }
        
        public function get_direccion()
        {
             return $this->direccion;
        }
        
        public function get_coche()
        {
             return $this->coche;
        }
        
        public function get_foto()
        {
            return $this->foto;
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
        
        public function set_telf($telf)
        {
            $this->telf = $telf;
        }
        
        public function set_fax($fax)
        {
            $this->fax = $fax;
        }
        
        public function set_direccion($direccion)
        {
            $this->direccion = $direccion;
        }
        
        public function set_coche($coche)
        {
            $this->coche = $coche;
        }
        
        public function set_foto($foto)
        {
            $this->foto = $foto;
        }
    }
?>