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
<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.min.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
<script>
function llenar(id,nombre,categoria,unidad,maxi,mini)
{
	//document.getElementsByName('nombre').Item[0].value=nombre;
	document.getElementById('nombre').value=nombre;
	document.getElementById('idbandera').value=id;
	//document.getElementById('nombre').value=nombre;
	document.getElementById('categoria').value=categoria;
	document.getElementById('unidad').value=unidad;
	document.getElementById('maxi').value=maxi;
	document.getElementById('mini').value=mini;
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
function validacion()
{
	if(document.prod.categoria.value==0 || document.prod.unidad.value==0 || document.prod.maxi.value=="" || document.prod.mini.value=="")
		swal("vacio");
	else
	{
		if(document.prod.maxi.value<=document.prod.mini.value)
		{
			swal("Stock Maximo debe ser mayor al Stock Minimo");
		}
		else
		{
		if(document.prod.idbandera.value!="")
			document.prod.bandera.value="modificar";
		else
			document.prod.bandera.value="guardar";
		
		document.prod.submit();
		}
							
	}
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
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
        
                    <th width="18%">No.</th>
                     <th width="24%">Codigo</th>
                     <th width="30%">Producto</th>
                     
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
$sql="select * from tproducto  order by codigo"; 
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
    <td align="center"><?php echo $fila[0]; ?></td>
    <td align="center"><?php echo $fila[1]; ?></td>
    <!--td width="4%"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#dataUpdate" data-id="<?php echo $fila[0]?>" data-nombre="<?php echo $fila[1]?>" data-categoria="<?php echo $fila[2]?>" data-unidad="<?php echo $fila[3]?>"><span class="glyphicon glyphicon-pencil"></span></button></td-->
	<td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit" onClick="llenar('<?php echo $fila[0]; ?>','<?php echo $fila[1]; ?>','<?php echo $fila[2]; ?>','<?php echo $fila[3]; ?>','<?php echo $fila[4]; ?>','<?php echo $fila[5]; ?>');"><span class="glyphicon glyphicon-pencil"></span></button></td>
   <td width="8%"><p data-placement="top" data-toggle="tooltip" title="Dar de baja"><button class="btn btn-danger btn-xs" data-title="Dar de baja" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-minus-sign"></span></button></p></td>
    </tr>
    
 
       
 </tbody>
  <?php
	 $contador++;
	
				}
	
	?>     
        
</table>
                
            </div>
            
        </div>
	</div>
</div>

<form action="#" method="post" enctype="multipart/form-data" name="prod" id="prod">
<input type="hidden" name="bandera">
<input type="hidden" name="idbandera" id="idbandera">
<input type="hidden" name="nombre" id="nombre">
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h1 class="modal-title custom_align" id="Heading" align="center">Modificar Datos del Producto</h4>
      </div>
          <div class="modal-body">
        <div class="form-group">
         Categoria del Producto:
        <select name="categoria" id="categoria" class="form-control">
        <option value="0">[Seleccionar]</option>
		<option value="Fardo">Fardo</option>
		<option value="Botella">Botella</option>
		<option value="Garrafon">Garrafon</option>
        </select>
        </div>
        <div class="form-group">
        Unidad de Medida:
         <select name="unidad" id="unidad" class="form-control">
        <option value="0">[Seleccionar]</option>
		<option value="1 Litro">1 Litro</option>
		<option value="2 Litros">2 Litros</option>
		<option value="1 Galon">1 Galon</option>
		<option value="Fardo Agua">Fardo Agua</option>
		<option value="Fardo Botella">Fardo Botella</option>
		<option value="Garrafon 5 litros">Garrafon 5 litros</option>
        </select>
         </div>
          <div class="form-group">
        Stock Máximo:
       <input class="form-control " onkeypress="return controltag(event)"  id="maxi" name="maxi" type="text" placeholder="Stock Máximo" autocomplete="off">
       </div>
	   <div class="form-group">
        Stock Minimo:
       <input class="form-control " onkeypress="return controltag(event)"  type="text" id="mini" name="mini" placeholder="Stock Minimo" autocomplete="off">
       </div>
      </div>
          <div class="modal-footer ">
        
        <a href="#" class="btn btn-block btn-lg btn-info" onClick="validacion();"><span class="glyphicon glyphicon-ok-sign"></span> Guardar Cambios</a>
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
<p align="center"><h4 align="center">Derechos Reservados UES-FMP 2016 <img src="../img/min.png" width="50px" height="50px"/></h4> </p>
</footer>
</body>
</html>
<?php
include "../../Controlador/ControlProducto.php";
	//mostrarDatos();
?>