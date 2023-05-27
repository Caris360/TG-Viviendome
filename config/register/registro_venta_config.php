<?php

include('/xampp/htdocs/ViviendomeCoaching/config/functions/funciones.php');
require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$idFactura = $_POST['id_sesion'];
$valorTotal = $_POST['valorTotal'];
$fechaActual = date('YYYY-mm-dd');

$valor = convertirFormato($valorTotal);
$productos = validarCarrito();

$validarVenta = mysqli_query($conexion, "SELECT * FROM factura WHERE ID_FACTURA = '$idFactura'");


$insertarVemta = mysqli_query($conexion, "INSERT INTO factura (ID_FACTURA, VALOR_TOTAL, FECHA_FACTURA) VALUES ('$idFactura','$valor','$fechaActual ')");

$sql = mysqli_query($conexion, "SELECT ID_PRODUCTO, STOCK, CANTIDAD FROM PRODUCTO INNER JOIN CARRITO ON PRODUCTO.ID_PRODUCTO = CARRITO.PRODUCTO_ID WHERE CARRITO.ID_SESION = '$idFactura'");
$row = array();

$cantidad = mysqli_fetch_array($sql);

while ($row = mysqli_fetch_array($sql)) {
    $rows[] = $row;
}
foreach ($rows as $productos) {
    $nuevoStock = $cantidad[1] -  $cantidad[2];
    $actualizaProducto = mysqli_query($conexion, "UPDATE producto SET STOCK='$nuevoStock' WHERE ID_PRODUCTO = '$cantidad[0]'");
    $actualizaProducto = mysqli_query($conexion, "UPDATE producto_historico SET STOCK='$nuevoStock' WHERE ID_PRODUCTO = '$cantidad[0]'");
}

echo "<script>alert('¡Factura registrada con éxito!'); window.location='/carrito.php'; session_destroy();</script>";



/*if ($validarVenta->num_rows == 1) {
    echo "<script>alert('Ya existe la factura: $idFactura'); window.location='/carrito.php'; </script>";
} else {
    $insertarVemta = mysqli_query($conexion, "INSERT INTO factura (ID_FACTURA, VALOR_TOTAL, FECHA_FACTURA) VALUES ('$idFactura','$valor','$fechaActual ')");

    $sql = mysqli_query($conexion, "SELECT ID_PRODUCTO, CANTIDAD FROM PRODUCTO INNER JOIN CARRITO ON PRODUCTO.ID_PRODUCTO = CARRITO.PRODUCTO_ID WHERE CARRITO.ID_SESION = '$idFactura'");
    $row = array();
    while ($row = mysqli_fetch_array($sql)) {
        $rows[] = $row;
    }
    foreach ($rows as $productos) {
        $nuevoStock = $productos['STOCK'] -  $rows[1];
        $actualizaProducto = mysqli_query($conexion, "UPDATE producto SET STOCK='$nuevoStock' WHERE ID_PRODUCTO = '$rows[0]'");
        $actualizaProducto = mysqli_query($conexion, "UPDATE producto_historico SET STOCK='$nuevoStock' WHERE ID_PRODUCTO = '$rows[0]'");
    }

    echo "<script>alert('¡Factura registrada con éxito!'); window.location='/carrito.php'; session_destroy();</script>";
}*/
?>