<?php
$bandera=$_POST["bandera"];
$idbandera=$_POST["idbandera"];
$txtnomclient=$_POST["txtnomclient"];
$cbtipo=$_POST["cbtipo"];
$txtDirclient=$_POST["txtDirclient"];
$txttelclient=$_POST["txttelclient"];
$txtcorreoclient=$_POST["txtcorreoclient"];



include_once ("../../Modelo/Conexion.php");
include_once ("../../Modelo/DAO.php");

$conexions=new Conexion();
$conexion=$conexions->conectar();
$DAO=new DAO();

echo "<script language='javascript'>";

if($bandera=="guardar"){
		$valor=$DAO->contarDatos($conexion,"select * from tcliente where nombre=trim('$txtnomclient')");

		if($valor>0){
			echo "sweetAlert.alert('¡¡¡Error!!! Datos ya Existen');";
		}else{
			$estado="activado";
			$nuevoId=$DAO->ultimoId($conexion,"select id from tcliente order by id");

			pg_query("BEGIN;");


			if(!$DAO->add($conexion,"insert into tcliente values ($nuevoId,trim('$txtnomclient'),$cbtipo,trim('$txtDirclient'),trim('$txttelclient'),trim('$txtcorreoclient'))")){
				pg_query("rollback");
				echo "sweetAlert.alert('¡¡¡Error!!! No se han Guardado los Datos');";
			}
			else {
				pg_query("commit");
				echo "sweetAlert.alert('Datos Guardados Correctamente');";

			}
		}

	}
else if($bandera=="modificar"){
			pg_query("BEGIN;");
			$estado="activado";
			if(!$DAO->edit($conexion,"update tcliente set tipo=$cbtipo,nombre=trim('$txtnomclient'),dieccion=trim('$txtDirclient'),telefono=trim('$txttelclient'),correo=trim('$txtcorreoclient') where id='$idbandera'")){
				pg_query("rollback");
				echo "alertify.alert('¡¡¡Error!!! No se han Modificado los Datos');";
			}
			else {
				pg_query("commit");
				echo "location.href='MostrarCliente.php';";
				//echo "alertify.alert('Se Han Modificado los Datos del Empleado', function () {
				//location.href='MostrarTablaEmpleados.php';
				//});";
				//echo "location.href='MostrarTablaEmpleados.php';";
				//echo "location.href='profesional.php';";

			}

	}
	else{
				pg_query("BEGIN;");

				if($bandera == 'f'){
					$estado = 'true';
				}else{
					$estado = 'false';
				}
				if(!$DAO->edit($conexion,"update tcliente set estado = $estado where id='$idbandera'")){
					pg_query("rollback");
					echo "alertify.alert('¡¡¡Error!!! No se han Modificado los Datos');";
				}
				else {
					pg_query("commit");
					location.reload();


				}

		}


?>
