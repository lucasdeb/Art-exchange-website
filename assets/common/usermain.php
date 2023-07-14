<?php
include('perfil.php');
include('getdestacadas.php');
include('getperfil.php');
include('tablaPopular.php');
include('config.php');

$dest = destacadas($result);
$perf = 'perfil';
$tab1 = 'cargarTabla';


if ($_SESSION['signed_in'] == 0){
    session_start();
    session_destroy();
    header('Location: http://localhost/pwfinal/assets/common/login.php');
    die();
}



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

                <a href="./usermain.php" class="activo">
                    <img src="../imgs/icons/shop.svg" alt="" class="iconos" style="width: 20px;">
                    <h3>Mercado</h3>
                </a>

                <a href="./vender.php">
                    <img src="../imgs/icons/cash-register.svg" alt="" class="iconos" style="width: 20px;">
                    <h3>Vender</h3>
                </a>

                <a href="./subir.php">
                    <img src="../imgs/icons/upload.svg" alt="" class="iconos" style="width: 20px;">
                    <h3>Subir</h3>
                </a>

                <a href="./analisis.php">
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

        <!-- pantalla principal -->

        <main>
            <h1>Mercado</h1>
            <!-- destacada 1 -->

            <div class="informacion">
            {$dest[0]}{$dest[1]}{$dest[2]}
            </div>

            <!-- Top arte (Arte mas caro) -->
html;

echo $contenido;

$tabla = <<<t1
        {$tab1($resul, $link)}
        <h2>Usuarios verificados</h2>
t1;

echo $tabla;

$texto = <<<pag
            <div class="top-colecciones">
                {$perf($res)}
            </div>


        </main>



        <!-- panel derecha -->

        <div class="derecha">

            <!-- arriba -->

            <div class="arriba">
                <button id="btn-menu">
                    <img src="../imgs/icons/bars.svg" alt="" class="iconos">
                </button>

                <div class="perfil">
                    <div class="informacion">
                        <p>Hola, <b>{$usern}</b></p>
                        <small class="texto">{$nivel}</small>
                    </div>
                    <div class="foto-perfil">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

pag;

echo $texto;

?>