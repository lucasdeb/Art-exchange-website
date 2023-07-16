<?php

include('config.php');

$id_arte_click = $_GET['id_exac'];
$new = $_SESSION['User_Id'];

$sql = "UPDATE Arte SET User_Id='$new' WHERE Id_Arte='$id_arte_click'";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if (mysqli_query($link, $sql)) {
        header('Location: vender.php');
    } 
    else {
        echo "What the fuck";
    }
}

mysqli_close($link);

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
            <form method="GET" action="payment.php" class="registro-formulario" name="registro" onsubmit="return verificacionTarjeta()">
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
                <input type="submit" name="pago" class="btn" value="Enviar">
            </form>
        </div>
cont;

echo $form;

?>