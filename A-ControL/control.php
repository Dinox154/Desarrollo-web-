<!DOCTYPE>
<head>
<meta charset="utf-8">
<title>Clientes</title>
</head>
<link rel="stylesheet" type="text/css" href="./Css/tablas.css">
        <form action="" method="get" >
          <center><h2>Control de Percepciones</h2></center> <br>
         <label>Base:</label>
        <select type="text" name="search0" style="border:1px solid #CCC; color: #333; width:210px; height:30px;">
        <option></option><?php 
          include 'config.php';
          $sql = "SELECT nom_base,cod_base FROM bases";
          $res = mysqli_query($db_link,$sql);
          while ($row = mysqli_fetch_array($res)) {
            echo '<option value='.$row["cod_base"].'>'.$row["nom_base"].'</option>';}?></select>
        <label>Cliente:</label>
        <select type="text" name="search" style="border:1px solid #CCC; color: #333; width:210px; height:30px;">
        <option></option><?php 
          include 'config.php';
          $sql = "SELECT nom_cli,cod_cli FROM cliente";
          $res = mysqli_query($db_link,$sql);
          while ($row = mysqli_fetch_array($res)) {
            echo '<option value='.$row["cod_cli"].'>'.$row["nom_cli"].'</option>';}?></select>
        <input style=" margin:0 5 5 5 ; border:1px solid #474; background: #474; height:45px; width:135px; color:#FFF; border-radius:3px; font-family: sans-serif;" type="submit" id="btnsearch" value="Buscar" name="submit" />
        </form  >
<?php
if (isset($_REQUEST['submit'])) {
  $search=$_GET['search'];
  $terms=explode(" ", $search); 
  $query = "SELECT * FROM movimiento, bases , cliente where  bases.cod_base = cliente.cod_base  and cliente.cod_cli = movimiento.cod_cli and ";
  $i=0;
  foreach($terms as $each){
      $i++;
      if($i==1){
        $query .= "movimiento.cod_cli LIKE ".$each."";
      }else{  
        $query .= "OR movimiento.cod_cli LIKE ".$each."";
      }
    }
    $x=mysqli_connect("localhost","root","","percepciones") or die ("no se ha podido conectar...");
    $queryplus = mysqli_query($x,$query);
 $numero = mysqli_num_rows($queryplus); ?>
 <center>
   <table border="0" cellpadding="0" cellspacing="0" align="center" width="78.5%" style="border:1px solid #999; color:#033;">
     <tr>
     <th colspan="8" align="center" height="55px" style="border-bottom:1px solid #033; background: #999; color:#FFF;"><h2>Movimientos<h2></th>
    </tr>
<tr height="30px">
        <th width="8.5%"> Base </th>
        <th width="8.5%"> Cliente </th>
        <th width="8.5%"> Factura </th>
        <th width="8.5%"> Fecha </th>
        <th width="8.5%"> Percepción </th>
        <th width="8.5%"> Fecha Liquidación</th>
        <th width="8.5%"> Voucher </th>
        <th width="8.5%"> Accion </th>
      </tr>
<?php
if($numero > 0 && $search!=""){
    if ($queryplus) {
    echo "$numero resultado(s) encontrado(s) para el codigo de cliente <b>$search</b>!";

      while($row = mysqli_fetch_array($queryplus)) {?>
        <table border="" cellpadding="0" cellspacing="0" align="center"  width="78.5%" style="border:0px solid #999; color:#033;">
   
       <?php
       $nom_base = $row['nom_base'];
        $nom_cli = $row['nom_cli'];
        $factura = $row['factura'];
        $fecha = $row['fecha'];
        $percepcion = $row['percepcion'];
        $liquidacion = $row['liquidacion'];
        $voucher = $row['voucher']; ?> 
      <tr align="center" style="height:25px">
       <td width="8.5%"> <?php echo $row['nom_base']; ?> </td>
        <td width="8.5%"> <?php echo $row['nom_cli']; ?> </td>
        <td width="8.5%"> <?php echo $row['factura']; ?> </td>
        <td width="8.5%"> <?php echo $row['fecha']; ?> </td>
        <td width="8.5%"> <?php echo $row['percepcion']; ?> </td>
        <td width="8.5%"> <?php echo $row['liquidacion']; ?> </td>
        <td width="8.5%"> <?php echo $row['voucher']; ?> </td>
        <td width="8.5%">    
        <a href="delete_control.php?id=<?php echo md5($row['cod_cli']);?>"><input type="button" value="Eliminar" style="width:85px; height:20; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"></a>
        </td>

      </tr>
      </table>
      </center>
      <?php
      }
    }else{echo "error en la consulta";}
   }else{
   echo "No hay resultados con este nombre...";
 }
    mysqli_close($x);
}else{
  echo "Escribe algo a buscar..";
}

 ?>





  <tr>
    <td>

       <?php  ?>

</body>
</html>
