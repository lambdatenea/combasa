<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class Coche{
        private $id;
        private $num_bastidor;
        private $marca;
        private $tipo;
        private $tipo2;
        private $tipo3;
        private $modelo;
        private $num_puertas;
        private $precio;
        private $caballos;
        private $combustible;
        private $id_proveedor;
        private $foto_portada;
        private $foto_miniatura;
        private $foto_mediana; 
        private $cantidad;
        private $descripcion;




        public function __construct($id, $marca, $bastidor, $tipo, $puertas, $precio, $caballos, $combustible, $modelo, $id_proveedor, $tipo2, $tipo3, $foto, $catidad, $descripcion)
        {
            $this->id = $id;
            $this->num_bastidor = $bastidor;
            $this->modelo = $modelo;
            $this->marca = $marca;
            $this->tipo = $tipo;
            $this->tipo2 = $tipo2;
            $this->tipo3 = $tipo3;
            $this->num_puertas = $puertas;
            $this->precio = $precio;
            $this->caballos = $caballos;
            $this->combustible = $combustible;
            $this->id_proveedor = $id_proveedor;
   
            $this->foto_portada = $foto . ".jpg";
            $this->foto_miniatura = $foto . "_126x100.jpg";
            $this->foto_mediana = $foto . "_430x325.jpg";
            
            $this->cantidad = $catidad;
            
            $this->descripcion = $descripcion;
        }
//        Getters
        public function get_id()
        {
            return $this->id;
        }
        
        public function get_id_proveedor()
        {
            return $this->id_proveedor;
        }
        
        public function get_bastidor()
        {
            return $this->num_bastidor;
        }
        
        public function get_marca()
        {
             return $this->marca;
        }
        
        public function get_tipo()
        {
             return $this->tipo;
        }
        
        public function get_tipo2()
        {
             return $this->tipo2;
        }
        
        public function get_tipo3()
        {
             return $this->tipo3;
        }
        
        public function get_modelo()
        {
             return $this->modelo;
        }
        
        public function get_puertas()
        {
             return $this->num_puertas;
        }
        
        public function get_precio()
        {
             return $this->precio;
        }
        
        public function get_caballos()
        {
             return $this->caballos;
        }
        
        public function get_combustible()
        {
            return $this->combustible;
        }
        
        public function get_foto_portada()
        {
            return $this->foto_portada;
        }
        
        public function get_foto_miniatura()
        {
            return $this->foto_miniatura;
        }
        
        public function get_foto_mediana()
        {
            return $this->foto_mediana;
        }
        
        public function get_cantidad()
        {
            return $this->cantidad;
        }
        
        public function get_descripcion()
        {
            return $this->descripcion;
        }
//        Setters
        
        public function set_id($id)
        {
            $this->id = $id;
        }
        
        public function set_id_proveedor($id_proveedor)
        {
            $this->id_proveedor = $id_proveedor;
        }
        public function set_bastidor($bastidor)
        {
            $this->num_bastidor = $bastidor;
        }
        
        public function set_marca($marca)
        {
             $this->marca = $marca;
        }
        
        public function set_tipo($tipo)
        {
            $this->tipo = $tipo;
        }
        
        public function set_puertas($puertas)
        {
            $this->num_puertas = $puertas;
        }
        
        public function set_precio($precio)
        {
            $this->precio = $precio;
        }
        
        public function set_caballos($caballos)
        {
            $this->caballos = $caballos;
        }
        
        public function set_combustible($combustible)
        {
            $this->combustible = $combustible;
        }
        
        public function set_tipo2($tipo2)
        {
            $this->tipo2 = $tipo2;
        }
        
        public function set_tipo3($tipo3)
        {
            $this->tipo3 = $tipo3;
        }
        
        public function set_modelo($modelo) 
        {
            $this->modelo = $modelo;
        }

        public function set_foto_portada($foto) 
        {
            $this->foto_portada = $foto;
        }
        
        public function set_foto_miniatura($foto) 
        {
            $this->foto_miniatura = $foto;
        }
        
        public function set_foto_mediana($foto) 
        {
            $this->foto_mediana = $foto;
        }
        
        public function set_cantidad($cantidad)
        {
            $this->cantidad = $cantidad;
        }
        
        public function set_descripcion($descripcion)
        {
            $this->descripcion = $descripcion;
        }
    }
?>