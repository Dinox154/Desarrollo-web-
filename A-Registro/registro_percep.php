<?php 
include ('../config.php');
   header('Location:../index.php#popup');
if (isset($_POST['btn1'])) {
	$dato=$_POST['btn1'];
	$nom_cli = $_POST['base'];
	$factura = $_POST['fac'];
	$fecha = $_POST['fec'];
	$percepcion = $_POST['per'];
	$liquidacion = $_POST['liq'];
	$voucher = $_POST['vou'];

	$sql = "SELECT cod_cli FROM cliente  WHERE nom_cli='$nom_cli'";
	$res = mysqli_query($db_link,$sql);
	while ($row = mysqli_fetch_array($res,MYSQL_ASSOC)) {
		$cod =$row['cod_cli'];
	}

	if ($dato=='Insertar') {
		if (isset($factura) && !empty($factura) && isset($percepcion) && !empty($percepcion) && isset($voucher) && !empty($voucher) && isset($liquidacion) && !empty($liquidacion) && isset($fecha) && !empty($fecha)) {
			$sql="INSERT INTO movimiento(factura,fecha,percepcion,liquidacion,voucher,cod_cli) VALUES ($factura,'$fecha',$percepcion,'$liquidacion',$voucher,$cod)";
			$res =mysqli_query($db_link,$sql);
			if ($res) {
				echo "<script>alert('Registro Insertado');</script>";
			}
	}

}
}
?>