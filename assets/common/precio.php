<?php
include('config.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $precio = $_POST['precio'];
    $id_arte = $_POST['id_arte'];

    if (is_numeric($precio) && is_numeric($id_arte)) {
        actualizarPrecio($link, $precio, $id_arte);
    }
}

function actualizarPrecio($link, $valor, $id)
{
    echo "ID: $id Valor: $valor";
    $sql = "UPDATE Arte SET Precio='$valor' WHERE Id_Arte='$id'";
    if ($link->query($sql)) {
        echo "Precio actualizado con éxito.";
    } else {
        echo "Error al actualizar el precio: " . $link->error;
    }
}
?>