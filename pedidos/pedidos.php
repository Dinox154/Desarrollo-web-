<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        session_destroy();
        header('location:../login.php');
    }
    include("../config.php");
    $sql = "SELECT * FROM sales";
    $query = mysqli_query($db_link,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <th>#</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Categoria</th>
            <th>Nombre</th>
            <th>Precio unitario</th>
            <th>Cantidad</th>
            <th>ToTal</th>
            <th>Ganacia</th>
            <th>Monto Cancelado</th>
            <th>Resta</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php
                $i= 0;
                while($row = mysqli_fetch_array($query)){
                    $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['dates']; ?></td>
                <td><?php echo $row['customers'];?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['amnt']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['total']; ?></td>
                <td><?php echo $row['profit']; ?></td>
                <td><?php echo $row['tendered']; ?></td>
                <td><?php echo $row['changed']?></td>
                <td>
                    <a href="?id=<?php echo $row['id'];?>">Eliminar</a>
                    <a href="reporte.php?id=<?php echo $row['id'];?>">Exportar</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>