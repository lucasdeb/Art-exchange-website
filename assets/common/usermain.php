<?php
include('perfil.php');
include('getdestacadas.php');
include('getperfil.php');
include('config.php');

$dest = destacadas($result);
$perf = 'perfil';


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
            <div class="top-colecciones">
                <h2>Arte popular</h2>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Coleccion</th>
                            <th></th>
                            <th>Volumen</th>
                            <th>Volumen (USDT)</th>
                            <th>Precio Piso</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><span class="top1">1</span></td>
                            <td><img src="../imgs/nft-art/35.jpeg"></td>
                            <td>MutantApeYachtClub</td>
                            <td>7.5K ETH</td>
                            <td>$10.9M<small class="abajo"> -33.8%</small></td>
                            <td>14.6 ETH</td>
                            <td><a href="../../assets/common/art/00.html">Ver</a></td>
                        </tr>

                        <tr>
                            <td><span class="top2">2</span></td>
                            <td><img src="../imgs/nft-art/43.jpeg"></td>
                            <td>ABC</td>
                            <td>293.3K SOL</td>
                            <td>$9.6M<small class="arriba"> +109.89%</small></td>
                            <td>28.47 SOL</td>
                            <td><a href="#">Ver</a></td>
                        </tr>

                        <tr>
                            <td><span class="top3">3</span></td>
                            <td><img src="../imgs/nft-art/42.jpeg"></td>
                            <td>RENGA</td>
                            <td>4.4K ETH</td>
                            <td>$5.7M<small class="arriba"> +192%</small></td>
                            <td>2.50 ETH</td>
                            <td><a href="#">Ver</a></td>
                        </tr>

                        <tr>
                            <td><span>4</span></td>
                            <td><img src="../imgs/nft-art/41.jpeg"></td>
                            <td>DeGods</td>
                            <td>147.6K SOL</td>
                            <td>$4.81M<small class="abajo"> -44.99%</small></td>
                            <td>339 SOL</td>
                            <td><a href="#">Ver</a></td>
                        </tr>

                        <tr>
                            <td><span>5</span></td>
                            <td><img src="../imgs/nft-art/32.jpeg"></td>
                            <td>Doodles</td>
                            <td>2.3K ETH</td>
                            <td>$3.71M<small class="abajo"> -23.70%</small></td>
                            <td>8.10 ETH</td>
                            <td><a href="#">Ver</a></td>
                        </tr>

                    </tbody>
                </table>
                <!-- <a href="#">Mostrar Mas</a> -->

            </div>


            <h2>Usuarios verificados</h2>

html;

echo $contenido;

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

            <!-- Mejores vendedores  -->
            <div class="vendedores">
                <h2>Vendedores Destacados</h2>
                <div class="vendedores-destacados">

                    <div class="vendedor-dest">
                        <div class="foto-perfil">
                            <img src="../imgs/perfiles/perfil2.jpeg">
                        </div>
                        <div class="msj">
                            <a href="/">
                                <p>Elon Musk</p>
                            </a>
                            <small>73 ventas</small>
                        </div>
                    </div>

                    <div class="vendedor-dest">
                        <div class="foto-perfil">
                            <img src="../imgs/perfiles/perfil3.jpeg">
                        </div>
                        <div class="msj">

                            <a href="/">
                                <p>Marcos Galperin</p>
                            </a>
                            <small>49 ventas</small>
                        </div>
                    </div>

                    <div class="vendedor-dest">
                        <div class="foto-perfil">
                            <img src="../imgs/perfiles/perfil4.jpeg">
                        </div>
                        <div class="msj">
                            <!-- <p>Harold Stock</p> -->
                            <a href="/">
                                <p>Harold Stock</p>
                            </a>
                            <small>32 ventas</small>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
        </div>
    </div>
</body>

</html>

pag;

echo $texto;

?>