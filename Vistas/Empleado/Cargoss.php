<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
<!-- esto es para los mensajes de alerta -->
<script src="../../sweetalert-master/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" type="text/css" href="../../sweetalert-master/dist/sweetalert.css">
<script src="../../sweetalert-master/dist/sweetalert.min.js"></script>
<!-- hasta aqui llega lo de los mensajes de alerta -->
<script>
// funcion para validar y enviar
 function validacion(){
	if(document.frme.txtcargo.value=="" || document.frme.txtsalario.value=="" )sweetAlert("Advertencia","Complete Los Campos", "error");
	else{
		if(document.frme.idbandera.value!="")
			document.frme.bandera.value="modifycar";
		else
			{
			swal({   title: "Desea Guardar este Cargo?",   text: "Si da Clic en Si Guardará Cargo!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, Guardar!",   cancelButtonText: "No, Guardar!",   closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {  
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
<!-- funcion para que solo sean numeros-->
function controltag(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true;
        else if (tecla==0||tecla==9)  return true;
       // patron =/[0-9\s]/;// -> solo letras
        patron =/[0-9\s]/;// -> solo numeros
        te = String.fromCharCode(tecla);
        return patron.test(te);
    }
</script>
</head>

<body>

<form action="#" method="post" enctype="multipart/form-data" name="frme">
<h2 align="center">Registro de Cargos</h2>
<input type="hidden" name="bandera">
<input type="hidden" name="idbandera" id="idbandera">
<table width="354" border="0" align="center">
  <tr>
    <td height="45" align="left">(*) Nombre de Cargo:</td>
    <td width="192" align="left">
      <input name="txtcargo" type="text" class="form-control" id="txtcargo"></td>
  </tr>
  <tr>
    <td height="50" align="right">(*)   Salario:</td>
    <td>
      <input name="txtsalario" type="text" class="form-control" id="txtsalario"></td>
  </tr>
  <tr>
    <td align="center"><input name="guardar"  type="button" class="btn btn-info" id="guardar" value="Guardar" onClick="validacion()"></td>
    </tr>
</table>

</form>
</body>
</html>
<?php
include "../../Controlador/ControlCargo.php";
	
?>