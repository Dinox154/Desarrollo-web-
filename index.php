<!DOCTYPE >
<html >
<head>
<meta charset="utf-8">
<title>Sistema Punto de Venta</title>
</head>
<link rel="stylesheet" type="text/css" href="Css/estilos.css">
<body>
<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
	}
?>
<?php
if($_SESSION['access']=='Salesperson'){
	header('location:Ventas/sales1.php');
	}
?>
<div id="container">
<div id="header">
  <p class="Pl">Control de Ventas</p>
	<a href="logout.php"><input type="button" id="btnadd" value="Cerrar Sesión" align="middle" src="" /></a>

</div>
<br><br><br><br><br>
      <header>
         <nav class="Menu">
                <ul>
                   <li><a href="index.php">Inicio</a></li>
                   <li><a href="Ventas/sales.php">Ventas</a></li>
                   <li><a href="Producto/products.php">Productos</a></li>
                   <li><a href="Cliente/customers.php">Clientes</a></li>
                   <li><a href="Proveedor/supplier.php">Proveedor</a></li>
               </ul>
           </nav>
       </header>
<div id="bdcontainer">
<table border="0" cellspacing="14" align="center">
    	  <td><a href="Ventas/sales.php"><input type="button" id="bdnav1"></a></td>
        <td><a href="Producto/products.php"><input type="button" id="bdnav2"></a></td>
        <td><a href="Cliente/customers.php"><input type="button" id="bdnav3"></a></td>
    <tr>
    	<td><a href="Proveedor/supplier.php"><input type="button" id="bdnav4"></a></td>
        <td><a href="logout.php"><input type="button" id="bdnav6"></a></td>
    </tr>
</table>
</div>
<div id="footer">
   <p class="Foo"> &copy; 2022.  | By Diego</p>
</div>
</div>
</body>
</html>
