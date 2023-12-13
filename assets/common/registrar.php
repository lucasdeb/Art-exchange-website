<?php

//Arreglar validacion de campo on submit

include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['User_Alias']) && isset($_POST['User_Email']) && isset($_POST['User_Password'])) {
    $alias = $_POST['User_Alias'];
    $email = $_POST['User_Email'];
    $password = $_POST['User_Password'];

    $sql = "INSERT INTO Usuarios (User_Alias, User_Email, User_Password, User_Level) VALUES ('$alias', '$email', '$password', 0)";

    if ($link->query($sql) == TRUE) {
        echo "<script>alert('Los datos se guardaron con exito!')</script>";
    } else {
        echo "<script>alert('Algo salio mal')</script>";
    }
    header("Location: http://localhost/pwfinal/assets/common/login.php");
    die();
}


$conten = <<<html
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/index.css">
        <link rel="icon" type="image/x-icon" href="/assets/imgs/misc/favicon.ico">
        <script src="../scripts/login.js"></script>
        <title>Registrar</title>
    </head>
    <body>
        <div id="login-container">
            <div class="container-formulario">
                <div class="login-registro">
                    <form method="POST" action="registrar.php" class="login-formulario" name="registro" onsubmit="return verificacionRegistro()">
                        <h2 class="titulo-login">¡Registrate!</h2>
                            <div class="campo-ingreso">
                                <img src="../imgs/icons/user.svg" alt="" class="iconos" style="padding: 1rem;">
                                <input type="text" placeholder="Usuario" id="usuario" name="User_Alias" required>
                            </div>
                            <div class="campo-ingreso">
                                <img src="../imgs/icons/envelope.svg" alt="" class="iconos" style="padding: 1rem;">
                                <input type="email" placeholder="E-mail" id="email" name="User_Email" required>
                            </div>
                            <div class="campo-ingreso">
                                <img src="../imgs/icons/lock.svg" alt="" class="iconos" style="padding: 1rem;">
                                <input type="password" placeholder="Contraseña" id="contrasena" name="User_Password" required>
                            </div>
                        <input type="submit" name="registrar" class="btn" value="Registrarse">
                    </form>
                </div>
            </div>
            <div class="container-paneles">
                <div class="panel panel-izq">
                    <div class="contenido">
                        <h3>¿Yá tenés tu cuenta?</h3>
                        <p>Ingresa tus datos y segui coleccionando tus NFTs.</p>
                        <a href="http://localhost/pwfinal/assets/common/login.php">
                            <button class="btn transparente" id="login-btn">Iniciá Sesión</button>
                        </a>
                        <a href="http://localhost/pwfinal/assets/common/index.php">
                            <button class="btn transparente" id="login-btn">Inicio</button>
                        </a>
                    </div>
                    <img src="../imgs/components/astronaut.svg" class="imagen-login" alt="">
                </div>
            </div>
        </div>
    </body>
    </html>

html;

echo $conten;

?>