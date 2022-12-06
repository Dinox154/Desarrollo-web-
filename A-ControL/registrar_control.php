<?php 
include ('../config.php');

if (isset($_POST['btn1'])) {
	$dato=$_POST['btn1'];
	$nom_cli = $_POST['cli'];
	$factura = $_POST['fac'];
	$fecha = $_POST['fec'];
	$percepcion = $_POST['per'];
	$liquidacion = $_POST['liq'];
	$voucher = $_POST['vou'];

$sql = "SELECT cod_cli FROM cliente  WHERE nom_cli='$nom_cli'";
	$res = mysqli_query($conexion,$sql);
	while ($row = mysqli_fetch_array($res)) {
		$nom_clie =$row['cod_cli'];
 }

	if ($dato=='Insertar1') {
		if (isset($factura) && !empty($factura) && isset($percepcion) && !empty($percepcion) && isset($voucher) && !empty($voucher) && isset($liquidacion) && !empty($liquidacion) && isset($fecha) && !empty($fecha)) {
			$sql="INSERT INTO movimiento(factura,fecha,percepcion,liquidacion,voucher,cod_cli) VALUES ($factura,'$fecha',$percepcion,'$liquidacion',$voucher,$nom_clie)";
			$res =mysqli_query($conexion,$sql);
			if ($res) {
				echo "<script>alert('Registro Insertado');</script>";
			}
	}
}
  }

?>
