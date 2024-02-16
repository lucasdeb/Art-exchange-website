<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $img = $_POST['img_arte'];
    $precio = $_POST['Precio'];
    $user = $_SESSION['User_Id'];
    $alias_arte = $_POST['alias_arte'];

    $sql = "INSERT INTO Arte (User_Id, Privado, img_arte, Precio, Id_creador, alias_arte) VALUES ('$user', 0, '$img', '$precio', '$user', '$alias_arte')";

    if (mysqli_query($link, $sql)) {
        echo "It worked";
        header('Location: usermain.php');
    } else {
        echo "Algo salio mal...";
    }
}
?>