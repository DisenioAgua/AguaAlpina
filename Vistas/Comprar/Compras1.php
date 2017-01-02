<?php
$opcion=$_GET["opcion"];
$criterio=strtoupper($_GET["criterio"]);
if($opcion=="buscarNombre"){
	
		include_once ("../../modelo/Conexion.php");
  		include_once ("../../modelo/DAO.php");
		$conexions=new Conexion();
		$conexion=$conexions->conectar();
		$DAO=new DAO();
		$datos=$DAO->mostrarAll($conexion,"select detalle from tproducto where codigo='$criterio'");
  		if(empty($datos))echo "No Existe";
		else
			foreach($datos as $fila){
				echo $fila[0];
			}


}

?>