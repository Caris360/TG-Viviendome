<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$nombreTaller = $_POST['NombreTaller'];
$valor = $_POST['ValorTaller'];
$fecha =  $_POST['Fecha'];
$horaInicial = $_POST['HoraInicial'];
$horaFinal = $_POST['HoraFinal'];


$horario = $horaInicial . " - " . $horaFinal;

$validarTaller = mysqli_query($conexion, "SELECT * FROM taller WHERE FECHA_TALLER = '$fecha' and HORA = '$horario'");

if ($validarTaller->num_rows == 1) {
    echo "<script>alert('Ya existe un taller en ese horario'); window.location='/registro_talleres.php'; </script>";
} else {
    $insertar = mysqli_query($conexion, "INSERT INTO taller (NOMBRE_TALLER, VALOR, FECHA_TALLER, HORA) VALUES ('$nombreTaller', '$valor', '$fecha', '$horario')");
    $insertarH = mysqli_query($conexion, "INSERT INTO taller_historico (NOMBRE_TALLER, VALOR, FECHA_TALLER, HORA) VALUES ('$nombreTaller', '$valor', '$fecha', '$horario')");
    echo "<script>alert('¡Taller registrado con éxito!'); window.location='/registro_talleres.php'; </script>";
}

?>