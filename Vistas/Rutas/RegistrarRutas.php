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
    if(document.frme.txtnomE.value=="" || document.frme.cbAsigVehiculo.value==0 )sweetAlert("Advertencia","Complete Los Campos", "error");
    else{
      if(document.frme.idbandera.value!="")
      document.frme.bandera.value="modifycar";
      else
      {
        swal({   title: "Desea Guardar los Datos?",   text: "Si da Clic en Si Guardará Empleado!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, Guardar!",   cancelButtonText: "No, Guardar!",   closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {
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

    <h2 align="center">Registro de Rutas</h2>
    <input type="hidden" name="bandera">
    <input type="hidden" name="idbandera" id="idbandera">
    <table width="690" border="0" align="center">
      <tr>
        <td width="221" rowspan="5"></td>
        <td width="171" height="46" align="right">(*) Nombre: </td>
        <td width="284"><input name="txtnomE" type="text" class="form-control" id="txtnomE" placeholder="Nombre" data-trigger="focus" data-placement="top" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{3,}" onkeypress="return soloLetras(event)" autocomplete="off"></td>
      </tr>
      <tr>

        <td align="right">(*) Asignacion de vehiculo:  </td>
        <td><select name="cbAsigVehiculo" id="cbAsigVehiculo" class="form-control">
          <option value="0">[Seleccionar]</option>
          <?php
          include_once ("../../Modelo/Conexion.php");
          include_once ("../../Modelo/DAO.php");
          $conexions=new Conexion();
          $conexion=$conexions->conectar();
          $DAO=new DAO();
          $datos1=$DAO->mostrarAll($conexion,"select * from tvehiculo WHERE estado = 1 order by codigo");
          if(empty($datos1))echo "";
          else
          foreach($datos1 as $fila1){
            ?>
            <option value="<?php echo $fila1[0]; ?>"><?php echo $fila1[1]; ?></option>
            <?php
          }
          ?>
        </select></td>
      </tr>
      <tr>

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
<?php
include "../../Controlador/ControlRutas.php";

?>
