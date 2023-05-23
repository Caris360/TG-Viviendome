
<?php
include('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

if (!isset($_POST["id_producto"])) {
    exit("No hay id_producto");
}
$idProducto = $_POST["id_producto"];


iniciarSesionSiNoEstaIniciada();
$idSesion = session_id();
$sentencia = mysqli_query($conexion, "DELETE FROM CARRITO WHERE ID_SESION = '$idSesion' AND PRODUCTO_ID = $idProducto");
header("Location: /carrito.php");

