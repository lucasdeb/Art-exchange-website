<?php

include('config.php');

$sql = "SELECT Comprador, Vendedor, Id_compra, Id_arte, Precio, Hora FROM Compras ORDER BY Hora DESC";

$result = $link->query($sql);

function tablaCompras($result,$link){
    echo '<main>
        <div class="actividad-reciente">
            <div class="top-tabla">
                <h1 style="padding-bottom: 10px;">Actividad Reciente</h3>
            </div>
            <div class="espacio-tabla-actividad">
                <table class="tabla-actividad">
                    <thead>
                        <tr>
                            <th>Comprador</th>
                            <th>Vendedor</th>
                            <th>Precio</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        $arteUserId = $row['User_Id'];
        $query = "SELECT U.User_Alias FROM Usuarios U JOIN Compras C ON U.User_Id = C.Comprador WHERE C.Comprador = $arteUserId";
        echo '<tr class="td-actividad-reciente">
            <td>'.$row['Comprador'].'</td>
            <td>'.$row['Vendedor'].'</td>
            <td>'.$row['Precio'].'</td>
            <td>'.$row['Hora'].'</td>
        </tr>';
    }
    echo '</tbody>
        </table>
        </div>
        </div>
        </main>';
}



?>