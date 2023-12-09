<?php
include('config.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $precio = $_POST['precio'];
    $id_arte = $_POST['id_arte'];
    $priv = (int) $_POST['privado'];

    if (is_numeric($precio) && is_numeric($id_arte) && is_numeric($priv)) {
        actualizarPrecio($link, $precio, $id_arte, $priv);
    }
}

function actualizarPrecio($link, $valor, $id, $priv)
{
    $sql = "UPDATE Arte SET Precio='$valor', Privado='$priv' WHERE Id_Arte='$id'";
    if ($link->query($sql)) {
        echo "Precio actualizado con éxito.";
        header("Location: vender.php");
    } else {
        echo "Error al actualizar el precio: " . $link->error;
    }
}
?>