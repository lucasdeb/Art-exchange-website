<?php
include('config.php');

$usern = strtoupper($_SESSION['User_Alias']);
$nivel = "";

if($_SESSION['User_Level'] == 1){
    $nivel = "Administrador";
}
else{
    $nivel = "Usuario";
}

mysqli_close($link);

?>