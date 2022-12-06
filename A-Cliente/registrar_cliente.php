   <?php 
   include("../config.php");
   header('Location:../index.php#popup2');
if (isset($_POST['btn1'])) {
  $dato=$_POST['btn1'];
  $cliente=$_POST['cli'];
  $base = $_POST['base'];

  $sql = "SELECT nom_base FROM bases order by nom_base";
  $res = mysqli_query($db_link,$sql);
  while ($row = mysqli_fetch_array($res)) {
    for ($i=0; $i <count($row); $i++) { 
      if ($base==("base$i+1")) {
        $base =("base$i+1");
      }
    }
    
  }

  if ($dato=='Insertar') {
    if (isset($cliente) && !empty($cliente)) {
      $sql="INSERT INTO cliente(nom_cli,cod_base) VALUES ('$cliente',(SELECT cod_base FROM bases WHERE nom_base='$base'))";
      $res =mysqli_query($db_link,$sql);
      if ($res) {
         
      }else{
        echo "<script>alert('Error al Insertar Registro');</script>";
      }

    } 

  }

}

?>