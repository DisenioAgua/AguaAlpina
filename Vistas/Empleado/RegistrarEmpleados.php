<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Empleados</title>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap-toggle.min.css">
<!-- sirven para los mensajes de alertas-->
<script src="../../sweetalert-master/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" type="text/css" href="../../sweetalert-master/dist/sweetalert.css">
<script src="../../sweetalert-master/dist/sweetalert.min.js"></script>
<!-- hasta aqui llega los de los mensajes de alerta-->

<script>
// funcion para validar y enviar
 function validacion(){
	if(document.frme.txtnomE.value=="" || document.frme.txtapeE.value=="" || document.frme.cbsexo.value==0 ||document.frme.txtDui.value=="" || document.frme.txtDir.value==""||  document.frme.txttelE.value=="" || document.frme.cbcargo.value==0 || document.frme.txtfecha=="")sweetAlert("Advertencia","Complete Los Campos", "error");
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

<h2 align="center">Registro de Empleados</h2>
<input type="hidden" name="bandera">
<input type="hidden" name="idbandera" id="idbandera">
<table width="690" border="0" align="center">
  <tr>
    <td width="221" rowspan="5"></td>
    <td width="171" height="46" align="right">(*) Nombre: </td>
    <td width="284"><input name="txtnomE" type="text" class="form-control" id="txtnomE" placeholder="Nombre" data-trigger="focus" data-placement="top" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{3,}" onkeypress="return soloLetras(event)" autocomplete="off"></td>
  </tr>
  <tr>
    <td height="45" align="right"> (*) Apellido: </td>
    <td><input type="text" class="form-control" name="txtapeE" id="txtapeE" placeholder="Apellido" data-trigger="focus" data-placement="top" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{3,}" onkeypress="return soloLetras(event)" autocomplete="off"></td>
  </tr>
  <tr>
    <td align="right">(*) Sexo: </td>
    <td><select name="cbsexo" id="cbsexo" class="form-control">
 <option value="0">[Seleccionar]</option>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
    </select></td>
  </tr>
  <tr>
    <td height="44" align="right">(*) DUI: </td>
    <td><input type="text" class="form-control" name="txtDui" id="txtDui" placeholder="Ejemplo: 01487812-1" size="70" data-mask="99999999-9" pattern="{1}[0-9]{8}[-]{1}[0-9]{1}" data-toggle="popover" data-content="Ingrese su numero de DUI" data-trigger="focus" data-placement="top" autocomplete="off"></td>
  </tr>
  <tr>
    <td height="54" align="right">(*) Dirección:  </td>
    <td><textarea name="txtDir" class="form-control" id="txtDir" ></textarea></td>
  </tr>
  <tr>
    <td height="45">&nbsp;</td>
    <td align="right">(*) Teléfono: </td>
    <td><input type="text" class="form-control" name="txttelE" id="txttelE" placeholder="7XXX-XXXX" data-mask="9999-9999" pattern="(^([6|7]{1}[0-9]{3}[-]{1}[0-9]{4})|^)$" data-toggle="popover" data-content="Ingrese su numero de Telefono. Ejemplo: 2393-0000" data-trigger="focus" data-placement="top"></td>
  </tr>
  <tr>
    <td height="42">&nbsp;</td>
    <td align="right">(*) Cargo:  </td>
    <td><select name="cbcargo" id="cbcargo" class="form-control">
    </select></td>
  </tr>
  <tr>
    <td height="59">&nbsp;</td>
    <td align="right">(*) Fecha de Contrato: </td>
    <td><input type="date" class="form-control" name="txtfecha" id="txtfecha"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><input type="button" class="btn btn-info" id="guardar" onClick="validacion()" value="Guardar"></td>
    <td align="center"><input type="button" class="btn btn-info" name="button2" id="button2" value="Limpiar"></td>
  </tr>
</table>

</form>
</body>
<script src="../../js/bootstrap-toggle.js"></script>
<script src="../../js/jasny-bootstrap.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery.min.js"></script>
   <script src="../../js/bootstrap-toggle.min.js"></script>
</html>
