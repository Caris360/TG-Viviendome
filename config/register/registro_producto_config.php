<?php

include('/xampp/htdocs/ViviendomeCoaching/config/functions/funciones.php');
require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$producto = $_POST['NombreProducto'];
$nombreProducto = ucfirst($producto);
$valorUnitario = $_POST['ValorUnitario'];
$stock =  $_POST['Stock'];
$complemento = $_POST['Complemento'];
$imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

$valor = convertirFormato($valorUnitario);

$validarProducto = mysqli_query($conexion, "SELECT * FROM producto WHERE NOMBRE_PRODUCTO = '$nombreProducto'");

if ($validarProducto->num_rows == 1) {
    echo "<script>alert('Ya existe el producto: $nombreProducto'); window.location='/registro_productos.php'; </script>";
} else {

    if ($complemento == "" or $complemento == null) {
        $complemento = "N/A";
    }

    $insertar = mysqli_query($conexion, "INSERT INTO producto(NOMBRE_PRODUCTO, VALOR_UNITARIO, STOCK, COMPLEMENTO, IMAGEN) VALUES ('$nombreProducto', '$valor', '$stock', '$complemento' , '$imagen')");
    $insertarH = mysqli_query($conexion, "INSERT INTO producto_historico(NOMBRE_PRODUCTO, VALOR_UNITARIO, STOCK, COMPLEMENTO, IMAGEN) VALUES ('$nombreProducto', '$valor', '$stock', '$complemento', '$imagen')");
    echo "<script>alert('¡Producto registrado con éxito!'); window.location='/registro_productos.php'; </script>";
}

?>