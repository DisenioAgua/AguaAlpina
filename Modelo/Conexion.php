<?php
   class Conexion {
	   
      function __construct(){
		  
		  }
      public function conectar(){
         	$server   = "localhost";
  			$puerto   = "5432";
 			$database = "dbAgua";
  			$usuario  = "postgres";
  			$clave    = "root"; 

			$conexion1 = pg_connect("host=$server port=$puerto dbname=$database user=$usuario password=$clave");
         if (!$conexion1)
			 header('Location: offline.html');			 				
				
   		$query_s= pg_query($conexion1,"set names 'UTF-8'");	
        //$conexion->set_charset('utf8');
         
         return $conexion1;
      }
	  
      
   }
?>