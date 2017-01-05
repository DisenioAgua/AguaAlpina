<?php

$bandera=$_POST["bandera"];
$idbandera=$_POST["idbandera"];
$txtnomE=$_POST["txtnomE"];
$txtapeE=$_POST["txtapeE"];
$cbsexo=$_POST["cbsexo"];
$txtDui=$_POST["txtDui"];
$txtDir=$_POST["txtDir"];
$txttelE=$_POST["txttelE"];
$cbcargo=$_POST["cbcargo"];
$txtfecha=$_POST["txtfecha"];
$txtsalario=$_POST["txtsalario"];
$txtpassword=$_POST["txtpassword"];
$cbAsigVehiculo=$_POST["cbAsigVehiculo"];

include_once ("../../Modelo/Conexion.php");
include_once ("../../Modelo/DAO.php");

$conexions=new Conexion();
$conexion=$conexions->conectar();
$DAO=new DAO();

echo "<script language='javascript'>";

if($bandera=="guardar"){
		$valor=$DAO->contarDatos($conexion,"select * from templeado where nombre=trim('$txtnomE')");

		if($valor>0){
			echo "sweetAlert.alert('¡¡¡Error!!! Datos ya Existen');";
		}else{
				$nuevoId=$DAO->ultimoId($conexion,"select id from templeado order by id");

			//$nuevoId=$DAO->ultimoId($conexion,"select idcargo from templeado order by codigo");

			pg_query("BEGIN;");
			if(!$DAO->add($conexion,"insert into templeado values ($nuevoId,trim('$txtnomE'),trim('$txtapeE'),trim('$txtDui'),$cbsexo,trim('$txtDir'),$cbcargo,$txtsalario,trim('$txtusuario'),trim('$txtpasswoord'),$cbAsigVehiculo,'$txtfecha',trim('$txttelE'))")){
				pg_query("rollback");
				echo "sweetAlert.alert('¡¡¡Error!!! No se han Guardado los Datos');";
			}
			else {
				pg_query("commit");
				echo "sweetAlert.alert('guardados');";

			}
		}

	}
