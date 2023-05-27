<?php
include('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
include('funciones.php');

$idProducto = $_POST["id_producto"];
$idSesion = $_POST["id_sesion"];

$sentencia = mysqli_query($conexion, "DELETE FROM CARRITO WHERE PRODUCTO_ID = '$idProducto' AND ID_SESION = '$idSesion'");
echo "<script>alert('Producto retirado'); window.location='/carrito.php'; </script>";
?>