<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$Documento = $_POST['DocumentoE'];

$eliminarCliente = mysqli_query($conexion, "DELETE FROM CLIENTE WHERE IDENTIFICACION_CLIENTE = '$Documento'");

header('location: /listar_clientes.php');

?>