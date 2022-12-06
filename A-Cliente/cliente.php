<!DOCTYPE>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="Css/tablas.css">
<title>Clientes</title>
</head>
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
  

 <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')"><input class="btnR" type="button" value="+ Registrar" /></a>

   <?php  include("mostrar_cliente.php"); ?>

<div id="popup-box1" class="popup-position">
<div id="popup-wrapper">
<div id="popup-container">
    <div id="popup-head-color4">
   <div class="formulario">
        <p style="text-align:right; font-family: 'Courier New';font-size:15px;"><a href= "javascript:void(0)" onclick="toggle_visibility('popup-box1')"><font color="#FFF"> X </font></a></p>
         <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:25px;"> Registro de Cliente </p>
    <br>
  <div class="formulario">
    <form action="A-Cliente/registrar_cliente.php" method="post">
         <center><table border="0" cellspacing="30">
            <tr>
              <td><label>Base:</label></td>
              <td><select name="base" class="Bcf">
        <?php 
          $sql = "SELECT nom_base FROM bases order by nom_base";
          $res = mysqli_query($db_link,$sql);
          while ($row = mysqli_fetch_array($res)) {
             echo '<option value='.$row["nom_base"].'>'.$row["nom_base"].'</option>';
          }
        ?>
      </select></td>
            </tr>
           <tr>
              <td><label>Cliente</label></td>
              <td><input class="Bcf" type="text" name="cli" id="cli" ></td>
            </tr>
          </table></center>

      <input class="BtnRf" type="submit" name="btn1" value="Insertar">
    </form>
  </div>

  </div>
</div>
</div>
</div>
</body>
</html>
