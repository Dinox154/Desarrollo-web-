<?php
	include '../config.php';
	$id = $_GET['id'];
	$sql = "Delete from cliente where md5(cod_cli) = '$id'";
	if($db_link->query($sql) === true){
		echo "Sucessfully deleted data";
		 header('Location:../index.php#popup2');
	}else{
		echo "No se puede eliminar, por favor vuelva a intentar ";
	}
	$db_link->close();
?>