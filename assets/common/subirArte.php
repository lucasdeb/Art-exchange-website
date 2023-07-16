<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $img = $_POST['img_arte'];
    $precio = $_POST['Precio'];
    $user = $_SESSION['User_Id'];

    $sql = "INSERT INTO Arte (Id_Coleccion, User_Id, Privado, img_arte, Precio) VALUES (1, '$user', 0, '$img', '$precio')";

    if (mysqli_query($link, $sql)) {
        echo "It worked";
    } 
    else {
        echo "What the fuck";
    }
}
?>