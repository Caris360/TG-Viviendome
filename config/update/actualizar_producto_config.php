<?php

include('/xampp/htdocs/ViviendomeCoaching/config/functions/funciones.php');
require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$id = $_POST['IDA'];
$producto = $_POST['NombreProducto'];
$valorUnitario = $_POST['ValorUnitarioA'];
$stock = $_POST['StockA'];
$complemento = $_POST['ComplementoA'];

$valor = convertirFormato($valorUnitario);

if (!$_FILES['ImagenA']['type'] == "image/*") {
    $actualizarTaller = mysqli_query($conexion, "UPDATE producto SET NOMBRE_PRODUCTO='$producto', VALOR_UNITARIO='$valor', STOCK='$stock', COMPLEMENTO='$complemento' WHERE ID_PRODUCTO = '$id'");
    $actualizarTallerH = mysqli_query($conexion, "UPDATE producto_historico SET NOMBRE_PRODUCTO='$producto', VALOR_UNITARIO='$valor', STOCK='$stock', COMPLEMENTO='$complemento' WHERE ID_PRODUCTO = '$id'");
} else {
    $nuevaImagen = addslashes(file_get_contents($_FILES['ImagenA']['tmp_name']));
    $actualizarTaller = mysqli_query($conexion, "UPDATE producto SET NOMBRE_PRODUCTO='$producto', VALOR_UNITARIO='$valor', STOCK='$stock', COMPLEMENTO='$complemento', IMAGEN='$nuevaImagen' WHERE ID_PRODUCTO = '$id'");
    $actualizarTallerH = mysqli_query($conexion, "UPDATE producto_historico SET NOMBRE_PRODUCTO='$producto', VALOR_UNITARIO='$valor', STOCK='$stock', COMPLEMENTO='$complemento', IMAGEN='$nuevaImagen' WHERE ID_PRODUCTO = '$id'");
}

header('location: /listar_productos.php');

?>