<?php 
$username="root";   
$password="";
$host="localhost";
$database="pruebabd";
$db_link=mysqli_connect($host,$username,$password,$database)or die("ERROR".mysqli_error($db_link));
if (mysqli_connect_error()){
	echo "No se puede conectar , por favor vuelva a intentarlo";
	exit();
}
?>
