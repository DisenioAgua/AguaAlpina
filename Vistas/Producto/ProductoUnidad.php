<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
<title>Documento sin título</title>
<!-- esto es para los mensajes de alerta -->
<script src="../../sweetalert-master/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" type="text/css" href="../../sweetalert-master/dist/sweetalert.css">
<script src="../../sweetalert-master/dist/sweetalert.min.js"></script>
<!-- hasta aqui llega lo de los mensajes de alerta -->
<script>
// funcion para validar y enviar
 function validacion(){
	if(document.frme.cbdetalle.value==0 || document.frme.cbunidades.value==0 )sweetAlert("Advertencia","Complete Los Campos", "error");
	else{
		if(document.frme.idbandera.value!="")
			document.frme.bandera.value="modifycar";
		else
			{
			swal({   title: "Desea Guardar Producto?",   text: "Si da Clic en Si Guardará Empleado!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, Guardar!",   cancelButtonText: "No, Guardar!",   closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {  
						document.frme.bandera.value="guardar";
						document.frme.submit();	
			 } else {     swal("Cancelado", "No ha sido Guardado :)", "error");   } });
			
			}
		}
	}

</script>
</head>

<body>
<form action="#" method="post" enctype="multipart/form-data" name="frme">
<h2 align="center">Asignar Unidades al Producto</h2>
<input type="hidden" name="bandera">
<input type="hidden" name="idbandera" id="idbandera">
<table width="280" border="0" align="center">
  <tr>
    <td width="128" height="40">Detalle:</td>
    <td width="142"><select name="cbdetalle" id="cbdetalle" class="form-control">
    <option value="0">[ Seleccionar ]</option>
     <?php
		include_once ("../../Modelo/Conexion.php");
  		include_once ("../../Modelo/DAO.php");
		$conexions=new Conexion();
		$conexion=$conexions->conectar();
		$DAO=new DAO();
		$datos=$DAO->mostrarAll($conexion,"select * from tproducto");
  		if(empty($datos))echo "";
		else
			foreach($datos as $fila){
		?>	     
        
        <option value="<?php echo $fila[0]; ?>"><?php echo $fila[1];
		?></option>
		<?php
        
			}
			?>
    </select></td>
  </tr>
  <tr>
    <td height="47"> Unidades:</td>
    <td><select name="cbunidades" id="cbunidades" class="form-control">
   <option value="0">[ Seleccionar ]</option>
     <?php
		include_once ("../../Modelo/Conexion.php");
  		include_once ("../../Modelo/DAO.php");
		$conexions=new Conexion();
		$conexion=$conexions->conectar();
		$DAO=new DAO();
		$datos=$DAO->mostrarAll($conexion,"select * from tunidades");
  		if(empty($datos))echo "";
		else
			foreach($datos as $fila){
		?>	     
        
        <option value="<?php echo $fila[0]; ?>"><?php echo $fila[1];
		?></option>
		<?php
        
			}
			?>
    </select> 
   </td>
  </tr>
  <tr>
    <td height="58"><input type="button" name="button" id="button" value="Asignar" class="btn btn-info" onClick="validacion()"></td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>
</body>
</html>
<?php
include "../../Controlador/ControlAsignarUP.php";
	
?>