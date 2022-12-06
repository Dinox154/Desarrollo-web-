<!DOCTYPE >
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
<p class="Pl">Control de Percepciones</p>
  <a href="../logout.php"><input type="button" id="btnadd" value="Cerrar Sesión" align="middle" src="" /></a>
</div>
<br><br><br><br><br>
   <header>
         <nav class="Menu">
                <ul>
                   <li><a href="../index.php">Inicio</a></li>
                   <li><a href="control.php">Control </a></li>
                   <li><a href="customers.php">Registro</a></li>
               </ul>
           </nav>
       </header>
</div>
<br><br>
</div>
<br>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0"> 
      <tr>
        <td width="750" align="right">
        <form action="result_customer.php" method="get" ecntype="multipart/data-form">
        <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Buscar Cliente..." /><input type="submit" id="btnsearch" value="Buscar" name="search" />
        </form>
        </td>
    </table></th>
  </tr>
  
  <br>
  
  <tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #999; color:#033;">
    
<tr><th colspan="7" align="center" height="55px" style="border-bottom:1px solid #033; background: #999; color:#FFF;"> Bases - Clientes</th></tr>
    
      <tr height="30px">
    
        <th style="border-bottom:1px solid #333;"> Cliente </th>
        <th style="border-bottom:1px solid #333;"> factura</th>
        <th style="border-bottom:1px solid #333;"> fecha </th>
        <th style="border-bottom:1px solid #333;"> percepcion </th>
        <th style="border-bottom:1px solid #333;"> liquidacion</th>
        <th style="border-bottom:1px solid #333;"> voucher</th>
      </tr>
					<?php
					include '../config.php';
					
					if(isset($_GET['search'])){
						$query = $_GET['query'];
						$sql = "SELECT * FROM movimiento, bases , cliente where  bases.cod_base = cliente.cod_base  and cliente.cod_cli = movimiento.cod_cli";
						$result = $db_link->query($sql);
						if($result->num_rows > 0){
              while($row1 = $result->fetch_array()){?>
						<tr align="center" style="height:25px">
              
                <td style="border-bottom:1px solid #333;"> <?php echo $row1['nom_cli']; ?> </td>
                <td style="border-bottom:1px solid #333;"> <?php echo $row1['factura']; ?> </td>
                <td style="border-bottom:1px solid #333;"> <?php echo $row1['fecha']; ?> </td>
                <td style="border-bottom:1px solid #333;"> <?php echo $row1['percepcion']; ?> </td>
                <td style="border-bottom:1px solid #333;"> <?php echo $row1['liquidacion']; ?> </td>
                <td style="border-bottom:1px solid #333;"> <?php echo $row1['voucher']; ?> </td>
                <td style="border-bottom:1px solid #333;">    <a href="delete_customer.php?id=<?php echo md5($row1['cod_cli']);?>"><input type="button" value="Eliminar" style="width:15; height:20; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"></a></td>
          </tr>
						<?php
					
							}

						}
					}else{
            echo "<center>No records</center>";
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