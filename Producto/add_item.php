<?php
session_start();
require('../config.php');

$category=$_POST['category'];
$name=$_POST['name'];
$quantity=$_POST['quantity'];
$purchase=$_POST['purchase'];
$retail=$_POST['retail'];
$supplier=$_POST['supplier'];

	$register="INSERT INTO products(category,name,quantity,purchase,retail,supplier) VALUES('$category','$name','$quantity','$purchase','$retail','$supplier')" or die("error".mysqli_errno($db_link));
	$result=mysqli_query($db_link,$register);
		header('location:products.php');

mysqli_close($db_link);
?>
