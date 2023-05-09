<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
include('/xampp/htdocs/ViviendomeCoaching/config/functions/funciones.php');
setlocale(LC_ALL, 'es_CO');
date_default_timezone_set('America/Bogota');
$idCliente = $_POST['IDCliente'];
$Servicio = $_POST['Servicio'];
$TipoServicio = $_POST['TipoServicio'];
$ValorOriginal = $_POST['ValorOriginal'];
$MetodoPago = $_POST['MetodoPago'];
$Pago = $_POST['ValorPago'];
$fechaPago = date('Y-m-d');
$ValorCambio = 0;
$ValorPendiente = 0;
$estadoIns = 'Debe';
$ValorPago = convertirFormato($Pago);

$validaPago = mysqli_query($conexion, "SELECT * FROM PAGOS WHERE IDENTIFICACION_CLIENTE = '$idCliente' AND INSCRIPCION_ID ='$Servicio'");

if ($validaPago->num_rows != 1) {

    if ($MetodoPago == 'Efectivo' || $MetodoPago == 'Transferencia') {
        if ($ValorPago == $ValorOriginal || $ValorPago >= $ValorOriginal) {
            $ValorCambio = $ValorPago - $ValorOriginal;
            $estadoIns = 'Pago';
        }
        if ($ValorPago <= $ValorOriginal) {
            $ValorPendiente = $ValorOriginal - $ValorPago;
        }
    }

    if ($TipoServicio == 'Grupo') {
        InsertarPago($idCliente, $Servicio, $TipoServicio, $MetodoPago, $ValorOriginal, $ValorPago, $ValorCambio, $ValorPendiente, $fechaPago, $ValorPago, $fechaPago);
        InsertarPagoHistorico($idCliente, $Servicio, $TipoServicio, $MetodoPago, $ValorPago, $fechaPago);
        echo "<script>alert('Pago Realizado'); window.location='/gestion_pagos.php'</script>";
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

} else {

    if ($TipoServicio == 'Clase') {
        $validaGrupoClase = mysqli_query($conexion, "SELECT * FROM pagos WHERE TIPO_SERVICIO = 'Grupo' AND IDENTIFICACION_CLIENTE = '$idCliente' AND INSCRIPCION_ID = '$Servicio' AND VALOR_PENDIENTE = 0");
        if ($MetodoPago == 'Efectivo' || $MetodoPago == 'Transferencia') {
            if ($ValorPago == $ValorOriginal || $ValorPago >= $ValorOriginal) {
                $ValorCambio = $ValorPago - $ValorOriginal;
                $estadoIns = 'Pago';
            }
            if ($ValorPago <= $ValorOriginal) {
                $ValorPendiente = $ValorOriginal - $ValorPago;
            }
        }
        if ($validaGrupoClase->num_rows == 1) {
            ActualizarPagoClase($Servicio, $idCliente, $ValorPago, $fechaPago, $ValorPendiente, $ValorCambio);
            ActualizarInscripcion($estadoIns, $Servicio, $idCliente);
            //InsertarPago($idCliente, $Servicio, $TipoServicio, $MetodoPago, $ValorOriginal, $ValorPago, $ValorCambio, $ValorPendiente, $fechaPago, $ValorPago, $fechaPago);
            InsertarPagoHistorico($idCliente, $Servicio, $TipoServicio, $MetodoPago, $ValorPago, $fechaPago);
            echo "<script>alert('Pago Realizado'); window.location='/gestion_pagos.php'</script>";
        } else {
            echo "<script> alert('Transacción cancelada, no se ha realizado el pago del grupo'); window.location='/gestion_pagos.php'  </script>";
        }
    }
}
?>