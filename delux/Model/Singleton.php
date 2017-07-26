<?php 
class Singleton
{
   private static $instance;
   //private $contador;
   

   private function __construct()
   {
      //echo "He creado un " . __CLASS__ . "\n";
      //$this->contador =0;
   }

   public static function getInstance() {
        if (self::$instance == null) {
   //Si no hay instancia creada, la crea. Si la hay la devuelve.
            $singleton = new Singleton();
            self::$instance = $singleton->crearConexion();
            return self::$instance;
        }
   //Al final devuelve la instancia
        return self::$instance;
   }
   //Destruye la conexion y deja la instancia a null.
   public static function destruirConexion(){
      //mysqli_close(self::$instance);
      self::$instance = null;
   }
   //Crea la conexion y la devuelve.
   private function crearConexion(){
      $conexion = new PDO("mysql:charset=utf8mb4; host=localhost; dbname=delux_car", "root","toor");
      //$conexion = new PDO("mysql:charset=utf8mb4; host=localhost; dbname=delux_car", "root","");
      $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      if(!$conexion){
         $conexion=null;
      };

      return $conexion;
   }
   /*
   public function incrementar()
   {
      return ++$this->contador;
   }
   
   public function disminuir()
   {
      return --$this->contador;
   }*/
}
?>