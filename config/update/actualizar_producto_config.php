<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$id = $_POST['IDA'];
$producto = $_POST['NombreProducto'];
$valor = $_POST['ValorUnitarioA'];
$stock = $_POST['StockA'];
$complemento = $_POST['ComplementoA'];
$imagen = $_POST['ImagenA'];

if ($imagen == "") {
    $actualizarTaller = mysqli_query($conexion, "UPDATE producto SET NOMBRE_PRODUCTO='$producto', VALOR_UNITARIO='$valor', STOCK='$stock', COMPLEMENTO='$complemento' WHERE ID_PRODUCTO = '$id'");
    $actualizarTallerH = mysqli_query($conexion, "UPDATE producto_historico SET NOMBRE_PRODUCTO='$producto', VALOR_UNITARIO='$valor', STOCK='$stock', COMPLEMENTO='$complemento' WHERE ID_PRODUCTO = '$id'");
} else {
    $actualizarTaller = mysqli_query($conexion, "UPDATE producto SET NOMBRE_PRODUCTO='$producto', VALOR_UNITARIO='$valor', STOCK='$stock', COMPLEMENTO='$complemento', IMAGEN='$imagen' WHERE ID_PRODUCTO = '$id'");
    $actualizarTallerH = mysqli_query($conexion, "UPDATE producto_historico SET NOMBRE_PRODUCTO='$producto', VALOR_UNITARIO='$valor', STOCK='$stock', COMPLEMENTO='$complemento', IMAGEN='$imagen' WHERE ID_PRODUCTO = '$id'");
}

header('location: /listar_productos.php');

?>