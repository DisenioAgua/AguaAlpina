<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Proveedores</title>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
<!-- esto es para los mensajes de alerta -->
<script src="../../sweetalert-master/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" type="text/css" href="../../sweetalert-master/dist/sweetalert.css">
<script src="../../sweetalert-master/dist/sweetalert.min.js"></script>
<!-- hasta aqui llega lo de los mensajes de alerta -->
<script>
// funcion para validar y enviar
 function validacion(){
	if(document.frme.txtnomproveedor.value=="" || document.frme.txtDirProv.value=="" || document.frme.txttelProv.value=="" ||document.frme.txtcorreoProv.value=="")sweetAlert("Advertencia","Complete Los Campos", "error");
	else{
		if(document.frme.idbandera.value!="")
			document.frme.bandera.value="modifycar";
		else
			{
			swal({   title: "Desea Guardar Empleado?",   text: "Si da Clic en Si Guardará Empleado!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, Guardar!",   cancelButtonText: "No, Guardar!",   closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {  
						document.frme.bandera.value="guardar";
						document.frme.submit();	
			 } else {     swal("Cancelado", "No ha sido Guardado :)", "error");   } });
			
			}
		}
	}
//funcion para validar que solo sean letras
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;

}
</script>
</head>

<body>
<form action="#" method="post" enctype="multipart/form-data" name="frme">
<input type="hidden" name="bandera">
<input type="hidden" name="idbandera" id="idbandera">
<h2 align="center">Registrar Proveedores</h2>
<table width="407" border="0" align="center">
  <tr>
    <td width="155" height="46">Nombre del Proveedor:</td>
    <td width="242"><input type="text" class="form-control" name="txtnomproveedor" id="txtnomproveedor" autocomplete="off"></td>
  </tr>
  <tr>
    <td height="45">Dirección :</td>
    <td><textarea name="txtDirProv" class="form-control" id="txtDirProv"></textarea></td>
  </tr>
  <tr>
    <td height="44">Teléfono :</td>
    <td><input type="text" class="form-control" name="txttelProv" id="txttelProv" autocomplete="off"></td>
  </tr>
  <tr>
    <td height="48">Correo</td>
    <td><input type="email" class="form-control" name="txtcorreoProv" id="txtcorreoProv"></td>
  </tr>
  <tr>
    <td height="41" align="center"><input type="button" class=" btn btn-info" name="guardar" id="guardar" value="Guardar" onClick="validacion()"></td>
    <td align="center"><input type="button" class="btn-info" name="button2" id="button2" value="Limpiar"></td>
  </tr>
</table>

</form>
</body>
</html>
<?php
include "../../Controlador/ControlProveedor.php";
	
?>