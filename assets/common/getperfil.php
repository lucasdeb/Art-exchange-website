<?php
include('config.php');

$sql = "SELECT User_Alias, User_Id, User_Level FROM Usuarios";

$res = mysqli_query($link, $sql);

function perfil($res)
{
    $level = "";
    echo '<div class="perfiles-verificados">';
    while ($row = mysqli_fetch_assoc($res)) {
        if ($_SESSION['User_Id'] != $row['User_Id']) {
            if ($row['User_Level'] == 1) {
                $level = "Administrador";
            } else {
                $level = "Usuario";
            }

            echo '<div class="perfil-verificado">
                <h1>' . $row['User_Alias'] . '</h1>
                <h3>User ID: ' . $row['User_Id'] . '</h3>
                <h3>' . $level . '</h3>
            </div>';
        }
    }
    echo '</div>';
}
mysqli_close($link);

?>