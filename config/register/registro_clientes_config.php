<?php

include('/xampp/htdocs/ViviendomeCoaching/template/head.php');
require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$TipoDocumento = $_POST['TipoDocumento'];
$Documento = $_POST['Documento'];
$nombre = $_POST['NombreCliente'];
$Direccion = $_POST['Direccion'];
$Contacto = $_POST['Contacto'];
$Correo = $_POST['Correo'];
$Tipo = '';

$NombreCliente = ucwords($nombre);

$validaCliente = mysqli_query($conexion, "SELECT * FROM cliente WHERE IDENTIFICACION_CLIENTE = '$Documento'");

if ($validaCliente->num_rows == 1) {
    echo "<script>alert('Ya existe un cliente con el documento: $Documento'); window.location='/registro_clientes.php'; </script>";
} else {

    if (strlen($Documento) < 7) {
        echo "<script>alert('El Documento $Documento no cuenta con un formato adecuado'); window.location='/registro_clientes.php'; </script>";
    }

    switch ($TipoDocumento) {
        case '2':
            $Tipo = 'Cédula Ciudadanía';
            break;
        case '3':
            $Tipo = 'Cédula Extranjería';
            break;
        case '4':
            $Tipo = 'Tarjeta Identidad';
            break;
        /*case '5':
            $Tipo = 'Pasaporte';
            break;*/
    }
    $insertar = mysqli_query($conexion, "INSERT INTO cliente VALUES ('$Documento', '$Tipo', '$NombreCliente', '$Direccion', '$Contacto', '$Correo')");
    $insertarHistorico = mysqli_query($conexion, "INSERT INTO cliente_historico VALUES ('$Documento', '$Tipo', '$NombreCliente', '$Direccion', '$Contacto', '$Correo')");
    echo "<script>alert('¡Cliente registrado!'); window.location='/registro_clientes.php'; </script>";
}

?>