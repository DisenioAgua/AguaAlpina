<?php
$bandera=$_POST["bandera"];
$idbandera=$_POST["idbandera"];
$txtUnidades=$_POST["txtUnidades"];


include_once ("../../Modelo/Conexion.php");
include_once ("../../Modelo/DAO.php");

$conexions=new Conexion();
$conexion=$conexions->conectar();
$DAO=new DAO();

echo "<script language='javascript'>";
	
if($bandera=="guardar"){
		$valor=$DAO->contarDatos($conexion,"select * from tunidades where codigo=trim('$txtUnidades')");
		
		if($valor>0){
			echo "sweetAlert.alert('¡¡¡Error!!! Datos ya Existen');";
		}else{		
			
			$nuevoId=$DAO->ultimoId($conexion,"select idundad from tunidades order by nomunidad");
			
			pg_query("BEGIN;");
			if(!$DAO->add($conexion,"insert into tunidades values ($nuevoId,$txtUnidades)")){
				pg_query("rollback");
				echo "sweetAlert.alert('¡¡¡Error!!! No se han Guardado los Datos');";
			}
			else {
				pg_query("commit");
				echo "sweetAlert.alert('guardados');";
				
			}
		}
	
	}
