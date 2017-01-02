<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="../css/estiloM.css">
<script language="JavaScript">
		//Ajusta el tamaño de un iframe al de su contenido interior para evitar scroll
		var tamano1, otro=false, maximizado=false;
		function autofitIframe(id,tamano){
		tamano1 = tamano;
		if (!window.opera && document.all && document.getElementById){
		id.style.height=id.contentWindow.document.body.scrollHeight;
		} else if(document.getElementById) {
		id.style.height=tamano+"px";
		}
		}
</script>
<script language="javascript">
// buscamos el metodo para los tipos de navegadores
function launchFullScreen(element) {
  if(element.requestFullScreen) {
    element.requestFullScreen();
  } else if(element.mozRequestFullScreen) {
    element.mozRequestFullScreen();
  } else if(element.webkitRequestFullScreen) {
    element.webkitRequestFullScreen();
  }
  if(otro==false)
  	autofitIframe(document.getElementById('principal'),parseInt(screen.height)-110);
  else
  	autofitIframe(document.getElementById('principal'),parseInt(screen.height)-105);

   maximizado = true;
}
</script>

</head>

<body>
<div id="barraHorizontal">
 
</div>
<ul id="menu">
<li>
<div class="panel">
        <div class="front">
        <img width="80px" src="../Oficina de empleo.jpg" alt="Registros"/>
        <h3>Registros</h3>
        </div>
        <div class="back">
        <ul>
            <li><a href="Proveedor/RegistroProveedores.php" target="principal">Registro Empleado</a></li>
            <li><a href="Cliente/RegistroClientes.php" target="principal">Registro Clientes</a></li>
            <li>Registro Proveedores</li>
        </ul>
        </div>
</div>
</li>
<li>
<div class="panel">
        <div class="front">
        <img width="80px" src="../Red-informática.jpg" alt="Mantenimientos"/>
       <h3>Mantenimientos</h3>
        </div>
        <div class="back">
        <ul>
            <li><a href="Proveedor/RegistroProveedores.php" target="principal">Registro Empleado</a></li>
            <li><a href="Cliente/RegistroClientes.php" target="principal">Registro Clientes</a></li>
            <li><a href="Comprar/Compras.php" target="principal">Registro Proveedores</a></li>
        </ul>
        </div>
</div>
</li>
<li>
<div class="panel">
        <div class="front">
        <img width="80px" src="../Red-informática.jpg" alt="Mantenimientos"/>
       <h3>Compras</h3>
        </div>
        <div class="back">
        <ul>
            <li><a href="Proveedor/RegistroProveedores.php" target="principal">Registro Empleado</a></li>
            <li><a href="Cliente/RegistroClientes.php" target="principal">Registro Clientes</a></li>
            <li>Registro Proveedores</li>
        </ul>
        </div>
</div>
</li>
<li>
<div class="panel">
        <div class="front">
        <img width="80px" src="../Red-informática.jpg" alt="Mantenimientos"/>
       <h3>Ventas</h3>
        </div>
        <div class="back">
        <ul>
            <li><a href="Proveedor/RegistroProveedores.php" target="principal">Registro Empleado</a></li>
            <li><a href="Cliente/RegistroClientes.php" target="principal">Registro Clientes</a></li>
            <li>Registro Proveedores</li>
        </ul>
        </div>
</div>
</li>
</ul>
<div align="center">
<iframe id="principal" name="principal" src="slider.php" frameborder="0" onload="if (maximizado==false) autofitIframe(this,530); else autofitIframe(this,tamano1);" width="80%" height="90%"></iframe>
</div>
</body>
</html>