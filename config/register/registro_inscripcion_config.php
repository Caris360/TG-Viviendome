<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
setlocale(LC_ALL, 'es_CO');
date_default_timezone_set('America/Bogota');
$idCliente = $_POST['Documento'];
$fechaInscripcion = date('Y-m-d');
$tipoInscripcion = $_POST['SeleccionarServicio'];

switch ($tipoInscripcion) {
    case '2':
        $idTaller =  $_POST['SeleccionarTaller'];
        $precio = $_POST['ValorTaller'];
        $valor = convertirFormato($precio);
        $tipo = "Ta";
        $idGrupo = "0";
        break;
    case '3':
        $idGrupo = $_POST['SeleccionarGrupo'];
        $precio = $_POST['ValorGrupo'];
        $valor = convertirFormato($precio);
        $tipo = "Gr";
        $idTaller = "0";
        break;
}
if ($tipo == "Gr") {
    $validarGrupo = mysqli_query($conexion, "SELECT * FROM INSCRIPCIONES WHERE FECHA_INSCRIPCION = '$fechaInscripcion' AND IDENTIFICACION_CLIENTE = '$idCliente' AND GRUPO_ID ='$idGrupo'");
    if ($validarGrupo->num_rows == 1) {
        echo "<script>alert('¡Cliente ya inscrito en ese servicio!'); window.location='/registro_inscripciones.php'; </script>";
    } else {
        $insertar = mysqli_query($conexion, "INSERT INTO inscripciones (IDENTIFICACION_CLIENTE, GRUPO_ID, TALLER_ID, VALOR, FECHA_INSCRIPCION, ESTADO_INSCRIPCION, TIPO_INSCRIPCION) VALUES ('$idCliente', '$idGrupo', '$idTaller', '$valor', '$fechaInscripcion', 'Debe', '$tipo')");
        echo "<script>alert('¡Inscripción realizada!'); window.location='/registro_inscripciones.php'; </script>";
    }
}

if ($tipo == "Ta") {
    $validarTaller = mysqli_query($conexion, "SELECT * FROM INSCRIPCIONES WHERE FECHA_INSCRIPCION = '$fechaInscripcion' AND IDENTIFICACION_CLIENTE = '$idCliente' AND TALLER_ID ='$idTaller'");
    if ($validarTaller->num_rows == 1) {
        echo "<script>alert('¡Cliente ya inscrito en ese servicio!'); window.location='/registro_inscripciones.php'; </script>";
    } else {
        $insertar = mysqli_query($conexion, "INSERT INTO inscripciones (IDENTIFICACION_CLIENTE, GRUPO_ID, TALLER_ID, VALOR, FECHA_INSCRIPCION, ESTADO_INSCRIPCION, TIPO_INSCRIPCION) VALUES ('$idCliente', '$idGrupo', '$idTaller', '$valor', '$fechaInscripcion', 'Debe', '$tipo')");
        echo "<script>alert('¡Inscripción realizada!'); window.location='/registro_inscripciones.php'; </script>";
    }
}

function convertirFormato($valor){
    return str_replace(array("$", ".", ","), "", $valor);
  }

?>