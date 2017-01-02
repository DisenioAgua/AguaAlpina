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
	if(document.frme.txtUnidades.value=="")sweetAlert("Advertencia","Complete Los Campos", "error");
	
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
	function mayor(e){
		if(document.getElementById("txtUnidades").value>= 1 && document.getElementById("txtUnidades").value<=25){
			}else{
				sweetAlert("Advertencia","La Cantidad Maxima es 25", "error");
				document.frme.txtUnidades.value=0;
	document.frme.txtUnidades.value="";
				}
		}
</script>
</head>

<body>
<form action="#" method="post" enctype="multipart/form-data" name="frme">
<input type="hidden" name="bandera">
<input type="hidden" name="idbandera" id="idbandera">
<h2 align="center">Registrar Unidades</h2>
<table width="200" border="0" align="center">
  <tr>
    <td height="54">Unidades: </td>
    <td><input type="number" class="form-control" name="txtUnidades" id="txtUnidades" onkeypress="return controltag(event)" onKeyUp="mayor(event)" max="25" min="1" autocomplete="off"></td>
  </tr>
  <tr>
    <td height="39">&nbsp;</td>
    <td><input type="button" class=" btn btn-info" name="button" id="button" value="Guardar" onClick="validacion()"></td>
  </tr>
  
</table>

</form>
</body>
</html>
<?php
include "../../Controlador/ControlUnidades.php";
	
?>