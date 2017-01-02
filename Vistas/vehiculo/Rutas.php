<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Rutas</title>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
<!-- esto es para los mensajes de alerta -->
<script src="../../sweetalert-master/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" type="text/css" href="../../sweetalert-master/dist/sweetalert.css">
<script src="../../sweetalert-master/dist/sweetalert.min.js"></script>
<!-- hasta aqui llega lo de los mensajes de alerta -->
<script>
// funcion para validar y enviar
 function validacion(){
	if(document.frme.txtnumEquipo.value=="" || document.frme.txtnumPlaca.value=="" || document.frme.txtMarca.value=="" ||document.frme.txtModelo.value=="" || document.frme.txtfechaVehiculo.value=="")sweetAlert("Advertencia","Complete Los Campos", "error");
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
<form action="#" method="post" enctype="multipart/form-data">
<input type="hidden" name="bandera">
<input type="hidden" name="idbandera" id="idbandera">
<h2 align="center">Registrar Rutas</h2>
<table width="259" border="0" align="center">
  <tr>
    <td width="44" height="47">Ruta:</td>
    <td width="205"><input type="text" name="txtrutas" id="txtrutas" class="form-control"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><input type="submit" name="button" id="button" value="Guardar" class="btn btn-info"></td>
  </tr>
</table>

</form>
</body>
</html>