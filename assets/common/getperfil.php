<?php
include('config.php');

$sql = "SELECT User_Alias, User_Id, User_Level FROM Usuarios";

$res = $link->query($sql);

function perfil($res){
    echo '<table>
        <tbody>
            <tr>
                <th>User Alias</th>
                <th>User ID</th>
                <th>User Level</th>
            </tr>';

    while ($row = mysqli_fetch_assoc($res)) {
        echo '<tr>
                <td>'.$row['User_Alias'].'</td>
                <td>'.$row['User_Id'].'</td>
                <td>'.$row['User_Level'].'</td>
            </tr>
            <tbody>';
    }

    echo '</table>';
}
mysqli_close($link);

?>