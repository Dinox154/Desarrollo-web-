<!DOCTYPE >
<head>
<meta charset="utf-8">
<title>Editar Producto</title>
</head>
<link rel="stylesheet" type="text/css" href="../Css/estilos.css">
<body>
<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:../login.php');
	}
?>
<div id="popup-box2" class="popup-position1">
<div id="popup-wrapper1">
<div id="popup-container1">
    <div id="popup-head-color1">
    <br>
    <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Editar Producto </p>
    </div>
<?php
include '../config.php';

$id = $_GET['id'];
$view = "SELECT * from products where md5(id) = '$id'";
$result = $db_link->query($view);
$row = $result->fetch_assoc();

if(isset($_POST['update'])){

	$ID = $_GET['id'];

	$category = $_POST['category'];
	$name = $_POST['name'];
	$quantity = $_POST['quantity'];
	$purchase = $_POST['purchase'];
	$retail = $_POST['retail'];
	$supplier = $_POST['supplier'];

	$insert = "UPDATE products set category = '$category', name = '$name', quantity = '$quantity', purchase = '$purchase', retail = '$retail', supplier = '$supplier' where md5(id) = '$ID'";
	
	if($db_link->query($insert)== TRUE){

			echo "Sucessfully update data";
			header('location:products.php');			
	}else{

		echo "Ooppss cannot add data" . $conn->error;
		header('location:products.php');
	}
	
	$db_link->close();
}

?>
   
    <br>
    <form action="" method="POST">
    <table border="0" align="center">    
    <tr>
    <td align="right">Categoria:</td>
    <td>
    <select name="category" id="txtbox">
    <option> <?php echo $row['category']; ?> </option>
    </select>
    </td>
    </tr>
    
    <tr>
    <td align="right">Nombre:</td>
    <td><input type="text" id="txtbox" name="name" placeholder="Nombre" value="<?php echo $row['name'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Cantidad:</td>
    <td><input type="text" id="txtbox" name="quantity" placeholder="Cantidad" value="<?php echo $row['quantity'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Precio de Compra:</td>
    <td><input type="text" id="txtbox" name="purchase" placeholder="Precio de Compra" value="<?php echo $row['purchase'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Precio Venta:</td>
    <td><input type="text" id="txtbox" name="retail" placeholder="Precio Venta" value="<?php echo $row['retail'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Proveedor:</td>
    <td>
    <select name="supplier" id="txtbox">
    
           <?php
require('../config.php');
$query="SELECT suppliername FROM supplier";
$result1=mysqli_query($db_link, $query);
while ($row1=mysqli_fetch_array($result1)){?>
	<option><?php echo $row1['suppliername']; ?></option>
       <?php
}?>
    
	</select>
	</td>
    </tr>
    
    <br>
    <tr  align="center">
    <td>&nbsp;  </td>
    <td>
    <br>
    <input type="SUBMIT" name="update" id="btnnav" value="Actualizar"></form>
    <a href="products.php"><input type="button" style="border:1px solid #900; background:#900; height:40px; width:105px; border-radius:3px; color:#FFF;" value="Cancelar"></a>
    
    </td>
    </tr>  
    </table>

</body>
</html>
