<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Clientes</title>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
<!-- esto es para los mensajes de alerta -->
<script src="../../sweetalert-master/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" type="text/css" href="../../sweetalert-master/dist/sweetalert.css">
<script src="../../sweetalert-master/dist/sweetalert.min.js"></script>
<!-- hasta aqui llega lo de los mensajes de alerta -->
<script>
// funcion para validar y enviar
 function validacion(){
	if(document.frme.cbtipo.value==0 || document.frme.txtnomclient.value=="" || document.frme.txtDirclient.value=="" ||document.frme.txttelclient.value=="" || document.frme.txtcorreoclient.value=="")sweetAlert("Advertencia","Complete Los Campos", "error");
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
<h2 align="center">Registrar Clientes</h2>
<table width="327" height="312" border="0" align="center">
  <tr>
    <th align="right">Tipo de Cliente: </th>
    <td width="203"><select name="cbtipo" id="cbtipo" class="form-control">
    <option value="0">[Seleccionar]</option>
        <option value="Residencial">Residencial</option>
        <option value="Empresarial">Empresarial</option>
    </select></td>
  </tr>
  <tr>
    <th align="right">Nombre: </th>
    <td><input type="text" class="form-control" name="txtnomclient" id="txtnomclient" placeholder="Nombre completo" autocomplete="off"></td>
  </tr>
  <tr>
    <th height="53" align="right">Dirección: </th>
    <td><textarea name="txtDirclient" class="form-control" id="txtDirclient" placeholder="dirección"></textarea></td>
  </tr>
  <tr>
    <th height="48" align="right">Teléfono: </th>
    <td><input type="text" class="form-control" name="txttelclient" id="txttelclient" data-mask="9999-9999" pattern="(^([6|7]{1}[0-9]{3}[-]{1}[0-9]{4})|^)$" data-toggle="popover" data-content="Ingrese su numero de Telefono. Ejemplo: 2393-0000" data-trigger="focus" data-placement="top" required autocomplete="off"></td>
  </tr>
  <tr>
    <th height="47" align="right">Correo: </th>
    <td><input type="email" class="form-control" name="txtcorreoclient" id="txtcorreoclient" placeholder="ejemplo@gmail.com" autocomplete="off"></td>
  </tr>
  <tr>
    <td height="55" align="center"><input type="button" class=" btn btn-info" name="guardar" id="guardar" value="Guardar" onClick="validacion()">
    </td>
    <td align="center">
      <input type="button" class="btn btn-info" name="guardar" id="guardar" value="Limpiar"></td>
    </tr>
</table>

</form>
</body>

</html>
<?php
include "../../Controlador/ControlCliente.php";
	
?>