<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$Documento = $_POST['Documento'];
$nombre = $_POST['NombreCliente'];
$Direccion = $_POST['Direccion'];
$Contacto = $_POST['Contacto'];
$Correo = $_POST['Correo'];

$NombreCliente = ucwords($nombre);

$actualizarCliente = mysqli_query($conexion, "UPDATE cliente SET NOMBRE_PUBLICO = '$NombreCliente',DIRECCION = '$Direccion', NUMERO_CONTACTO ='$Contacto',CORREO = '$Correo' WHERE IDENTIFICACION_CLIENTE = '$Documento'");
$actualizarClienteH = mysqli_query($conexion, "UPDATE cliente_historico SET NOMBRE_PUBLICO = '$NombreCliente',DIRECCION = '$Direccion', NUMERO_CONTACTO ='$Contacto',CORREO = '$Correo' WHERE IDENTIFICACION_CLIENTE = '$Documento'");

header('location: /listar_clientes.php');

?>