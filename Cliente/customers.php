<!DOCTYPE>
<head>
<meta charset="utf-8">
<title>Clientes</title>
</head>
<link rel="stylesheet" type="text/css" href="../Css/estilos.css">
<script>
	function toggle_visibility(id){
		var e = document.getElementById(id);
		if(e.style.display=='block')
			e.style.display = 'none';
		else
			e.style.display = 'block';
		}
</script>
<body>
<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:../login.php');
	}
?>
<div id="container">
<div id="header">
<p class="Pl">Control de Ventas</p>
  <a href="../logout.php"><input type="button" id="btnadd" value="Cerrar Sesión" align="middle" src="" /></a>
</div>
<br><br><br><br><br>
   <header>
         <nav class="Menu">
                <ul>
                   <li><a href="../index.php">Inicio</a></li>
                   <li><a href="../Ventas/sales.php">Ventas</a></li>
                   <li><a href="../Producto/products.php">Productos</a></li>
                   <li><a href="customers.php">Clientes</a></li>  
                   <li><a href="../Proveedor/supplier.php">Proveedor</a></li>
               </ul>
           </nav>
       </header>
</div>
<br><br><br><br>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="750" align="right">
        <form action="result_customer.php" method="get" ecntype="multipart/data-form">
        <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Buscar Clientes..." /><input type="submit" id="btnsearch" value="Buscar" name="search" />
        </form>
        </td> 
        <td width="127" height="37" align="right">
        <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')"><input type="button" style=" margin:0 5 5 5 ; border:1px solid #474; background: #474; height:45px; width:135px; color:#FFF; border-radius:3px; font-family: sans-serif;" value="+ Registrar" /></a></td>
        <a href="reporte_clientes.php"><input type="button" id="btnadd" value="Imprimir" style=" margin:0 5 5 5 ; border:1px solid #474; background: #474; height:45px; width:135px; color:#FFF; border-radius:3px; font-family: sans-serif;" /></a>
      </tr>
    </table></th>
  </tr>
  <br> 
  <tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #999; color:#033;">
    
     <tr>
     <th colspan="6" align="center" height="55px" style="border-bottom:1px solid #033; background: #999; color:#FFF;"> Información del Cliente</th>
    </tr>
      <tr height="30px">
        <th style="border-bottom:1px solid #333;"> Nombre </th>
        <th style="border-bottom:1px solid #333;"> Contacto </th>
        <th style="border-bottom:1px solid #333;"> Dirección </th>
        <th style="border-bottom:1px solid #333;"> Notas </th>
        <th style="border-bottom:1px solid #333;"> Acción </th>
      </tr> 
       <?php
require('../config.php');
$query="SELECT * FROM customers";
$result=mysqli_query($db_link, $query);
while ($row=mysqli_fetch_array($result)){?>
      <tr align="center" style="height:25px">
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['name']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['contact']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['address']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['note']; ?> </td>
        <td style="border-bottom:1px solid #333;">    
<a href="delete_customer.php?id=<?php echo md5($row['id']);?>"><input type="button" value="Eliminar" style="width:85px; height:20; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"></a>
        </td>
      </tr>
   <?php
}?>
    </table>  
  </td>
  </tr>
</table>
<br><br><br>
<div id="bdcontainer"></div>
<div id="footer">
<table border="0" cellpadding="15px" align="center"; style="size: 12px; font-family: 'Courier New', Courier, monospace; color: #FFF; font-size: 12px;">
<tr>
	<td>
  <p class="Foo"> &copy; 2022.  | By Diego</p>
    </td>
</tr>
</table>
</div>
</div>
<div id="popup-box1" class="popup-position">
<div id="popup-wrapper">
<div id="popup-container">
    <div id="popup-head-color4">
    <p style="text-align:right; font-family: 'Courier New';font-size:15px;"><a href= "javascript:void(0)" onclick="toggle_visibility('popup-box1')"><font color="#FFF"> X </font></a></p>
    <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Formulario Agregar Cliente </p>
    </div>
    <br>
    <form action="add_customer.php" method="POST">
    <table border="0" align="center">
    <tr>
    <td align="right">Nombre:</td>
    <td><input type="text" id="txtbox" name="name" placeholder="Nombre Cliente" required><br></td>
    </tr>
    <tr>
    <td align="right">Contacto:</td>
    <td><input type="text" id="txtbox" name="contact" maxlength="11" placeholder="Contacto" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Direccion:</td>
    <td><input type="text" id="txtbox" name="address" placeholder="Direccion" required><br></td>
    </tr>
    <tr>
    <td align="right">Notas:</td>
    <td><input type="text" id="txtbox" name="note" placeholder="Notas" required><br></td>
    </tr>

    <br>
    <tr  align="left">
    <td>&nbsp;  </td>
    <td><input type="SUBMIT" id="btnnav" value="Enviar"></a></td>
    </tr>
    
    </table>
    </form>
</div>
</div>
</div>
</body>
</html>
