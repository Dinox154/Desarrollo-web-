<!DOCTYPE>
<html >
<head>
<meta charset="utf-8">
<title>Productos</title>
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
                   <li><a href="products.php">Productos</a></li>
                   <li><a href="../Cliente/customers.php">Clientes</a></li>
                   <li><a href="../Proveedor/supplier.php">Proveedor</a></li>
               </ul>
           </nav>
       </header>
</div>
<br><br><br><br><br>
<table width="83%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="741" align="right">
        <form action="result_products.php" method="get" ecntype="multipart/data-form">
          <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Buscar Producto..." /><input type="submit" id="btnsearch" value="Buscar" name="search" />
        </form>
        </td>
        <td width="115px" height="30">
        <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')"><input type="button" id="btnadd" value="+ Agregar" style="margin: 0 5 5 5; float: right; "/></a>
        <a href="pedido_productos.php"><input type="button" id="btnadd" value="Imprimir" style="margin: 0 5 5 5; float: right; "/></a>
        </td>
      </tr>
    </table></th>
  </tr>
  <br> 
  <tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="85%" style="border:1px solid #033; color:#033;">  
     <tr>
     <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #033; background: #033; color:#FFF;">INFORMACIÓN DE PRODUCTOS</th>
    </tr>
      <tr height="30px">
        <th style="border-bottom:1px solid #333;"> Categoría </th>
        <th style="border-bottom:1px solid #333;"> Nombre </th>
        <th style="border-bottom:1px solid #333;"> Stock </th>
        <th style="border-bottom:1px solid #333;"> Precio de Compra </th>
        <th style="border-bottom:1px solid #333;"> Precio Venta </th>
        <th style="border-bottom:1px solid #333;"> Proveedor </th>
        <th style="border-bottom:1px solid #333;"> Acción </th>
      </tr>
       <?php
require('../config.php');
$query="SELECT * FROM products";
$result=mysqli_query($db_link, $query);
while ($row=mysqli_fetch_array($result)){?>
      <tr align="center" style="height:25px">
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['category']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['name']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['quantity']; ?> pcs. </td>
        <td style="border-bottom:1px solid #333;">$ <?php echo $row['purchase']; ?> </td>
        <td style="border-bottom:1px solid #333;">$ <?php echo $row['retail']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['supplier']; ?> </td>
        <td style="border-bottom:1px solid #333;">
        
        <a href="edit_item.php?id=<?php echo md5($row['id']);?>">
        <input type="button" value="Editar" style="width:70px; height:20px; color:#FFF; background:#069; border:1px solid #069; border-radius:3px;"> </a><a href="delete_item.php?id=<?php echo md5($row['id']);?>"><input type="button" value="Eliminar" style="width:90px; height:20; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"></a>

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
    <div id="popup-head-color1">
    <p style="text-align:right !important; font-family: 'Courier New', Courier, monospace;font-size:15px;"><a href= "javascript:void(0)" onclick="toggle_visibility('popup-box1')"><font color="#FFF"> X </font></a></p>
    <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Add Item Form </p>
    </div>
    <br>
    <form action="add_item.php" method="POST">
    <table border="0" align="center">
    
    <tr>
    <td align="right">Categoria:</td>
    <td>
    <select name="category" id="txtbox">
    <option>Balon x 10 </option>
    <option>Balon x 15  </option>
    <option>Balon x 45  </option>
    </select>
    </td>
    </tr>
    
    <tr>
    <td align="right">Nombre:</td>
    <td><input type="text" id="txtbox" name="name" placeholder="Nombre" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Cantidad:</td>
    <td><input type="text" id="txtbox" min="1" name="quantity" maxlength="11" placeholder="Cantidad" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Precio de Compra:</td>
    <td><input type="text" id="txtbox" name="purchase" maxlength="11" placeholder="Precio de compra" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Precio de Venta:</td>
    <td><input type="text" id="txtbox" name="retail" maxlength="11" placeholder="Precio de venta" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Proveedor:</td>
    <td>
    <select name="supplier" id="txtbox">
    <?php
	$query="SELECT * FROM supplier";
	$result=mysqli_query($db_link, $query);
	while ($row=mysqli_fetch_array($result)){?>

	<option><?php echo $row['suppliername']; ?></option>		
	<?php
}?>
	</select>
</td>
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
