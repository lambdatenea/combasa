<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class Compra{
        private $id;
        private $coche;
        private $id_cliente;
        private $fecha;
        
        public function __construct($id, $id_cliente, $coche, $fecha)
        {
            $this->id = $id;
            $this->id_cliente = $id_cliente;
            $this->coche = $coche;
            $this->fecha = $fecha;
            
        }
//        Getters
        public function get_id()
        {
            return $this->id;
        }
        
        public function get_coche()
        {
             return $this->coche;
        }
        
        public function get_fecha()
        {
             return $this->fecha;
        }
        
        public function get_id_cliente()
        {
             return $this->id_cliente;
        }
        
//        Setters
        public function set_id($id)
        {
            $this->id = $id;
        }
        
        public function set_coche($coche)
        {
             $this->coche = $coche;
        }
        
        public function set_fecha($fecha)
        {
            $this->fecha = $fecha;
        }
        
        public function set_id_cliente($id_cliente)
        {
            $this->id_cliente = $id_cliente;
        }
    }
?>