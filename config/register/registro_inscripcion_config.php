<?php

include('/xampp/htdocs/ViviendomeCoaching/config/functions/funciones.php');
require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

setlocale(LC_ALL, 'es_CO');
date_default_timezone_set('America/Bogota');

$idCliente = $_POST['Documento'];
$fechaInscripcion = date('Y-m-d');
$tipoInscripcion = $_POST['SeleccionarServicio'];
$idGrupo = "0";
$idTaller = "0";

switch ($tipoInscripcion) {
    case '2':
        $idTaller =  $_POST['SeleccionarTaller'];
        $precio = $_POST['ValorTaller'];
        $valor = convertirFormato($precio);
        $tipo = "Taller";      
        break;
    case '3':
        $idGrupo = $_POST['SeleccionarGrupo'];
        $precio = $_POST['ValorGrupo'];
        $valor = convertirFormato($precio);
        $tipo = "Grupo";     
        break;
    default:
    echo "<script>alert('¡Selecciona la totalidad de campos!'); window.location='/registro_inscripciones.php'; </script>";
        break;
}

if ($tipo == "Grupo") {
    $validarGrupo = mysqli_query($conexion, "SELECT * FROM inscripciones WHERE IDENTIFICACION_CLIENTE = '$idCliente' AND GRUPO_ID = '$idGrupo'");
    if ($validarGrupo->num_rows >= 1) {
        echo "<script>alert('¡Cliente ya inscrito en ese servicio!'); window.location='/registro_inscripciones.php'; </script>";
    } else {
        $insertar = mysqli_query($conexion, "INSERT INTO inscripciones (IDENTIFICACION_CLIENTE, GRUPO_ID, TALLER_ID, VALOR, FECHA_INSCRIPCION, ESTADO_INSCRIPCION, TIPO_INSCRIPCION) VALUES ('$idCliente', '$idGrupo', '$idTaller', '$valor', '$fechaInscripcion', 'Debe', '$tipo')");
        echo "<script>alert('¡Inscripción realizada!'); window.location='/registro_inscripciones.php'; </script>";
    }
}

if ($tipo == "Taller") {
    $validarTaller = mysqli_query($conexion, "SELECT * FROM inscripciones WHERE IDENTIFICACION_CLIENTE = '$idCliente' AND TALLER_ID = '$idTaller'");
    if ($validarTaller->num_rows >= 1) {
        echo "<script>alert('¡Cliente ya inscrito en ese servicio!'); window.location='/registro_inscripciones.php'; </script>";
    } else {
        $insertar = mysqli_query($conexion, "INSERT INTO inscripciones (IDENTIFICACION_CLIENTE, GRUPO_ID, TALLER_ID, VALOR, FECHA_INSCRIPCION, ESTADO_INSCRIPCION, TIPO_INSCRIPCION) VALUES ('$idCliente', '$idGrupo', '$idTaller', '$valor', '$fechaInscripcion', 'Debe', '$tipo')");
        echo "<script>alert('¡Inscripción realizada!'); window.location='/registro_inscripciones.php'; </script>";
    }
}

