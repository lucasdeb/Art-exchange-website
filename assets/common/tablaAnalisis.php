<?php

include('config.php');

$sql = "SELECT Comprador, Vendedor, Id_compra, Id_arte, Precio, Hora FROM Compras ORDER BY Hora DESC";

$result = mysqli_query($link, $sql);

function tablaCompras($result, $link)
{
    echo '<main>
        <div class="actividad-reciente">
            <div class="top-tabla">
                <h1 style="padding-bottom: 10px;">Actividad Reciente</h3>
            </div>
            <div class="espacio-tabla-actividad">
                <table class="tabla-actividad">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Arte</th>
                            <th>Comprador</th>
                            <th>Vendedor</th>
                            <th>Precio</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        $query = "SELECT alias_arte, img_arte FROM Arte WHERE Id_Arte = " . $row['Id_arte'];
        $getit = mysqli_query($link, $query);
        $arteAlias = mysqli_fetch_assoc($getit);

        $query2 = "SELECT User_Alias FROM Usuarios WHERE User_Id = " . $row['Comprador'];
        $one = mysqli_query($link, $query2);
        $compradorAlias = mysqli_fetch_assoc($one);

        $query3 = "SELECT User_Alias FROM Usuarios WHERE User_Id = " . $row['Vendedor'];
        $two = mysqli_query($link, $query3);
        $vendedorAlias = mysqli_fetch_assoc($two);

        echo '<tr class="td-actividad-reciente">
            <td><img src="' . $arteAlias['img_arte'] . '" style="width:25px; height:25px;"></td>
            <td>' . $arteAlias['alias_arte'] . '</td>
            <td>' . $compradorAlias['User_Alias'] . '</td>
            <td>' . $vendedorAlias['User_Alias'] . '</td>
            <td>$' . $row['Precio'] . '</td>
            <td>' . $row['Hora'] . '</td>
        </tr>';
    }
    echo '</tbody>
        </table>
        </div>
        </div>
        </main>';
}

?>