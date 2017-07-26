<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require('../../Model/CompraModel.php');
    
    class CompraController{
        private $compras_modelo;
        private $compras;
        const TAMANO_PAGINA = 4;
        
        public function __construct(){
          $this->compras_modelo = new CompraModel();  
          $this->compras = array();
        }
 
// CREATE
        public function comprar($id_cliente, $id_coche, $fecha)
        {
            return $this->compras_modelo->comprar($id_cliente, $id_coche, $fecha);
        }
        
// READ
        public function dame_compras($id_cliente)
        {
            return $this->compras_modelo->dame_compras($id_cliente);
        }
 
// UPDATE
        public function actualizar_compra($id_compra, $id_cliente, $id_coche, $fecha)
        {
            return $this->compras_modelo->actualizar_compra($id_compra, $id_cliente, $id_coche, $fecha);
        }

// DELETE        
        public function eliminar_compra($id)
        {
            return $this->compras_modelo->eliminar_compra($id);
        }
    }
?>
