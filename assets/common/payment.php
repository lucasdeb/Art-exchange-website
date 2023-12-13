<?php

include('config.php');

$id_arte_click = $_GET['id_exac'];
$num = (int) $_POST['id_exac'];
$new = (int) $_SESSION['User_Id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id_vendedor = "SELECT User_Id, Precio FROM Arte WHERE Id_Arte='$num'";
    $test = mysqli_query($link, $user_id_vendedor);
    $row = mysqli_fetch_assoc($test);
    $vendedor = (int) $row["User_Id"];
    $precio = (int) $row["Precio"];
    $hora = date("Y-m-d");

    echo $vendedor, $precio, $num, $new;

    $compra = "INSERT INTO Compras (Comprador, Vendedor, Id_compra, Id_arte, Precio, Hora) VALUES ('$new','$vendedor',NULL,'$num', '$precio', '$hora')";

    echo "($compra)";

    mysqli_query($link, $compra);

    $sql = "UPDATE Arte SET User_Id='$new' WHERE Id_Arte='$num'";
    if (mysqli_query($link, $sql)) {
        header('Location: vender.php');
    } else {
        echo "No se que paso...";
    }
}

$ask = "SELECT User_Id FROM Arte WHERE Id_Arte='$id_arte_click'";
$test = mysqli_query($link, $ask);
$row = mysqli_fetch_assoc($test);


if ($row['User_Id'] == $new) {
    $yaCompraste = <<<aviso
        <h1 style="text-align:center;">Este item ya es tuyo...</h1>
        <script>
            setTimeout(function() {
                window.location.href = 'usermain.php';
            }, 5000);
        </script>
    aviso;

    echo $yaCompraste;
} else {
    $form = <<<cont

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../styles/index.css">
                <script src="../scripts/payment.js"></script>
                <title>payment</title>
            </head>

            <div class="payment-receive">
                <form method="POST" action="payment.php" class="registro-formulario" name="registro" onsubmit="return verificacionTarjeta()">
                    <h2 class="titulo-login">¡Ingresa tu metodo de pago!</h2>
                    <img src="../imgs/misc/card-icon.jpg" alt="" style="width: 2rem; align-items: center;">

                    <div class="campo-ingreso">
                        <input type="text" placeholder="Nombre del titular" id="nombre">
                    </div>

                    <div class="campo-ingreso">
                        <input type="text" placeholder="Numero de tarjeta" id="card-id">
                    </div>

                    <div class="campo-ingreso">
                        <input type="code" placeholder="CVV" id="codigoseguridad">
                    </div>

                    <div class="campo-ingreso">
                        <input type="fechavenc" placeholder="Fecha de exp. (MM/AA)" id="fecha">
                    </div>
                    <input type="submit" class="btn" value="Enviar">
                    <input type="hidden" name="id_exac" value="$id_arte_click">
                </form>
            </div>
    cont;

    echo $form;
}

mysqli_close($link);

?>