<?php
$bandera=$_POST["bandera"];
$idbandera=$_POST["idbandera"];
$txtcodigo=$_POST["txtcodigo"];
$txtdetalle=$_POST["txtdetalle"];
$txtstock=$_POST["txtstock"];

include_once ("../../Modelo/Conexion.php");
include_once ("../../Modelo/DAO.php");

$conexions=new Conexion();
$conexion=$conexions->conectar();
$DAO=new DAO();

echo "<script language='javascript'>";
	
if($bandera=="guardar"){
		$valor=$DAO->contarDatos($conexion,"select * from tproducto where codigo=trim('$txtcodigo')");
		
		if($valor>0){
			echo "sweetAlert.alert('¡¡¡Error!!! Datos ya Existen');";
		}else{		
			
			//$nuevoId=$DAO->ultimoId($conexion,"select idcargo from tproducto order by codigo");
			
			pg_query("BEGIN;");
			if(!$DAO->add($conexion,"insert into tproducto values ($txtcodigo,trim('$txtdetalle'),$txtstock)")){
				pg_query("rollback");
				echo "sweetAlert.alert('¡¡¡Error!!! No se han Guardado los Datos');";
			}
			else {
				pg_query("commit");
				echo "sweetAlert.alert('guardados');";
				
			}
		}
	
	}
