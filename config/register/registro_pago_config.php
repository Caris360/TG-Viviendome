<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
include('/xampp/htdocs/ViviendomeCoaching/config/functions/funciones.php');

setlocale(LC_ALL, 'es_CO');
date_default_timezone_set('America/Bogota');

$idCliente = $_POST['DocumentoCliente'];
$Servicio = $_POST['IDInscripcionDetalle'];
$TipoServicio = $_POST['TipoServicioDetalle'];
$ValorOriginal = $_POST['ValorOriginalDetalle'];
$MetodoPago = $_POST['MetodoPagoDetalle'];
$Pago = $_POST['ValorPago'];
$fechaPago = date('Y-m-d');
$ValorCambio = 0;
$ValorPendiente = 0;
$estadoIns = 'Debe';
$ValorPago = convertirFormato($Pago);

$validaPago = mysqli_query($conexion, "SELECT * FROM PAGOS WHERE IDENTIFICACION_CLIENTE = '$idCliente' AND INSCRIPCION_ID ='$Servicio'");

// INSERTA NUEVO REGISTRO EN PAGO
if ($validaPago->num_rows != 1) {

    if ($MetodoPago == 'Efectivo' || $MetodoPago == 'Transferencia') {
        if ($ValorPago == $ValorOriginal || $ValorPago >= $ValorOriginal) {
            $ValorCambio = intval($ValorPago) - intval($ValorOriginal);
            $estadoIns = 'Pago';
        }
        if ($ValorPago <= $ValorOriginal) {
            $ValorPendiente = intval($ValorOriginal) - intval($ValorPago);
        }
    }

    if ($TipoServicio == 'Grupo') {
        InsertarPago($idCliente, $Servicio, $TipoServicio, $MetodoPago, $ValorOriginal, $ValorPago, $ValorCambio, $ValorPendiente, $fechaPago, $ValorPago, $fechaPago);
        InsertarPagoHistorico($idCliente, $Servicio, $TipoServicio, $MetodoPago, $ValorPago, $fechaPago);
        echo "<script>alert('Pago Realizado'); window.location='/gestion_pagos.php'</script>";
        if ($estadoIns == 'Pago') {
            ActualizarInscripcion($estadoIns, $Servicio, $idCliente);
            echo "<script>alert('Pago Realizado'); window.location='/gestion_pagos.php'</script>";
        }
    }

    if ($TipoServicio == 'Taller') {
        InsertarPago($idCliente, $Servicio, $TipoServicio, $MetodoPago, $ValorOriginal, $ValorPago, $ValorCambio, $ValorPendiente, $fechaPago, $ValorPago, $fechaPago);
        InsertarPagoHistorico($idCliente, $Servicio, $TipoServicio, $MetodoPago, $ValorPago, $fechaPago);
        echo "<script>alert('Pago Realizado'); window.location='/gestion_pagos.php'</script>";

        if ($estadoIns == 'Pago') {
            ActualizarInscripcion($estadoIns, $Servicio, $idCliente);
            echo "<script>alert('Pago Realizado'); window.location='/gestion_pagos.php'</script>";
        }
    }

    // YA EXISTEN REGISTROS EN PAGOS Ó ACTUALIZA UN REGISTRO
} else {

    $validaDeuda = mysqli_query($conexion, "SELECT VALOR_PENDIENTE FROM PAGOS WHERE IDENTIFICACION_CLIENTE = '$idCliente' AND INSCRIPCION_ID ='$Servicio'");
    $valorDeuda = mysqli_fetch_array($validaDeuda);

    if ($MetodoPago == 'Efectivo' || $MetodoPago == 'Transferencia') {
        if ($ValorPago == $valorDeuda[0] || $ValorPago >= $valorDeuda[0]) {
            $ValorCambio = intval($ValorPago) - intval($valorDeuda[0]);
            $estadoIns = 'Pago';
        }
        if ($ValorPago <= $valorDeuda[0]) {
            $ValorPendiente = intval($valorDeuda[0]) - intval($ValorPago);
        }
    }

    if ($TipoServicio == 'Grupo') {
        ActualizarPago($Servicio, $idCliente, $ValorPago, $fechaPago, $ValorPendiente, $ValorCambio);
        InsertarPagoHistorico($idCliente, $Servicio, $TipoServicio, $MetodoPago, $ValorPago, $fechaPago);
        echo "<script>alert('Pago Realizado'); window.location='/gestion_pagos.php'</script>";
        if ($estadoIns == 'Pago') {
            ActualizarInscripcion($estadoIns, $Servicio, $idCliente);
            echo "<script>alert('Pago Realizado'); window.location='/gestion_pagos.php'</script>";
        }
    }

    if ($TipoServicio == 'Taller') {
        ActualizarPago($Servicio, $idCliente, $ValorPago, $fechaPago, $ValorPendiente, $ValorCambio);
        InsertarPagoHistorico($idCliente, $Servicio, $TipoServicio, $MetodoPago, $ValorPago, $fechaPago);
        echo "<script>alert('Pago Realizado'); window.location='/gestion_pagos.php'</script>";

        if ($estadoIns == 'Pago') {
            ActualizarInscripcion($estadoIns, $Servicio, $idCliente);
            echo "<script>alert('Pago Realizado'); window.location='/gestion_pagos.php'</script>";
        }
    }
}
