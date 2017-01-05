<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Vehiculos</title>
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
			swal({   title: "Desea Guardar los Datos?",   text: "Si da Clic en Si Guardará !",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, Guardar!",   cancelButtonText: "No, Guardar!",   closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {
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
<h2 align="center">Registrar Vehiculos</h2>
<table width="386" border="0" align="center">
  <tr>
    <td width="168" height="47">Nº Equipo:</td>
    <td width="219"><input type="text" class="form-control" name="txtnumEquipo" id="txtnumEquipo" placeholder="Nº equipo" autocomplete="off"></td>
  </tr>
  <tr>
    <td height="47">Placa:</td>
    <td><input type="text" class="form-control" name="txtnumPlaca" id="txtnumPlaca" placeholder="Nº placa" autocomplete="off"></td>
  </tr>
  <tr>
    <td height="47">Marca:</td>
    <td><input type="text" class="form-control" name="txtMarca" id="txtMarca" placeholder="Marca" autocomplete="off"></td>
  </tr>
  <tr>
    <td height="47">Modelo:</td>
    <td><input type="text" class="form-control" name="txtModelo" id="txtModelo" placeholder="0000" autocomplete="off"></td>
  </tr>
  <tr>
    <td height="49">Fecha de Ingreso</td>
    <td><input type="date" name="txtfechaVehiculo" id="txtfechaVehiculo" class="form-control"></td>
  </tr>
  <tr>
    <td height="47">Estado: </td>
    <td width="203"><select name="cbestado" id="cbestado" class="form-control">
    <option value="0">[Seleccionar]</option>
        <option value="1">Activo</option>
        <option value="2">Reparacion</option>
        <option value="3">Inactivo</option>
    </select></td>
  </tr>
  <tr>
    <td height="47">Combustible: </td>
    <td width="203"><select name="cbcombustible" id="cbcombustible" class="form-control">
    <option value="0">[Seleccionar]</option>
        <option value=TRUE>Gasolina</option>
        <option value=FALSE>Diesel</option>
    </select></td>
  </tr>
  <tr>
    <td height="62"><input type="button" class=" btn btn-info" name="guardar" id="guardar" value="Guardar" onClick="validacion()"></td>
    <td><input type="button" class="btn btn-info" name="guardar" id="guardar" value="Limpiar"></td>
  </tr>
</table>

</form>
</body>
</html>
<?php
include "../../Controlador/ControlVehiculo.php";

?>
