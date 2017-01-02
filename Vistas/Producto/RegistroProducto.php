<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Productos</title>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
<!-- esto es para los mensajes de alerta -->
<script src="../../sweetalert-master/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" type="text/css" href="../../sweetalert-master/dist/sweetalert.css">
<script src="../../sweetalert-master/dist/sweetalert.min.js"></script>
<!-- hasta aqui llega lo de los mensajes de alerta -->
<script>
// funcion para validar y enviar
 function validacion(){
	if(document.frme.txtcodigo.value=="" || document.frme.txtdetalle.value=="" || document.frme.txtstock.value=="")sweetAlert("Advertencia","Complete Los Campos", "error");
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
<h2 align="center">Registrar Productos</h2>
<input type="hidden" name="bandera">
<input type="hidden" name="idbandera" id="idbandera">
<table width="289" height="144" border="0" align="center">
  <tr>
    <td width="56" height="46">Codigo:</td>
    <td width="223"><input type="text" class="form-control" name="txtcodigo" id="txtcodigo" onkeypress="return controltag(event)" placeholder="00000" autocomplete="off"></td>
  </tr>
  <tr>
    <td height="54">Detalle:</td>
    <td><textarea name="txtdetalle" class="form-control" id="txtdetalle" placeholder="detalles"></textarea></td>
  </tr>
  <tr>
    <td height="54">Stock Minimo:</td>
    <td><input name="txtstock" class="form-control" id="txtstock" placeholder="000" type="text" autocomplete="off"></td>
  </tr>
  <tr>
 
    <td><p>&nbsp;
      </p>
      <p>
        <input type="button" class=" btn btn-info" name="guardar" id="guardar" value="Guardar" onClick="validacion()">
      </p></td>
    <td align="center"><p>&nbsp;
      </p>
      <p>
        <input type="button" class="btn btn-info" name="button2" id="button2" value="Limpiar" onClick="limpio()">
      </p></td>
  </tr>
</table>

</form>
</body>
</html>
<?php
include "../../Controlador/ControlProducto.php";
	
?>