<?php session_start(); 
$opcion=$_GET["opcion"];

if($opcion=="agregar"){
	
	$producto=$_GET["producto"];
	$cantidad=$_GET["cantidad"];
	$precio=$_GET["precio"];
	
		$acumulador=$_SESSION['acumulador'];
		$matriz=$_SESSION['matriz'];
		$acumulador++;	
		$matriz[$acumulador][0]=$producto;
		$matriz[$acumulador][1]=$cantidad;
		$matriz[$acumulador][2]=$precio;		
		
		$_SESSION['acumulador']=$acumulador;
		$_SESSION['matriz']=$matriz;
		
		impresion();
}

if($opcion=="quitar"){
		$id=$_GET["id"];
		$matriz=$_SESSION['matriz'];
		unset($matriz[$id]);//eliminacion de un indice en la matriz

		$_SESSION['matriz']=$matriz;
		impresion();
		
}
function impresion(){
?>
<table width="650" border="1" align="center" rules="all">
  <tr>
    <td width="126" align="center" class="etiqueta">Producto</td>
    <td width="327" align="center" class="etiqueta">Detalle</td>
    <td width="62" align="center" class="etiqueta">Cantidad</td>
    <td width="50" align="center" class="etiqueta">Precio Unitario</td>
    <td width="50" align="center" class="etiqueta">Sub-Total</td>
    <td width="11">&nbsp;</td>
  </tr>
  <?php
	$acumulador=$_SESSION['acumulador'];
	$matriz=$_SESSION['matriz'];
   	for($i=1;$i<=$acumulador;$i++){
   		if (array_key_exists($i, $matriz)) {//verifica si existe el indice en la matriz
  ?>  
  <tr class="etiqueta">
    <td align="center"><?php echo $matriz[$i][0]; ?></td>
    <td  align="left"><?php
	
	include_once ("../../modelo/Conexion.php");
  		include_once ("../../modelo/DAO.php");
		$conexions=new Conexion();
		$conexion=$conexions->conectar();
		$DAO=new DAO();
		
		$prod=$matriz[$i][0];
		
		$datos=$DAO->mostrarAll($conexion,"select * from tproducto where codigo='$prod' order by detalle");
  		if(empty($datos))echo "No Existe";
		else
			foreach($datos as $fila){
				echo $fila[1];
			}
    
  ?>
    
    </td>
    <td align="right"><?php echo $matriz[$i][1]; ?></td>
    <td align="right"><?php echo "$".$matriz[$i][2]; ?></td>
    <td align="right"><?php echo "$".number_format($matriz[$i][1]*$matriz[$i][2],2); ?></td>
    <td><img src="../img/trash.PNG" width="30" height="30" title="Quitar <?php echo $matriz[$i][0]."-".$i ?>" onclick="showUser('quitar','<?php echo $i ?>');"/></td>
  </tr>
    
   <?php 
	$total+=$matriz[$i][1] * $matriz[$i][2];
	}
	}?>
    <tr class="etiqueta">
    <td align="center">&nbsp;</td>
    <td  align="left">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right" class="ui-state-hover"><?php echo "$".number_format($total,2); ?></td>
    <td>&nbsp;</td>
  </tr>
    <tr class="etiqueta">
      <td colspan="6" align="center"><input name="button" type="button" id="button" onClick="verificar()" value="Guardar" style="cursor:pointer" class="css_button">
      <input name="cancelar" type="button"  class="css_button" id="cancelar" onClick="location.href='compra.php';" value="Cancelar" style="cursor:pointer"></td>
    </tr>
</table>
<?php } ?>
