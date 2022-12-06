<!DOCTYPE >
<html >
<head>
<meta charset="utf-8">
<title>Editar Proveedor</title>
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
    <div id="popup-head-color2">
    <br>
    <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Editar Proveedor </p>
    </div>

<?php
include '../config.php';
$id = $_GET['id'];
$view = "SELECT * from supplier where md5(id) = '$id'";
$result = $db_link->query($view);
$row = $result->fetch_assoc();

if(isset($_POST['update'])){

	$ID = $_GET['id'];

	$suppliername = $_POST['suppliername'];
	$contactperson = $_POST['contactperson'];
	$address = $_POST['address'];
	$contactno = $_POST['contactno'];
	$note = $_POST['note'];

	$insert = "UPDATE supplier set suppliername = '$suppliername', contactperson = '$contactperson', address = '$address', contactno = '$contactno', note = '$note' where md5(id) = '$ID'";
	
	if($db_link->query($insert)== TRUE){

			echo "Sucessfully update data";
			header('location:supplier.php');			
	}else{

		echo "Ooppss cannot add data" . $conn->error;
		header('location:supplier.php');
	}
	
	$db_link->close();
}

?>
   
    <br>
    <form action="" method="POST">
    <table border="0" align="center">
    
    <tr>
    <td align="right">Nombre Proveedor:</td>
    <td><input type="text" id="txtbox" name="suppliername" placeholder="Proveedor" value="<?php echo $row['suppliername'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Persona de contacto:</td>
    <td><input type="text" id="txtbox" name="contactperson" placeholder="Contacto" value="<?php echo $row['contactperson'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Dirección:</td>
    <td><input type="text" id="txtbox" name="address" placeholder="Direccion" value="<?php echo $row['address'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Numero Telefonico:</td>
    <td><input type="text" id="txtbox" name="contactno" maxlength="11" placeholder="Telefono" value="<?php echo $row['contactno'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Notas:</td>
    <td><input type="text" id="txtbox" name="note" placeholder="Notas" value="<?php echo $row['note'];?>" required><br></td>
    </tr>    
    <br>
    <tr align="center">
    <td>&nbsp;  </td>
    <td>
    <br>
    <input type="SUBMIT" name="update" id="btnnav" value="Actualizar"></form>
    <a href="supplier.php"><input type="button" style="border:1px solid #900; background:#900; height:40px; width:105px; border-radius:3px; color:#FFF;" value="Cancelar"></a>
    
    </td>
    </tr>
    
    </table>

</body>
</html>
