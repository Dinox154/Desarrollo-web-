<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
        <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="border:1px solid #999; color:#033;">
     <tr>
     <th colspan="6" align="center" height="55px" style="border-bottom:1px solid #033; background: #999; color:#FFF;"><h2>Información del Cliente<h2></th>
    </tr>
      <tr height="30px">
        <th style="border-bottom:1px solid #333;"> Codigo </th>
        <th style="border-bottom:1px solid #333;"> Cliente </th>
        <th style="border-bottom:1px solid #333;"> Base </th>
        <th style="border-bottom:1px solid #333;"> Acción </th>
      </tr> 
       <?php

$query="SELECT * FROM cliente";
$result=mysqli_query($db_link, $query);
while ($row=mysqli_fetch_array($result)){?>
      <tr align="center" style="height:25px">
        <td style="border-bottom:1px solid #333;"> <?php echo $row['cod_cli']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['nom_cli']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['cod_base']; ?> </td>
        <td style="border-bottom:1px solid #333;">    
        <a href="A-Cliente/eliminar_cliente.php?id=<?php echo md5($row['cod_cli']);?>"><input type="button" value="Eliminar" style="width:85px; height:20; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"></a>
         <a href="A-Cliente/editar_cliente.php?id=<?php echo md5($row['cod_cli']);?>">
        <input type="button" value="Editar" style="width:70px; height:20px; color:#FFF; background:#069; border:1px solid #069; border-radius:3px;"> 
        </td>
      </tr>
   <?php
}?>
    </table>  
  </td>
  </tr>
  </table>
</body>
</html>