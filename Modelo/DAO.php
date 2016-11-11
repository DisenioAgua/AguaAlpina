<?php
class DAO{
	function __construct(){
		  
		  }
//////////////////////////////////////////////
	public function mostrarAll($conexion, $sql){
		  
		  $query_consulta= pg_query($conexion, $sql);	  
		  while( $fila = pg_fetch_array($query_consulta)){
            $data[] = $fila;
         }		  	
		  return $data;
	  }
/////////////////////////////////////////////////
	public function add($conexion, $sql){
		$result=pg_query($conexion, $sql);
		if($result) return true;
		else return false;				
		
		}
////////////////////////////////////////////////
	public function edit($conexion, $sql){
		$result=pg_query($conexion, $sql);
		if($result) return true;
		else return false;				
		
		}
////////////////////////////////////////////////
	public function delete($conexion, $sql){
		$result=pg_query($conexion, $sql);
		if($result) return true;
		else return false;				
		
		}	
////////////////////////////////////////////////
	public function contarDatos($conexion, $sql){		
		$query_s= pg_query($conexion, $sql);
		return pg_num_rows($query_s);
		
		}
////////////////////////////////////////////////
	public function ultimoId($conexion, $sql){
		$datos=$this->mostrarAll($conexion,$sql);

		foreach($datos as $fila){
				$a=$fila[0];
			}
		$a++;
		return $a;
	}
}
?>