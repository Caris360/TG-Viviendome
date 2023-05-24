
<?php
include('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
include('funciones.php');

$idProducto = $_POST["id_producto"];

//$sentencia = mysqli_query($conexion, "DELETE FROM CARRITO WHERE PRODUCTO_ID = $idProducto");
//header("Location: /carrito.php");
echo "<script>alert('Producto retirado' $idProducto); window.location='/carrito.php'; </script>";
?>