<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require('../../Model/ProveedorModel.php');
    
    class ProveedorController{
        private $proveedor_modelo;
        
        public function __construct(){
          $this->proveedor_modelo = new ProveedorModel();  
        }
 
// CREATE
        public function crear_proveedor($nombre, $telefono, $direccion, $fax = null, $foto = null)
        {
            return $this->proveedor_modelo->crear_proveedor($nombre, $telefono, $direccion, $fax, $foto);
        }
        
// READ
        public function dame_proveedores()
        {
            return $this->proveedor_modelo->dame_proveedores();
        }
 
// UPDATE
        public function actualizar_proveedor($id, $nombre,  $telefono, $direccion, $fax = null, $foto = null)
        {
            return $this->proveedor_modelo->actualizar_proveedor($id, $nombre,  $telefono, $direccion, $fax, $foto);
        }

// DELETE        
        public function eliminar_coches($id)
        {
            return $this->proveedor_modelo->eliminar_proveedor($id);
        }
    }
?>
