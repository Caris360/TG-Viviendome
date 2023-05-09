<?php

function InsertarPago($IdCliente, $IdInscripcion, $TipoInscripcion, $PagoMetodo, $ValorReal, $ValorPagoContable, $Cambio, $ValorRestante, $fechaPagoContable, $ValorUltimoPago, $fechaUltimoPago)
{

    include('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
    $sentencia =  mysqli_prepare($conexion, "INSERT INTO pagos(IDENTIFICACION_CLIENTE, INSCRIPCION_ID,TIPO_SERVICIO,METODO_PAGO, VALOR_ORIGINAL, VALOR_PAGO_CONTABLE, VALOR_CAMBIO, VALOR_PENDIENTE, FECHA_CONTABLE, VALOR_ULTIMO_PAGO, FECHA_ULTIMO_PAGO) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $sentencia->bind_param("sssssssssss", $IdCliente, $IdInscripcion, $TipoInscripcion, $PagoMetodo, $ValorReal, $ValorPagoContable, $Cambio , $ValorRestante, $fechaPagoContable, $ValorUltimoPago, $fechaUltimoPago);

    return $sentencia->execute();
}


function InsertarPagoHistorico($IdCliente, $IdInscripcion, $TipoInscripcion, $PagoMetodo, $ValorPagoContable, $fechaPagoContable)
{

    include('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
    $sentencia =  mysqli_prepare($conexion, "INSERT INTO pagos_historico (IDENTIFICACION_CLIENTE, TIPO_SERVICIO, ID_SERVICIO, METODO_PAGO, VALOR_PAGO, FECHA_PAGO) VALUES (?,?,?,?,?,?)");
    $sentencia->bind_param("ssssss", $IdCliente, $TipoInscripcion, $IdInscripcion, $PagoMetodo,  $ValorPagoContable, $fechaPagoContable);

    return $sentencia->execute();
}

function ActualizarInscripcion($EstadoInscripcion, $IdInscripcion, $IdCliente)
{

    include('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
    $sentencia =  mysqli_prepare($conexion, "UPDATE inscripciones SET ESTADO_INSCRIPCION=? WHERE ID_INSCRIPCION=? AND IDENTIFICACION_CLIENTE = ?");
    $sentencia->bind_param("sss", $EstadoInscripcion, $IdInscripcion, $IdCliente);

    return $sentencia->execute();
}

function ActualizarPagoClase( $IdInscripcion, $IdCliente, $ValorUltimoPago , $fechaUltimoPago, $ValorPendiente, $ValorCambio)
{

    include('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
    $sentencia =  mysqli_prepare($conexion, "UPDATE pagos SET  VALOR_ULTIMO_PAGO = ?, FECHA_ULTIMO_PAGO = ?, VALOR_PENDIENTE = ?, VALOR_CAMBIO = ?  WHERE INSCRIPCION_ID=? AND IDENTIFICACION_CLIENTE = ?");
    $sentencia->bind_param("ssssss",  $ValorUltimoPago , $fechaUltimoPago,  $ValorPendiente, $ValorCambio, $IdInscripcion, $IdCliente);

    return $sentencia->execute();
}

function convertirFormato($valor)
{
    return str_replace(array("$", ".", ","), "", $valor);
}
