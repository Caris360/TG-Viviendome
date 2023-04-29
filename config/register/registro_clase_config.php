<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$idGrupo = $_POST['Grupo'];
$date = $_POST['Fecha'];
$fecha =  $_POST['Fecha'];
$hora = $_POST['Hora'];
$precio = $_POST['ValorClase'];
$valor = convertirFormato($precio);
$validarClase = mysqli_query($conexion, "SELECT * FROM clase WHERE FECHA_CLASE = '$fecha' and HORA = '$hora'");

if ($validarClase->num_rows == 1) {
    echo "<script>alert('Ya existe una clase en ese horario'); window.location='/gestion_clases.php'; </script>";
} else {
    $insertar = mysqli_query($conexion, "INSERT INTO CLASE (GRUPO_ID, FECHA_CLASE, HORA,VALOR) VALUES ('$idGrupo', '$fecha','$hora', '$valor')");
    $insertarH = mysqli_query($conexion, "INSERT INTO CLASE_HISTORICO (GRUPO_ID, FECHA_CLASE, HORA,VALOR) VALUES ('$idGrupo', '$fecha','$hora', '$valor')");
    echo "<script>alert('¡Clase registrada con éxito!'); window.location='/gestion_clases.php'; </script>";
}


function convertirFormato($valor){
    return str_replace(array("$", ".", ","), "", $valor);
  }

?>