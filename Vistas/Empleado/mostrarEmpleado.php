<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<script src="../../js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
<!-- esto es para los mensajes de alerta -->
<script src="../../sweetalert-master/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" type="text/css" href="../../sweetalert-master/dist/sweetalert.css">
<script src="../../sweetalert-master/dist/sweetalert.min.js"></script>
<!-- hasta aqui llega lo de los mensajes de alerta -->
<link rel="stylesheet" type="text/css" href="../../css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap-responsive.min.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">

<script src="../../js/bootstrap.min.js"></script>
<?php $tipos; ?>
<script>
function llenar(id,nombre,apellido,dui,sexo,direccion,cargo,salario,telefono,vehiculo_id,fecha_ingreso)
{
	//document.getElementsByName('nombre').Item[0].value=nombre;
	document.getElementById('idbandera').value=id;
	document.getElementById('txtnomE').value=nombre;
	document.getElementById('txtapeE').value=apellido;
  document.getElementById('txtDui').value=dui;
  if (sexo == 't') {
    tipo_nuevo = 'true';
  }else{
    tipo_nuevo = 'false';
  }
	document.getElementById('cbsexo').value=tipo_nuevo;
  document.getElementById('txtDir').value=direccion;
  document.getElementById('cbcargo').value=cargo;
  document.getElementById('txtsalario').value=salario;
  document.getElementById('txttelE').value=telefono;
  document.getElementById('cbAsigVehiculo').value=vehiculo_id;
  document.getElementById('txtfecha').value=fecha_ingreso;
}
function dar_baja(id,nombre,categoria,unidad,maxi,mini)
{
	document.getElementById('idbandera').value=id;
	document.getElementById('nombre').value=nombre;
	//document.getElementById('nombre').value=nombre;
	document.getElementById('categoria').value=categoria;
	document.getElementById('unidad').value=unidad;
	document.getElementById('maxi').value=maxi;
	document.getElementById('mini').value=mini;
	document.prod.bandera.value="baja";
	document.prod.submit();
}
function validacion(){
 if( document.frme.cbtipo.value==0 || document.frme.txtnomclient.value=="" || document.frme.txtDirclient.value=="" ||document.frme.txttelclient.value=="" || document.frme.txtcorreoclient.value=="")sweetAlert("Advertencia","Complete Los Campos", "error");
 else{
	 if(document.frme.idbandera.value!=""){
		 document.frme.bandera.value="modificar";
		 document.frme.submit();
	 }
	 else
		 {
		 swal({   title: "Desea Guardar Producto?",   text: "Si da Clic en Si Guardará Empleado!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, Guardar!",   cancelButtonText: "No, Guardar!",   closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {
					 document.frme.bandera.value="guardar";
					 document.frme.submit();
			} else {     swal("Cancelado", "No ha sido Guardado :)", "error");   } });

		 }
	 }
 }
 function baja(id,estado){
document.getElementById('idbandera').value=id;
swal({   title: "Desea cambiar estado del Cliente?",   text: "Si da Clic en Si Guardará Empleado!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, Guardar!",   cancelButtonText: "No, Guardar!",   closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {
			document.frme.bandera.value=estado;
			document.frme.submit();
 } else {     swal("Cancelado", "No ha sido cambiado :)", "error");   } });

}
</script>
</head>

<body>
<div class="container">
	<div class="row">


        <div class="col-md-12">
        <h4 class="Three-Dee" align="center">Listados de Productos Activados</h4>
        <div class="table-responsive">





  <br>
	<a href="RegistroClientes.php" class="btn btn-success">Nuevo</a>
              <table id="mytable" class="table table-bordred table-striped">

                   <thead>


                    <th width="5%">No.</th>
										<th width="24%">Nombre</th>
                     <th width="10%">Dirección</th>
                     <th width="30%">Teléfono</th>
                     <th width="12%">cargo</th>
                     <th width="12%">Salario</th>

                      <th colspan="2">Acciones</th>

                       <td width="0"></thead>
    <tbody>
    <?php

						$criterio=$_GET["criterio"];
						$criterio=($criterio);
						include_once ("../../Modelo/Conexion.php");
  		include_once ("../../Modelo/DAO.php");
						$contador=1;
						$correlativo=0;
						$conexions=new Conexion();
						$conexion=$conexions->conectar();
						$DAO=new DAO();



//$res=pg_query($conexion,$sql);
//select *from clasificacion where nombre like '%$criterio%' order by nombre
$sql="select * from templeado  order by nombre";
//$sql="select * from tproducto where nomproducto like '%$criterio%' or descripcionproducto like '%$criterio%' order by idproducto";
$datos=$DAO->mostrarAll($conexion,$sql);


//////////fin consulta con limites


  						if(empty($datos))
						{
							//echo("hola");
						}

						else
							foreach($datos as $fila){

							$correlativo++;

  ?>
    <tr>
    <td align="center"><?php echo $correlativo; ?></td>
		<td align="center"><?php echo $fila[1]; ?>    <?php echo $fila[2]; ?></td>
    <td align="center"><?php echo $fila[5]; ?></td>
    <td align="center"><?php echo $fila[12]; ?></td>
    <td align="center"><?php if($fila[6]==1){echo "Administrador";}else if($fila[6]==2){echo "Vendedor";}else{echo "Motorista";} ?></td>
    <td align="center"><?php echo $fila[7]; ?></td>

    <!--td width="4%"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#dataUpdate" data-id="<?php echo $fila[0]?>" data-nombre="<?php echo $fila[1]?>" data-categoria="<?php echo $fila[2]?>" data-unidad="<?php echo $fila[3]?>"><span class="glyphicon glyphicon-pencil"></span></button></td-->
	<td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit" onClick="llenar('<?php echo $fila[0]; ?>','<?php echo $fila[1]; ?>','<?php echo $fila[2]; ?>','<?php echo $fila[3]; ?>','<?php echo $fila[4]; ?>','<?php echo $fila[5]; ?>','<?php echo $fila[6]; ?>','<?php echo $fila[7]; ?>','<?php echo $fila[12]; ?>','<?php echo $fila[9]; ?>','<?php echo $fila[10]; ?>','<?php echo $fila[11]; ?>','<?php echo $fila[8]; ?>');">
		Editar
	</button></td>
   <td width="8%"><p data-placement="top" data-toggle="tooltip" title="Dar de baja"><button class="btn btn-danger btn-xs" data-title="Dar de baja" onClick="baja('<?php echo $fila[0]; ?>','<?php echo $fila[6]; ?>');" >
		 Dar de baja
	 </button></p></td>
    </tr>
  <?php
	 $contador++;
				}
	?>

</tbody>
</table>

            </div>

        </div>
	</div>
</div>

<form action="#" method="post" enctype="multipart/form-data" name="frme" id="frme">
<input type="hidden" name="bandera">
<input type="hidden" name="idbandera" id="idbandera">
<input type="hidden" name="valtipo" id="valtipo" value="nada">
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
				<h1 class="modal-title custom_align" id="Heading" align="center">Modificar Datos del cliente</h4>
				</div>
				<div class="modal-body">
					<!---->
          <table width="450" border="0">
              <td width="171" height="46" align="right">(*) Nombre: </td>
              <td width="284"><input name="txtnomE" type="text" class="form-control" id="txtnomE" placeholder="Nombre" data-trigger="focus" data-placement="top" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{3,}" onkeypress="return soloLetras(event)" autocomplete="off"></td>
            </tr>
            <tr>
              <td align="right"> (*) Apellido: </td>
              <td><input type="text" class="form-control" name="txtapeE" id="txtapeE" placeholder="Apellido" data-trigger="focus" data-placement="top" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{3,}" onkeypress="return soloLetras(event)" autocomplete="off"></td>
            </tr>
            <tr>
              <td align="right">(*) Sexo: </td>
              <td><select name="cbsexo" id="cbsexo" class="form-control">
                <option value='true'>Masculino</option>
                <option value='false'>Femenino</option>
              </select></td>
            </tr>
            <tr>
              <td align="right">(*) DUI: </td>
              <td><input type="text" class="form-control" name="txtDui" id="txtDui" placeholder="Ejemplo: 01487812-1" size="70" data-mask="99999999-9" pattern="{1}[0-9]{8}[-]{1}[0-9]{1}" data-toggle="popover" data-content="Ingrese su numero de DUI" data-trigger="focus" data-placement="top" autocomplete="off"></td>
            </tr>
            <tr>
              <td align="right">(*) Dirección:  </td>
              <td><textarea name="txtDir" class="form-control" id="txtDir" ></textarea></td>
            </tr>
            <tr>
              <td align="right">(*) Teléfono: </td>
              <td><input type="text" class="form-control" name="txttelE" id="txttelE" placeholder="7XXX-XXXX" data-mask="9999-9999" pattern="(^([6|7]{1}[0-9]{3}[-]{1}[0-9]{4})|^)$" data-toggle="popover" data-content="Ingrese su numero de Telefono. Ejemplo: 2393-0000" data-trigger="focus" data-placement="top"></td>
            </tr>
            <tr>
              <td align="right">(*) Cargo:  </td>
              <td><select name="cbcargo" id="cbcargo" class="form-control">
                <option value="0">[Seleccionar]</option>
                <option value="1">Administrador</option>
                <option value="2">Vendedor</option>
                <option value="3">Motorista</option>
              </select></td>
            </tr>
            <tr>
              <td align="right">(*) Fecha de Contrato: </td>
              <td><input type="date" class="form-control" name="txtfecha" id="txtfecha"></td>
            </tr>
            <tr>
              <td align="right">(*) Salario: </td>
              <td><input type="text" class="form-control" name="txtsalario" id="txtsalario" placeholder="00.00"  pattern="(^([6|7]{1}[0-9]{3}[-]{1}[0-9]{4})|^)$" data-toggle="popover" data-content="Ingrese su numero de Telefono. Ejemplo: 2393-0000" data-trigger="focus" data-placement="top"></td>
            </tr>
            <tr>
              <td align="right">(*) Usuario: </td>
              <td><input type="text" class="form-control" name="txtusuario" id="txtusuario" placeholder="Usuario"  data-toggle="popover" data-content="Ingrese su numero de Telefono. Ejemplo: 2393-0000" data-trigger="focus" data-placement="top"></td>
            </tr>
            <tr>
              <td align="right">(*) Contraseña: </td>
              <td><input type="text" class="form-control" name="txtpassword" id="txtpassword" placeholder="contraseña"  data-toggle="popover" data-content="Ingrese su numero de Telefono. Ejemplo: 2393-0000" data-trigger="focus" data-placement="top"></td>
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

          </table>

					<!---->
				</div>
				<div class="modal-footer ">

					<a href="#" class="btn btn-block btn-lg btn-info" data-dismiss="modal" onClick="validacion();"><span class="glyphicon glyphicon-ok-sign"></span> Guardar Cambios</a>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>



	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>

					<h4 class="modal-title custom_align" id="Heading">Dar de baja</h4>
				</div>
				<div class="modal-body">

					<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Desea dar de baja a este Producto?</div>

				</div>
				<div class="modal-footer ">
					<button type="button" class="btn btn-success" onClick="dar_baja('<?php echo $fila[0]; ?>','<?php echo $fila[1]; ?>','<?php echo $fila[2]; ?>','<?php echo $fila[3]; ?>','<?php echo $fila[4]; ?>','<?php echo $fila[5]; ?>');"><span class="glyphicon glyphicon-ok-sign"></span> Si</button>
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</form>
<br>
<br>
<br>
<footer class="pie">
	<p align="center"><h4 align="center">Derechos Reservados UES-FMP 2016 <img src="../../img/min.png" width="50px" height="50px"/></h4> </p>
</footer>
</body>
</html>
<?php
include "../../Controlador/Controlcliente.php";
//mostrarDatos();
?>
