<?php

include('config.php');
include('perfil.php');
include('tablaAnalisis.php');

if ($_SESSION['signed_in'] == 0) {
    session_start();
    session_destroy();
    header('Location: http://localhost/pwfinal/assets/common/login.php');
    die();
}

$tab2 = 'tablaCompras';

$contenido = <<<html
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/index.css">
        <link rel="icon" type="image/x-icon" href="/assets/imgs/misc/favicon.ico">
        <title>Inicio</title>
    </head>

    <body>
        <div class="container-usermain">

            <!-- sidebar -->

            <aside>
                <div class="arriba">
                    <div class="logo-usermain">
                        <img src="../imgs/misc/logo.jpeg" alt="">
                        <h2>marketplace</h2>
                        <div class="btn-cerrar">
                            <img src="../imgs/icons/xmark.svg" alt="" class="iconos">
                        </div>
                    </div>
                </div>

                <div class="sidebar">

                    <a href="./usermain.php">
                        <img src="../imgs/icons/shop.svg" alt="" class="iconos" style="width: 20px;">
                        <h3>Mercado</h3>
                    </a>

                    <a href="./vender.php">
                        <img src="../imgs/icons/cash-register.svg" alt="" class="iconos" style="width: 20px;">
                        <h3>Inventario</h3>
                    </a>

                    <a href="./subir.php">
                        <img src="../imgs/icons/upload.svg" alt="" class="iconos" style="width: 20px;">
                        <h3>Subir</h3>
                    </a>

                    <a href="./analisis.php" class="activo">
                        <img src="../imgs/icons/magnifying-glass-chart.svg" alt="" class="iconos" style="width: 20px;">
                        <h3>Analisis</h3>
                    </a>
                    
                    <!--<a href="./carrito.php">
                        <img src="../imgs/components/basket-cart-icon-27.png" style="width:20px;height: 20px;">
                        <h3>Carrito</h3>
                        <span class="cant-productos">3</span>
                    </a>-->

                    <a href="logout.php">
                        <img src="../imgs/icons/right-from-bracket.svg" alt="" class="iconos" style="width: 20px;">
                        <h3>Cerrar Sesión</h3>
                    </a>

                </div>
            </aside>

html;

echo $contenido;

$tabla = <<<cont
            {$tab2($result, $link)}

            <!-- panel derecha -->

            <div class="derecha">
                <div class="arriba">
                    <button id="btn-menu">
                        <img src="../imgs/icons/bars.svg" alt="" class="iconos">
                    </button>

                    <div class="perfil">
                        <div class="informacion">
                            <p>Hola, <b>{$usern}</b></p>
                            <small class="texto">{$nivel}</small>
                        </div>
                    </div>
                </div>
            </div>
    </body>

    </html>

cont;

echo $tabla;

?>