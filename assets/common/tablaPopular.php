<?php

include('config.php');

$sql = "SELECT Id_Arte, User_Id, img_arte, Precio FROM Arte ORDER BY Precio DESC";

$resul = $link->query($sql);


function cargarTabla($resul, $link)
{
    echo '<div class="top-colecciones">
        <h2>Todo el arte</h2>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Dueño</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>';
    while ($row = mysqli_fetch_assoc($resul)) {
        $arteUserId = $row['User_Id'];

        $query = "SELECT U.User_Alias FROM Usuarios U JOIN Arte A ON U.User_Id = A.User_Id WHERE A.User_Id = $arteUserId";
        $getit = $link->query($query);
        $userAlias = $getit->fetch_assoc();
        echo '<tr>
            <td><img src="' . $row['img_arte'] . '"></td>
            <td>' . $row['Id_Arte'] . '</td>
            <td>' . $userAlias['User_Alias'] . '</td>
            <td>' . $row['Precio'] . '</td>
            <td><a style="color: #a2a4f5;" href="../common/payment.php?id_exac=' . $row["Id_Arte"] . '">Comprar</a></td>
        </tr>';
    }
    echo '</tbody>
        </table>
        </div>';
}

mysqli_close($link);


?>