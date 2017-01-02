<?php session_start(); 
if(!isset($_REQUEST['bandera'])){
	unset($_SESSION["acumulador"]);
	unset($_SESSION["matriz"]);
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Compra de Productos...</title>
<title>Proveedores</title>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
<!-- esto es para los mensajes de alerta -->
<script src="../../sweetalert-master/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" type="text/css" href="../../sweetalert-master/dist/sweetalert.css">
<script src="../../sweetalert-master/dist/sweetalert.min.js"></script>
<!-- hasta aqui llega lo de los mensajes de alerta -->
<link href="../../css/estilos.css" rel="stylesheet" type="text/css">
<link href="../../css/estilo.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../../css/estiloTabla.css" type="text/css">
<script language="javascript">
function showUser(str,id)
{
	if(str==""){
		document.getElementById("mostrar").innerHTML="";
		return;
	}
	
	if(window.XMLHttpRequest){
	xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById("mostrar").innerHTML=xmlhttp.responseText;
		}
	}
	if(str=="agregar"){
	  	var codPro=document.gm.codPro.value;
	  	var cantidad=document.gm.cantidad.value;
	  	var precio=document.gm.precio.value;	  	
	   
	  
		if(codPro=="" || cantidad=="" || precio=="")alert("Complete todos los campos Producto, Cantidad, Precio");
		else{
			xmlhttp.open("GET","compras2.php?opcion="+str+"&cantidad="+cantidad+"&producto="+codPro+"&precio="+precio, true);
			xmlhttp.send();
			document.gm.codPro.value="";
			document.gm.cantidad.value="";
			document.gm.precio.value="";
			document.gm.codPro.focus();
		}
	}else{
		if(str=="quitar"){
			xmlhttp.open("GET","compras2.php?id="+id+"&opcion="+str, true);
			xmlhttp.send();
		}
		document.gm.codPro.focus();
	}
}

function ajax_nombre(str)
{
if (str==""){document.getElementById("nomPro").innerHTML="";return;
document.getElementById("pre").innerHTML="";return;}
if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();}
else  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }xmlhttp.onreadystatechange=function(){if (xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById("nomPro").innerHTML=xmlhttp.responseText;
  document.getElementById("pre").innerHTML=xmlhttp.responseText;}}

xmlhttp.open("GET","compras1.php?opcion=buscarNombre&criterio="+str,true);
xmlhttp.send();
}
function teclaEnter(e,valor){
	
	var keynum = window.event ? window.event.keyCode : e.which;
	//alert(keynum);
	if(keynum==13){ajax_nombre(valor);document.gm.cantidad.value=1;document.gm.cantidad.focus();}
}
function SoloNumeros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if(keynum==13){document.gm.precio.focus();}
if ((keynum == 8) || (keynum == 46))
return true;
return /\d/.test(String.fromCharCode(keynum));
}
function SoloNumeros1(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if(keynum==13){showUser("agregar",0);}
if ((keynum == 8) || (keynum == 46))
return true;
return /\d/.test(String.fromCharCode(keynum));
}
function verificar(){
	if(document.gm.proveedor.value==0 || document.gm.fecha.value=="")alert("Seleccione Proveedor y/o Fecha de Compra");
	else
		if(confirm("¿Desea Guardar?")){
			document.gm.bandera.value="Listo";
			document.gm.submit();	
		}
		
	}
</script>

</head>

<body>
<form name="gm" method="post" action="#" id="gm">
<input type="hidden" name="bandera"/>
  <center>

		<h2 align="center">Registrar Compras</h2>

</center>
  <table width="650" border="0" align="center">
    <tr>
      <td width="126" align="right" class="etiquetas">Proveedor:</td>
      <td width="327"><select name="proveedor" id="proveedor" class="form-control" style="width:200px">
        <option value="0">[Elija]</option>
       <?php
		include_once ("../../modelo/Conexion.php");
  		include_once ("../../modelo/DAO.php");
		$conexions=new Conexion();
		$conexion=$conexions->conectar();
		$DAO=new DAO();
		$datos=$DAO->mostrarAll($conexion,"select * from tproveedor order by nomprov");
  		if(empty($datos))echo "";
		else
			foreach($datos as $fila){
		?>	     
        
        <option value="<?php echo $fila[0]; ?>"><?php echo $fila[1]; ?></option>
        
		<?php
			}
			?>
      </select></td>
      <td width="62" align="right" class="etiquetas">Fecha:</td>
      <td width="102"><input name="fecha" type="date" class="form-control" id="fecha" value="<?php echo date("Y-m-d"); ?>" style="width:150px"></td>
      <td width="11"></td>
    </tr>
    <tr>
      <td align="center" class="etiquetas">Producto</td>
      <td align="center" class="etiquetas">Detalle</td>
      <td align="center" class="etiquetas">Cantidad</td>
      <td align="center" class="etiquetas">Precio Unitario</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input name="codPro" type="text" class="form-control" id="codPro" size="15"  list="listaProducto" onkeypress="teclaEnter(event,this.value);" style="width:150px">
      <datalist id="listaProducto">
		<?php
			include_once ("../../modelo/Conexion.php");
  		include_once ("../../modelo/DAO.php");
		$conexions=new Conexion();
		$conexion=$conexions->conectar();
		$DAO=new DAO();
		$datos=$DAO->mostrarAll($conexion,"select codigo from tproducto order by codigo");
  		if(empty($datos))echo "";
		else
			foreach($datos as $fila){
		?>	     
        
        <option value="<?php echo $fila[0]; ?>">
        
		
   		  <?php 
					}
			  	  ?>
			
	    </datalist>
      
      </td>
      <td class="etiqueta"><div id="nomPro"></div></td>
      <td align="center"><input name="cantidad" type="text"  class="form-control" id="cantidad" value="1" size="5" onkeypress="return SoloNumeros(event);" style="width:55px"></td>
      <td align="center"><input name="precio" type="text"  class="form-control" id="precio" size="5" onkeypress="return SoloNumeros1(event);"  style="width:75px"></td>
      <td><img src="../../img/windows-server-2016_w_450.png" width="25" height="25" onclick="showUser('agregar',0)"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <div id="mostrar"></div>
</form>
</body>
</html>
<?php
include "../../Controlador/ControlCompras.php";


?>