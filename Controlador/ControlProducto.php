<?php
$bandera=$_POST["bandera"];
$idbandera=$_POST["idbandera"];
$txtdetalle=$_POST["txtdetalle"];
$txtstock=$_POST["txtstock"];
$txtCodigo=$_POST["txtCodigo"];

include_once ("../../Modelo/Conexion.php");
include_once ("../../Modelo/DAO.php");

$conexions=new Conexion();
$conexion=$conexions->conectar();
$DAO=new DAO();

echo "<script language='javascript'>";

if($bandera=="guardar"){
		$valor=$DAO->contarDatos($conexion,"select * from tproducto where nombre=trim('$txtdetalle')");

		if($valor>0){
			echo "sweetAlert.alert('¡¡¡Error!!! Datos ya Existen');";
		}else{
				$nuevoId=$DAO->ultimoId($conexion,"select id from tproducto order by id");

			//$nuevoId=$DAO->ultimoId($conexion,"select idcargo from tproducto order by codigo");

			pg_query("BEGIN;");
			if(!$DAO->add($conexion,"insert into tproducto values ($nuevoId,trim('$txtdetalle'),$txtstock,false,$txtCodigo)")){
				pg_query("rollback");
				echo "sweetAlert.alert('¡¡¡Error!!! No se han Guardado los Datos');";
			}
			else {
				pg_query("commit");
				echo "sweetAlert.alert('guardados');";
					echo "location.href='MostrarProductos.php';";

			}
		}

	}
	else if($bandera=="modificar"){
				pg_query("BEGIN;");
				$estado="activado";
				if(!$DAO->edit($conexion,"update tproducto set nombre=trim('$txtdetalle'),minimo= $txtstock where id='$idbandera'")){
					pg_query("rollback");
					echo "alertify.alert('¡¡¡Error!!! No se han Modificado los Datos');";
				}
				else {
					pg_query("commit");
					echo "location.href='mostrarProductos.php';";

				}

		}
		else{
					pg_query("BEGIN;");

					if($bandera == 'f'){
						$estado = 'true';
					}else{
						$estado = 'false';
					}
					if(!$DAO->edit($conexion,"update tproducto set estado = $estado where id='$idbandera'")){
						pg_query("rollback");
						echo "alertify.alert('¡¡¡Error!!! No se han Modificado los Datos');";
					}
					else {
						pg_query("commit");
						location.reload();


					}

			}
