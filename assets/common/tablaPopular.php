<?php

include('config.php');

$sql = "SELECT Id_Arte, User_Id, img_arte, Precio, Privado, alias_arte, Id_creador FROM Arte ORDER BY Precio DESC";

$resul = mysqli_query($link, $sql);


function cargarTabla($resul, $link)
{
    echo '<div class="top-colecciones">
        <h2>Todo el arte</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Dueño</th>
                            <th>Creador</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>';
    while ($row = mysqli_fetch_assoc($resul)) {
        $arteUserId = $row['User_Id'];

        //Comparacion de User_Id de la tabla de Arte y de Usuarios que junta las dos tablas, muestra a los usuarios que coincidan en las dos tablas
        $query = "SELECT U.User_Alias FROM Usuarios U JOIN Arte A ON U.User_Id = A.User_Id WHERE A.User_Id = $arteUserId";
        $getit = mysqli_query($link, $query);
        $userAlias = mysqli_fetch_assoc($getit);

        //sacamos el User_Alias del Id_creador
        $creador = $row['Id_creador'];
        $nquery = "SELECT User_Alias FROM Usuarios WHERE User_Id = $creador";
        $c = mysqli_fetch_assoc(mysqli_query($link, $nquery));

        if ($row['Privado'] == '0') {
            echo '<tr>
                <td><img src="' . $row['img_arte'] . '"></td>
                <td>' . $row['alias_arte'] . '</td>
                <td>' . $userAlias['User_Alias'] . '</td>
                <td>' . $c['User_Alias'] . '</td>
                <td>' . $row['Precio'] . '</td>';

            if ($_SESSION['User_Id'] != $row['User_Id']) {
                echo '<td><a style="color: #a2a4f5;" href="../common/payment.php?id_exac=' . $row["Id_Arte"] . '">Comprar</a></td>';
            }

            echo '</tr>';
        }
    }
    echo '</tbody>
        </table>
        </div>';
}

mysqli_close($link);


?>