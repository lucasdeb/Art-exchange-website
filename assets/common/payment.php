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

    <form action="" class="registro-formulario" name="registro" onsubmit="return verificacionTarjeta()">
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
        <a href="./usermain.html">
            <input type="submit" name="" class="btn" value="Enviar">
           </a>
    </form>
</div>
