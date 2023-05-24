<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$id = $_POST['IDE'];

$eliminarProducto = mysqli_query($conexion, "DELETE FROM producto WHERE ID_PRODUCTO = '$id'");
$query = mysqli_query($conexion, "SELECT * FROM producto");
$number=1;

while ($row=mysqli_fetch_array($query)) {
    $id=$row['ID_PRODUCTO'];
    $sql = mysqli_query($conexion,"UPDATE producto SET ID_PRODUCTO = '$number' where ID_PRODUCTO ='$id'");
    $number++;
}

header('location: /listar_productos.php');

?>