<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
setlocale(LC_ALL, 'es_CO');
date_default_timezone_set('America/Bogota');
$idCliente = $_POST['Documento'];
$Servicio = $_POST['Servicio'];
$TipoServicio = $_POST['TipoServicio'];
$ValorOriginal = $_POST['ValorOriginal'];
$MetodoPago = $_POST['MetodoPago'];
$ValorPago = $_POST['ValorPago'];
$fechaPago = date('Y-m-d');
$ValorCambio = 0;
$ValorPendiente = 0;
$estadoIns = 'Debe';

$validaPago = mysqli_query($conexion, "SELECT * FROM PAGO WHERE IDENTIFICACION_CLIENTE = '$idCliente' AND INSCRIPCION_ID ='$Servicio'");

if ($validaPago->num_rows != 1) {

    if ($MetodoPago == 'Efectivo') {
        if($ValorPago == $ValorOriginal){
            $estadoIns = 'Pago';
        }
        if ($ValorPago <= $ValorOriginal) {
            $ValorPendiente = $ValorOriginal - $ValorPago;
        }
        if ($ValorPago >= $ValorOriginal) {
            $ValorCambio = $ValorPago - $ValorOriginal;
        }      

    }else{
        $estadoIns = 'Pago';
    } 

    $sql = mysqli_query($conexion, "INSERT INTO pagos('IDENTIFICACION_CLIENTE', 'INSCRIPCION_ID','METODO_PAGO', 'VALOR_ORIGINAL', 'VALOR_PAGO_CONTABLE', 'VALOR_CAMBIO', 'VALOR_PENDIENTE', 'FECHA_CONTABLE', 'VALOR_ULTIMO_PAGO', 'FECHA_ULTIMO_PAGO') VALUES ('$idCliente','$Servicio','$MetodoPago','$ValorOriginal','$ValorPago','$ValorCambio','$ValorPendiente','$fechaPago','$ValorPago','$fechaPago')");
    $insertHistorico = mysqli_query($conexion, "INSERT INTO pagos_historico ('IDENTIFICACION_CLIENTE', 'TIPO_SERVICIO', 'ID_SERVICIO', 'METODO_PAGO', 'VALOR_PAGO', 'FECHA_PAGO') VALUES ('$idCliente','$TipoServicio','$Servicio','$MetodoPago','$ValorPago','$fechaPago')");

    $valorClase = mysqli_query($conexion, "SELECT COALESCE(sum(C.VALOR), 0) VALOR_CLASES FROM INSCRIPCIONES I LEFT JOIN GRUPO G ON G.ID_GRUPO = I.GRUPO_ID LEFT JOIN CLASE C ON C.GRUPO_ID = G.ID_GRUPO WHERE I.ESTADO_INSCRIPCION = 'Debe' AND I.IDENTIFICACION_CLIENTE = '$idCliente' AND I.GRUPO_ID <> 0 AND ID_INSCRIPCION = '$TipoServicio' GROUP BY I.IDENTIFICACION_CLIENTE, NOMBRE_GRUPO");
    $resultVC = mysqli_fetch_array($valorClase);

    // Se espera validar si el tipo de servicio es una clase, no se vaya a alterar la inscripción de grupos

    if($estadoIns == 'Pago'){
        $insertHistorico = mysqli_query($conexion,"UPDATE inscripciones SET 'ESTADO_INSCRIPCION'='$estadoIns' WHERE 'ID_INSCRIPCION'='$Servicio'");
    }


}else {

    $consultaValor = mysqli_query($conexion, "SELECT VALOR_ORIGINAL, VALOR_PAGO_CONTABLE FROM pagos WHERE IDENTIFICACION_CLIENTE = '$idCliente' AND INSCRIPCION_ID = '$Servicio' AND VALOR_PENDIENTE <>0 ");
    $resultado = mysqli_fetch_array($consultaValor);
    if ($resultado[0] == $ValorPago) {
        $actualizarPago = mysqli_query($conexion, "UPDATE pagos SET 'VALOR_PENDIENTE'='0','VALOR_ULTIMO_PAGO'='$ValorPago','FECHA_ULTIMO_PAGO'='$fechaPago' WHERE IDENTIFICACION_CLIENTE = '$idCliente' AND INSCRIPCION_ID = '$Servicio' ");
    } else {
        $valorPendiente = $resultado[1] - $ValorPago;
        $actualizarPago = mysqli_query($conexion, "UPDATE pagos SET 'VALOR_PENDIENTE'='$valorPendiente','VALOR_ULTIMO_PAGO'='$ValorPago','FECHA_ULTIMO_PAGO'='$fechaPago' WHERE IDENTIFICACION_CLIENTE = '$idCliente' AND INSCRIPCION_ID = '$Servicio' ");
    }

    echo "<script>alert('¡Cliente registrado!'); window.location='/registro_clientes.php'; </script>";
}


        /*IDENTIFICACION_CLIENTE - idCliente
    INSCRIPCION_ID - $Servicio','
    METODO_PAGO - $MetodoPago','
    VALOR_ORIGINAL - $ValorOriginal',
    VALOR_PAGO_CONTABLE - '$ValorPago','
    VALOR_CAMBIO - ValorCambio
    VALOR_PENDIENTE - ValorPendiente
    FECHA_CONTABLE - $fechaPago',
    VALOR_ULTIMO_PAGO - '$ValorPago','
    FECHA_ULTIMO_PAGO - $fechaPago'
    */
