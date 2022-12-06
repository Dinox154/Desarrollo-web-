<!DOCTYPE >
<html >
<head>
  <meta charset="utf-8">
<title>Ventas</title>
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
                   <li><a href="sales.php">Ventas</a></li>
                   <li><a href="../Producto/products.php">Productos</a></li>
                   <li><a href="../Cliente/customers.php">Clientes</a></li>
                   <li><a href="../Proveedor/supplier.php">Proveedor</a></li> 
               </ul>
           </nav>
       </header>

</div>
<br>
<br><br>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">   
      <tr>
        <td height="37" align="right">
        <form action="result_sales.php" method="get" ecntype="multipart/data-form">
        <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Buscar Producto..." />&nbsp;<input type="submit" id="btnsearch" value="Buscar" name="search" />
        </form>
     	</td>
      </tr>
    </table></th>
  </tr>
  <br>
  <tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #033; color:#033;">
     <tr>
     <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #030; background: #030; color:#FFF;"><H3>CATEGORÍA DE BALONES</H3></th>
    </tr>
      <tr height="30px">
        <th style="border-bottom:1px solid #333;"> CategorÍa </th>
        <th style="border-bottom:1px solid #333;"> Nombre </th>
        <th style="border-bottom:1px solid #333;"> Precio </th>
        <th style="border-bottom:1px solid #333;"> Cantidad Stock </th>
        <th style="border-bottom:1px solid #333;"> Proveedor </th>
        <th style="border-bottom:1px solid #333;"> PedidoS </th>
      </tr>   
       <?php
require('../config.php');
$query="SELECT * FROM products";
$result=mysqli_query($db_link, $query);
while ($row=mysqli_fetch_array($result)){?>
      <tr align="center" style="height:35px">
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['category']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['name']; ?> </td>
        <td style="border-bottom:1px solid #333;">$ <?php echo $row['retail']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['quantity']; ?> pcs. </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['supplier']; ?> </td>
        <td style="border-bottom:1px solid #333;">
    
        <a href="process_sales.php?id=<?php echo md5($row['id']);?>"><input type="button" value="Pedir" style="width:90px; height:30px; color:#FFF; background: #930; border:1px solid #930; border-radius:3px;"></a>  
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
<table border="0" cellpadding="15px" align="center"; style="font-family: 'Courier New'; color: #FFF; font-size: 14px;">
<tr>
	<td>
  <p class="Foo"> &copy; 2022.  | By Diego</p>	
    </td>
</tr>
</table>
</div>
</div>
</body>
</html>
