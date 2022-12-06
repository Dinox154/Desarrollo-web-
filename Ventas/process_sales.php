<!DOCTYPE>
<html>

<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="../Css/estilos.css">
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('location:../login.php');
    }
    ?>

    <div id="popup-box2" class="popup-position1">
        <div id="popup-wrapper2">
            <div id="popup-container2">
                <div id="popup-head-color5">
                    <br>
                    <p style="font-family:sans-serif;font-size:16px;"> Formulario de Transaccion </p>
                </div>
                <?php
                include '../config.php';
                $id = $_GET['id'];
                $view = "SELECT * from products where md5(id) = '$id'";
                $result = $db_link->query($view);
                $row = $result->fetch_assoc();
                if (isset($_POST['update'])) {
                    $ID = $_GET['id'];
                    $view1 = "SELECT quantity from products where md5(id) = '$id'";
                    $result1 = $db_link->query($view);
                    $row2 = $result->fetch_assoc();
                    $quant = $_POST['quant'];
                    $dates = $_POST['dates'];
                    $quantity = $_POST['quantity'];
                    $customers = $_POST['customers'];
                    $category = $_POST['category'];
                    $name = $_POST['name'];
                    $amount = $_POST['amount'];
                    $quant = $_POST['quant'];
                    $total = $_POST['total'];
                    $tendered = $_POST['tendered'];
                    $changed = $_POST['changed'];
                    $prof = $_POST['profit'];
                    $insert1 = "UPDATE products set quantity = quantity - '$quant' where md5(id) = '$ID'";
                    $insert = "INSERT INTO sales(dates,customers,category,name,amnt,quantity,total,profit,tendered,changed) VALUES('$dates','$customers','$category','$name','$amount','$quant','$total','$prof','$tendered','$changed')" or die("error" . mysqli_errno($db_link));
                    $result = mysqli_query($db_link, $insert);
                    if($db_link->query($insert1)== TRUE){
                        echo "Sucessfully update data";
                        header('location:../pedidos/pedidos.php');			
                    }
                    $db_link->close();
                }
                ?>
                <form action="" method="POST">
                    <table border="0" align="center">
                        <?php
                        if (isset($_POST['sub'])) {

                            @$total = $_POST['total'];
                            @$tendered = $_POST['tendered'];
                            @$quant = $_POST['quant'];
                            @$profit = $_POST['profit'];

                            @$profit = $profit;
                            @$quant = $quant;
                            @$ten = $tendered;
                            @$change = $tendered - $total;
                        }

                        ?>

                        <tr>
                            <td align="right"> Fecha Actual: </td>
                            <td> <input type="text" name="dates" id="txtbox" value="<?php echo "  " . date("Y/m/d") ?>" readonly> </td>
                        </tr>
                        <tr>
                            <td align="right">Clientes:</td>
                            <td>
                                <select name="customers" id="txtbox" readonly>

                                    <?php
                                    require('../config.php');
                                    $query = "SELECT * FROM customers";
                                    $result = mysqli_query($db_link, $query);
                                    while ($row1 = mysqli_fetch_array($result)) {
                                    ?>
                                        <option><?php echo $row1['name']; ?></option>

                                    <?php
                                    }
                                    ?>

                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td align="right">Categoria:</td>
                            <td><input type="text" id="txtbox" name="category" value="<?php echo $row['category']; ?>" readonly><br></td>
                        </tr>

                        <tr>
                            <td align="right">Nombre Producto:</td>
                            <td><input type="text" id="txtbox" name="name" value="<?php echo $row['name']; ?>" readonly><br></td>
                        </tr>

                        <form method="POST">
                            <?php

                            if (isset($_POST['calculate'])) {
                                @$amnt = $_POST['amount'];
                                @$quant = $_POST['quant'];
                                @$profit = $_POST['profit'];
                                @$purchase = $_POST['purchase'];

                                @$quant = $quant;
                                @$total = $amnt * $quant;
                                @$profit = $total - $quant * $purchase;
                            }

                            ?>

                            <form method="post">
                                <tr>
                                    <td><input type="text" id="txtbox" name="purchase" value="<?php echo $row['purchase']; ?>" hidden><br></td>
                                </tr>

                                <tr>
                                    <td align="right">Precio Venta:</td>
                                    <td><input type="text" id="txtbox" name="amount" value="<?php echo $row['retail']; ?>" readonly><br></td>
                                </tr>

                                <tr>
                                    <td align="right">Cantidad:</td>
                                    <td><input type="text" id="txtbox" name="quant" value="<?php echo @$quant ?>" placeholder="Cantidad" required></td>
                                </tr>

                                <tr>
                                    <td align="right">Monto Total a Pagar:</td>
                                    <td><input type="text" id="txtbox" name="total" value="<?php echo @$total ?>" readonly></td>
                                    <td><input type="submit" name="calculate" value="Calcular" id="btncalc"></td>
                                </tr>
                                <tr>
                                    <td align="right">Ganancia:</td>
                                    <td><input type="text" id="txtbox" name="profit" value="<?php echo @$profit ?>" readonly><br></td>
                                </tr>
                            </form>
                            <tr>
                                <td align="right">Monto Cancelado:</td>
                                <td><input type="text" id="txtbox" value="<?php echo @$ten ?>" name="tendered" placeholder="Monto Recibido"></td>
                                <td><input type="submit" value="Calcular" name="sub" id="btncalc"></td>
                            </tr>

                            <tr>
                                <td align="right">Devolver:</td>
                                <td><input type="text" id="txtbox" name="changed" value="<?php echo @$change ?>" readonly></td>
                            </tr>

                        </form>

                        <br>
                        <tr align="center">
                            <td>&nbsp; </td>
                            <td>
                                <br>
                                <input type="SUBMIT" name="update" id="btnnav" value="Agregar">
                                <a href="sales.php"><input type="button" style="border:1px solid #900; background:#900; height:40px; width:105px; border-radius:3px; color:#FFF;" value="Cancelar"></a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

</html>