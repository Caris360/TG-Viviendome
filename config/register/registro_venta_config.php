<?php

include('/xampp/htdocs/ViviendomeCoaching/config/functions/funciones.php');
require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

setlocale(LC_ALL, 'es_CO');
date_default_timezone_set('America/Bogota');

$idFactura = $_POST['id_sesion'];
$valorTotal = $_POST['valorTotal'];
$fechaActual = date('Y-m-d');

$valor = convertirFormato($valorTotal);

$validarVenta = mysqli_query($conexion, "SELECT * FROM factura WHERE ID_FACTURA = '$idFactura'");

$insertarVenta = mysqli_query($conexion, "INSERT INTO factura (ID_FACTURA, VALOR_TOTAL, FECHA_FACTURA) VALUES ('$idFactura','$valor','$fechaActual ')");


$sql = mysqli_query($conexion, "SELECT ID_PRODUCTO, STOCK, CANTIDAD FROM PRODUCTO INNER JOIN CARRITO ON PRODUCTO.ID_PRODUCTO = CARRITO.PRODUCTO_ID WHERE CARRITO.ID_SESION = '$idFactura'");

while ($cantidad = mysqli_fetch_array($sql)) {
    $nuevoStock = intval($cantidad['STOCK']) -  intval($cantidad['CANTIDAD']);
    $cantidadFactura = intval($cantidad['CANTIDAD']);
    $actualizaProducto = mysqli_query($conexion, "UPDATE producto SET STOCK='$nuevoStock' WHERE ID_PRODUCTO = '$cantidad[0]'");
    $actualizaProducto = mysqli_query($conexion, "UPDATE producto_historico SET STOCK='$nuevoStock' WHERE ID_PRODUCTO = '$cantidad[0]'");
    $detalleFactura = mysqli_query($conexion, "INSERT INTO detalle_factura (ID_FACTURA, PRODUCT_ID, NOMBRE_PRODUCTO, CANTIDAD) VALUES ('$idFactura','$cantidad[0]', (SELECT NOMBRE_PRODUCTO FROM PRODUCTO WHERE ID_PRODUCTO = '$cantidad[0]') , $cantidadFactura)");
}

$BorrarCarrito = mysqli_query($conexion, "DELETE FROM CARRITO");
session_start();
session_regenerate_id();
echo "<script>alert('¡Factura registrada con éxito!'); window.location='/tienda_virtual.php' </script>";

?>