<?php
$bandera=$_POST["bandera"];
//$idbandera=$_POST["idbandera"];
$cbdetalle=$_POST["cbdetalle"];
$cbunidades=$_POST["cbunidades"];
//$txtstock=$_POST["txtstock"];

include_once ("../../Modelo/Conexion.php");
include_once ("../../Modelo/DAO.php");

$conexions=new Conexion();
$conexion=$conexions->conectar();
$DAO=new DAO();

echo "<script language='javascript'>";
	
if($bandera=="guardar"){
		$valor=$DAO->contarDatos($conexion,"select * from prounidad where codigo=trim('$cbdetalle')");
		
		if($valor>0){
			echo "sweetAlert.alert('¡¡¡Error!!! Datos ya Existen');";
		}else{		
			
			//$nuevoId=$DAO->ultimoId($conexion,"select idcargo from tproducto order by codigo");
			
			pg_query("BEGIN;");
			if(!$DAO->add($conexion,"insert into prounidad values ($cbdetalle,$cbunidades)")){
				pg_query("rollback");
				echo "sweetAlert.alert('¡¡¡Error!!! No se han Guardado los Datos');";
			}
			else {
				pg_query("commit");
				echo "sweetAlert.alert('guardados');";
				
			}
		}
	
	}
