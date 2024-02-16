<?php

include('config.php');

$id_arte_click = $_GET['id_exac'];
$num = (int) $_POST['id_exac'];
$new = (int) $_SESSION['User_Id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id_vendedor = "SELECT User_Id, Precio, img_arte FROM Arte WHERE Id_Arte='$num'";
    $test = mysqli_query($link, $user_id_vendedor);
    $row = mysqli_fetch_assoc($test);
    $vendedor = (int) $row["User_Id"];
    $precio = (int) $row["Precio"];
    $hora = date("Y-m-d");

    echo "vendedor: " . $vendedor . "precio: " . $precio . "hora: " . $hora . "comprador: " . $new . "id arte: " . $num . "";

    $compra = "INSERT INTO Compras (Comprador, Vendedor, Id_compra, Id_arte, Precio, Hora) VALUES ('$new','$vendedor',NULL,'$num', '$precio', '$hora')";
    mysqli_query($link, $compra);

    $sql = "UPDATE Arte SET User_Id='$new' WHERE Id_Arte='$num'";
    if (mysqli_query($link, $sql)) {
        header('Location: vender.php');
    } else {
        echo "No se que paso...";
    }
}

$ask = "SELECT User_Id, img_arte, Precio FROM Arte WHERE Id_Arte='$id_arte_click'";
$test = mysqli_query($link, $ask);
$row = mysqli_fetch_assoc($test);
$src = $row['img_arte'];
$precio = (int) $row["Precio"];
$vendedor = (int) $row["User_Id"];

$ask = "SELECT User_Alias FROM Usuarios WHERE User_Id='$vendedor'";
$test = mysqli_query($link, $ask);
$row = mysqli_fetch_assoc($test);
$vendedor = $row['User_Alias'];



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
        <div style="border: 2px solid --light-violet; box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);">
            <h1>PRECIO: $$precio</h1>
            <h2>VENDEDOR: $vendedor</h2>
            <img src="$src" alt="" style="max-width: 300px; max-height: 300px; padding: 15px;">
        </div>
        <br>
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

mysqli_close($link);

?>