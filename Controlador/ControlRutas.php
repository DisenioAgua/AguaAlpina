<?php

$bandera=$_POST["bandera"];
$idbandera=$_POST["idbandera"];
$txtnomE=$_POST["txtnomE"];
$cbAsigVehiculo=$_POST["cbAsigVehiculo"];

include_once ("../../Modelo/Conexion.php");
include_once ("../../Modelo/DAO.php");

$conexions=new Conexion();
$conexion=$conexions->conectar();
$DAO=new DAO();

echo "<script language='javascript'>";

if($bandera=="guardar"){
		$valor=$DAO->contarDatos($conexion,"select * from truta where nombre=trim('$txtnomE')");

		if($valor>0){
			echo "sweetAlert.alert('¡¡¡Error!!! Datos ya Existen');";
		}else{
				$nuevoId=$DAO->ultimoId($conexion,"select id from truta order by id");

			//$nuevoId=$DAO->ultimoId($conexion,"select idcargo from truta order by codigo");

			pg_query("BEGIN;");
			if(!$DAO->add($conexion,"insert into truta values ($nuevoId,trim('$txtnomE'),$cbAsigVehiculo)")){
				pg_query("rollback");
				echo "sweetAlert.alert('¡¡¡Error!!! No se han Guardado los Datos');";
			}
			else {
				pg_query("commit");
				echo "sweetAlert.alert('guardados');";

			}
		}

	}
