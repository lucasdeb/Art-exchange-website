<?php
include('config.php');

$sql = "SELECT Id_Arte, User_Id, img_arte, precio FROM Arte";

$result = $link->query($sql);

function destacadas($result){
    $dest = array();
    $a = 0;
    $num = $result->num_rows;
    while ($a < 3 && $row = mysqli_fetch_assoc($result)) {
        $cont = '<div class="colecciones-destacada-1">
                <img src="../imgs/icons/fire.svg" alt="" class="iconos" style="width: 20px;"><label for="">Destacada</label>
                <div class="medio">
                    <div class="izquierda">
                        <h1>'.$row["Id_Arte"].'</h1>
                    </div>
                    <img src="'.$row["img_arte"].'" alt="">
                    <h3>'.$row['precio'].'</h3>
                </div>
                <a href="../common/payment.php">Comprar</a>
            </div>';
        $a++;
        array_push($dest,$cont);
    }
    rsort($dest);

    return $dest;
}

mysqli_close($link);

?>