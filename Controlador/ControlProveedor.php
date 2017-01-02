<?php
$bandera=$_POST["bandera"];
$idbandera=$_POST["idbandera"];
$txtnomproveedor=$_POST["txtnomproveedor"];
$txtDirProv=$_POST["txtDirProv"];
$txttelProv=$_POST["txttelProv"];
$txtcorreoProv=$_POST["txtcorreoProv"];




include_once ("../../Modelo/Conexion.php");
include_once ("../../Modelo/DAO.php");

$conexions=new Conexion();
$conexion=$conexions->conectar();
$DAO=new DAO();

echo "<script language='javascript'>";
	
if($bandera=="guardar"){
		$valor=$DAO->contarDatos($conexion,"select * from tproveedor where nomprov=trim('$txtnomproveedor')");
		
		if($valor>0){
			echo "sweetAlert.alert('¡¡¡Error!!! Datos ya Existen');";
		}else{		
			$estado="activado";
			$nuevoId=$DAO->ultimoId($conexion,"select idproveedor from tproveedor order by idproveedor");
			
			pg_query("BEGIN;");
					

			if(!$DAO->add($conexion,"insert into tproveedor values ($nuevoId,trim('$txtnomproveedor'),trim('$txtDirProv'),trim('$txttelProv'),trim('$txtcorreoProv'),trim('$estado'))")){
				pg_query("rollback");
				echo "sweetAlert.alert('¡¡¡Error!!! No se han Guardado los Datos');";
			}
			else {				
				pg_query("commit");
				echo "sweetAlert.alert('Datos Guardados Correctamente');";
								
			}
		}
	
	}
if($bandera=="modificar"){	
			pg_query("BEGIN;");
			$estado="activado";	
			if(!$DAO->edit($conexion,"update tcliente set tipocliente=trim('$tipo'),nomcliente=trim('$nombre'),direccioncliente=trim('$direccion'),telcliente=trim('$telefono'),correocliente=trim('$correo'),estado=trim('$estado') where idcliente='$idbandera'")){			
				pg_query("rollback");
				echo "alertify.alert('¡¡¡Error!!! No se han Modificado los Datos');";
			}
			else {
				pg_query("commit");
				echo "alert('modificados')";
				echo "location.href='ConsultaCliente.php';";
				//echo "alertify.alert('Se Han Modificado los Datos del Empleado', function () {
				//location.href='MostrarTablaEmpleados.php';					
				//});";
				//echo "location.href='MostrarTablaEmpleados.php';";  
				//echo "location.href='profesional.php';";
				
			}
				
	}
if($bandera=="baja"){	
			pg_query("BEGIN;");
			
			$estado="desactivado";	
			if(!$DAO->edit($conexion,"update tcliente set tipocliente=trim('$tipo'),nomcliente=trim('$nombre'),direccioncliente=trim('$direccion'),telcliente=trim('$telefono'),correocliente=trim('$correo'),estado=trim('$estado') where idcliente='$idbandera'")){			
				pg_query("rollback");
				echo "alertify.alert('¡¡¡Error!!! No se han Modificado los Datos');";
			}
			else {
				pg_query("commit");
				echo "alert('desactivado');";
								
			}
				
	}
if($bandera=="alta"){	
			pg_query("BEGIN;");
			
			$estado="activado";	
			if(!$DAO->edit($conexion,"update tcliente set tipocliente=trim('$tipo'),nomcliente=trim('$nombre'),direccioncliente=trim('$direccion'),telcliente=trim('$telefono'),correocliente=trim('$correo'),estado=trim('$estado') where idcliente='$idbandera'")){			
				pg_query("rollback");
				echo "alertify.alert('¡¡¡Error!!! No se han Modificado los Datos');";
			}
			else {
				pg_query("commit");
				echo "alert('activado');";
								
			}
				
	}
if($bandera=="desaparecer"){	
		pg_query("BEGIN;");
			
		if(!$DAO->delete($conexion,"delete from empleado where idempleado='$idbandera'")){
				pg_query("rollback");
				echo "alertify.alert('¡¡¡Error!!! No se han Eliminado los Datos');";
			}
			else {
				pg_query("commit");
                echo "alertify.alert('Empleado Eliminado', function () {
				location.href='MostrarTablaEmpleados.php';					
				});";
				
			}
				
	}
	echo "</script>";

?>