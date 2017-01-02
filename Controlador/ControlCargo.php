<?php
$bandera=$_POST["bandera"];
$idbandera=$_POST["idbandera"];
$txtcargo=$_POST["txtcargo"];
$txtsalario=$_POST["txtsalario"];

include_once ("../../Modelo/Conexion.php");
include_once ("../../Modelo/DAO.php");

$conexions=new Conexion();
$conexion=$conexions->conectar();
$DAO=new DAO();

echo "<script language='javascript'>";
	
if($bandera=="guardar"){
		$valor=$DAO->contarDatos($conexion,"select * from tcargo where nomcargo=trim('$txtcargo')");
		
		if($valor>0){
			echo "sweetAlert.alert('¡¡¡Error!!! Datos ya Existen');";
		}else{		
			
			$nuevoId=$DAO->ultimoId($conexion,"select idcargo from tcargo order by idcargo");
			
			pg_query("BEGIN;");
			if(!$DAO->add($conexion,"insert into tcargo values ($nuevoId,trim('$txtcargo'),$txtsalario)")){
				pg_query("rollback");
				echo "sweetAlert.alert('¡¡¡Error!!! No se han Guardado los Datos');";
			}
			else {
				pg_query("commit");
				echo "sweetAlert.alert('guardados');";
				
			}
		}
	
	}
