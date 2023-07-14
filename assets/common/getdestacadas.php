<?php
include('config.php');

$sql = "SELECT Id_Arte, User_Id, img_arte, precio FROM Arte";

$result = $link->query($sql);

function destacadas($result){
    $dest = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $cont = '<div class="colecciones-destacada-1">
                <img src="../imgs/icons/fire.svg" alt="" class="iconos" style="width: 20px;"><label for="">Destacada</label>
                <div class="medio">
                    <div class="izquierda">
                        <h1>ID: '.$row["Id_Arte"].'</h1>
                    </div>
                    <img src="'.$row["img_arte"].'" alt="">
                    <h3>Precio: $'.$row['precio'].'</h3>
                </div>
                <a href="../common/payment.php">Comprar</a>
            </div>';
        array_push($dest,$cont);
    }
    rsort($dest);
    return $dest;
}

mysqli_close($link);

?>