<?php

include('config.php');
include('perfil.php');
include('subirArte.php');

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

                        <a href="./usermain.php">
                            <img src="../imgs/icons/shop.svg" alt="" class="iconos" style="width: 20px;">
                            <h3>Mercado</h3>
                        </a>

                        <a href="./vender.php">
                            <img src="../imgs/icons/cash-register.svg" alt="" class="iconos" style="width: 20px;">
                            <h3>Inventario</h3>
                        </a>

                        <a href="./subir.php" class="activo">
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
                    <h2>Subir</h2>
                    <div class="top-colecciones">
                        <table class="subir-arte">
                            <thead>
                                <tr>
                                    <th>Precio</th>
                                    <th>Subir Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form method="post" action="subirArte.php">
                                <tr>
                                    <td><input type="number" name="Precio" id="slct-precio" min="0" value="0" step="0.5" style="width: 4rem;"></td>
                                    <td>
                                        <select name="img_arte">
                                            <option value="../imgs/nft-art/0.jpeg">0.jpeg</option>
                                            <option value="../imgs/nft-art/1.jpeg">1.jpeg</option>
                                            <option value="../imgs/nft-art/2.jpeg">2.jpeg</option>
                                            <option value="../imgs/nft-art/3.jpeg">3.jpeg</option>
                                            <option value="../imgs/nft-art/4.jpeg">4.jpeg</option>
                                            <option value="../imgs/nft-art/5.jpeg">5.jpeg</option>
                                            <option value="../imgs/nft-art/6.jpeg">6.jpeg</option>
                                            <option value="../imgs/nft-art/7.jpeg">7.jpeg</option>
                                            <option value="../imgs/nft-art/8.jpeg">8.jpeg</option>
                                            <option value="../imgs/nft-art/9.jpeg">9.jpeg</option>
                                            <option value="../imgs/nft-art/10.jpeg">10.jpeg</option>
                                            <option value="../imgs/nft-art/11.jpeg">11.jpeg</option>
                                            <option value="../imgs/nft-art/12.jpeg">12.jpeg</option>
                                            <option value="../imgs/nft-art/13.jpeg">13.jpeg</option>
                                            <option value="../imgs/nft-art/14.jpeg">14.jpeg</option>
                                            <option value="../imgs/nft-art/15.jpeg">15.jpeg</option>
                                            <option value="../imgs/nft-art/16.jpeg">16.jpeg</option>
                                            <option value="../imgs/nft-art/17.jpeg">17.jpeg</option>
                                            <option value="../imgs/nft-art/18.jpeg">18.jpeg</option>
                                            <option value="../imgs/nft-art/19.jpeg">19.jpeg</option>
                                            <option value="../imgs/nft-art/20.jpeg">20.jpeg</option>
                                            <option value="../imgs/nft-art/21.jpeg">21.jpeg</option>
                                            <option value="../imgs/nft-art/22.jpeg">22.jpeg</option>
                                            <option value="../imgs/nft-art/23.jpeg">23.jpeg</option>
                                            <option value="../imgs/nft-art/24.jpeg">24.jpeg</option>
                                            <option value="../imgs/nft-art/25.jpeg">25.jpeg</option>
                                            <option value="../imgs/nft-art/26.jpeg">26.jpeg</option>
                                            <option value="../imgs/nft-art/27.jpeg">27.jpeg</option>
                                            <option value="../imgs/nft-art/28.jpeg">28.jpeg</option>
                                            <option value="../imgs/nft-art/29.jpeg">29.jpeg</option>
                                            <option value="../imgs/nft-art/30.jpeg">30.jpeg</option>
                                            <option value="../imgs/nft-art/31.jpeg">31.jpeg</option>
                                            <option value="../imgs/nft-art/32.jpeg">32.jpeg</option>
                                            <option value="../imgs/nft-art/33.jpeg">33.jpeg</option>
                                            <option value="../imgs/nft-art/34.jpeg">34.jpeg</option>
                                            <option value="../imgs/nft-art/35.jpeg">35.jpeg</option>
                                            <option value="../imgs/nft-art/36.jpeg">36.jpeg</option>
                                            <option value="../imgs/nft-art/37.jpeg">37.jpeg</option>
                                            <option value="../imgs/nft-art/38.jpeg">38.jpeg</option>
                                            <option value="../imgs/nft-art/39.jpeg">39.jpeg</option>
                                            <option value="../imgs/nft-art/40.jpeg">40.jpeg</option>
                                            <option value="../imgs/nft-art/41.jpeg">41.jpeg</option>
                                            <option value="../imgs/nft-art/42.jpeg">42.jpeg</option>
                                            <option value="../imgs/nft-art/43.jpeg">43.jpeg</option>
                                        </select>
                                    </td>
                                    <td><input type="submit"></td>
                                </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>

                </main>

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

                    <!-- 
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
                                    <a href="/">
                                        <p>Harold Stock</p>
                                    </a>
                                    <small>32 ventas</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> -->

                </div>
        </body>

        </html>

html;

echo $contenido;

?>