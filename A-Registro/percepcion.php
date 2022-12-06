<!DOCTYPE html>
<html>
<head>
	<title>REGISTRO DE CONTROL</title>
	<link rel="stylesheet" type="text/css" href="Css/tablas.css">
	<meta charset="utf-8">
</head>
<body>
	<div class="formulario">
		<form action="A-Registro/registro_percep.php" method="post">
			<center><h2>Registro de Percepciones</h2></center> 
<center>
		<table border="0" cellspacing="15">
			 <tr>
			 	<td><label for="cli">Cliente: </label></td><td><select class="Bcf" name="base" id="cli" >
				<?php 
					include 'config.php';
					$sql = "SELECT nom_cli FROM cliente order by nom_cli";
					$res = mysqli_query($db_link,$sql);
					while ($row = mysqli_fetch_array($res,MYSQL_ASSOC)) {
						 echo '<option value='.$row["nom_cli"].'>'.$row["nom_cli"].'</option>';

					} 
				?>
			</select></td>
			 </tr>
			 <tr>
			 	<td><label for="fac">N Factura</label></td><td><input class="Bcf" type="text" name="fac" id="fac" value=""></td>
			 </tr>
			 <tr>
			 	<td><label for="fec">Fecha</label></td><td><input type="date" class="Bcf"  name="fec" id="fec" value=""></td>
			 </tr>
			 <tr>
			 	<td><label for="per">Percepcion</label></td><td><input type="text" class="Bcf" name="per" id="per" value=""></td>
			 </tr>
			 <tr>
			 	<td><label for="liq">Liquidacion</label></td><td><input type="date" class="Bcf" name="liq" id="liq" value=""></td>
			 </tr>
			 <tr>
			 	<td><label for="vou">Voucher</label></td><td><input type="text" class="Bcf" name="vou" id="vou" value=""></td>
			 </tr>
             <tr>
             	<td colspan="3"><input type="submit" class="BtnRf"  name="btn1" value="Insertar"  Onclick="confirm('Son correctos los datos?');"></td>
             </tr>
		</table>

			</center>
		</form>
	</div>
</body>
</html>