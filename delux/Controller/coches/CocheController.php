<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require('../../Model/CocheModel.php');
    
    class CocheController{
        private $coche_modelo;
        private $coches;
        const TAMANO_PAGINA = 5;
        //const TAMANO_PAGINA = 5;
        
        public function __construct(){
          $this->coche_modelo = new CocheModel();  
          $this->coches = array();
        }
 
// CREATE
        public function crear_coche($marca, $bastidor, $puertas, $precio, $caballos, $combustible, $modelo, $id_proveedor, $tipo, $tipo2 = null, $tipo3 = null, $foto = null)
        {
            return $this->coche_modelo->crear_coche($marca, $bastidor, $tipo, $tipo2, $tipo3, $puertas, $precio, $caballos, $combustible, $modelo, $id_proveedor, $foto);
        }

        public function dame_coches_by_id($id){
            return $this->coche_modelo->dame_coches_by_id($id);
        }
        
// READ
        public function dame_coches($marca, $tipo = null, $puertas = null, $combustible = null, $min = null, $max = null)
        {
            $this->coches = $this->coche_modelo->dame_coches($marca, $tipo, $puertas, $combustible, $min, $max);
            
            return $this->coches;
            //return $this->paginar();
        }
        
        public function buscar_coches($texto)
        {
            $this->coches = $this->coche_modelo->buscar_coches($texto);
             
            return $this->coches; 
            //return $this->paginar();
        }
        
        private function paginar($num_pag = null)
        {
            $rdo_coches = array();
            
            $pagina = 1; //$num_pag
            
            $inicio = ($pagina - 1) * CocheController::TAMANO_PAGINA; 
            $fin = $pagina * CocheController::TAMANO_PAGINA; 
            
            if ($pagina > 0){
                for ($i = $inicio; $i < $fin; $i++){
                    if (isset($this->coches[$i])){
                        array_push($rdo_coches, $this->coches[$i]);
                    }else{
                        return $rdo_coches;
                    }
                }
            }
            
            return $rdo_coches;
        }


// UPDATE
        public function actualizar_coches($id, $bastidor, $puertas, $precio, $caballos, $combustible, $modelo, $tipo, $foto = null, $tipo2 = null, $tipo3 = null)
        {
            return $this->coche_modelo->actualizar_coche($id, $bastidor, $tipo, $tipo2, $tipo3, $puertas, $precio, $caballos, $combustible, $modelo, $foto);
        }

// DELETE        
        public function eliminar_coches($id)
        {
            return $this->coche_modelo->eliminar_coche($id);
        }
    }
?>
