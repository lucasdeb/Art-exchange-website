<?php

include('config.php');

$sql = "SELECT Id_Arte, User_Id, Privado, img_arte, Precio FROM Arte";

$result = $link->query($sql);

function inventario($result)
{
    echo '<main>
    <h1>Vender</h1>
    <h2>Tu inventario publico <img src="../imgs/icons/unlock.svg" alt="" class="iconos" style="width: 20px; float: left;"></h2>
    <div class="inventario-usario">';

    while ($row = mysqli_fetch_assoc($result)) {
        if ($_SESSION['User_Id'] == $row['User_Id']) {
            echo '<div id="inventario">
                    <h1>' . $row['Id_Arte'] . '</h1>
                    <img src="' . $row['img_arte'] . '">
                    <h3>Privado: ' . $row['Privado'] . '</h3>
                    <h3>Precio: ' . $row['Precio'] . '</h3>
                    <button class="ver-perfil" onclick="abrirEdicion(' . $row['Id_Arte'] . ')">Editar</button>
                </div>';
        }
    }

    echo '</div>
    <div class="editar-arte" id="editar-arte">
        <form action="precio.php" method="POST" class="editar-arte-formulario">
        <h1>Editar</h1>
            <label for="precio" ><b>Precio: </b></label>
            <input type="number" placeholder="Editar Precio" name="precio" min="0" step="1" required>
            <input type="checkbox" id="privado" name="Privado" value="1">
            <label for="privado">Privado: </label>
            <input type="hidden" id="id_arte_input" name="id_arte" value="">
            <button type="submit">Aceptar</button>
            <button type="button" onclick="cerrar()">Cancelar</button>
        </form>
    </div></main>';
}


mysqli_close($link);


?>