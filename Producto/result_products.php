<!DOCTYPE>
<html >
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
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
</div>
<br><br><br><br><br>
<!-- Footer -->
 <header>
         <nav class="Menu">
                <ul>
                   <li><a href="products.php">REGRESAR</a></li>
               </ul>
           </nav>
       </header>
<br><br><br><br>

    <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #033; color:#033;"> 
     <tr>
     <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #033; background: #033; color:#FFF;"> Selección de Balón</th>
    </tr>   
      <tr height="30px">
        <th style="border-bottom:1px solid #333;"> Categoria </th>
        <th style="border-bottom:1px solid #333;"> Nombre </th>
        <th style="border-bottom:1px solid #333;"> Cantidad Stock </th>
        <th style="border-bottom:1px solid #333;"> Precio de Compra </th>
        <th style="border-bottom:1px solid #333;"> Precio Venta </th>
        <th style="border-bottom:1px solid #333;"> Proveedor </th>
      </tr>
					<?php
					include '../config.php';
					
					if(isset($_GET['search'])){
						$query = $_GET['query'];

						$sql = "select * from products where category like '%$query%' or name like '%$query%'";

						$result = $db_link->query($sql);
						if($result->num_rows > 0){
							while($row1 = $result->fetch_array()){
		
						?>
						<tr align="center" style="height:25px">
      	<td style="border-bottom:1px solid #333;"> <?php echo $row1['category']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row1['name']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row1['quantity']; ?> pcs. </td>
        <td style="border-bottom:1px solid #333;">$ <?php echo $row1['purchase']; ?> </td>
        <td style="border-bottom:1px solid #333;">$ <?php echo $row1['retail']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row1['supplier']; ?> </td>
    
      </tr>
						<?php
					
							}

						}else{
							echo "<center>No records</center>";
						}
					}
				$db_link->close();
				?>
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
</body>
</html>