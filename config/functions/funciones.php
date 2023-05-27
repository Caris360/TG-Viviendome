<?php

function InsertarPago($IdCliente, $IdInscripcion, $TipoInscripcion, $PagoMetodo, $ValorReal, $ValorPagoContable, $Cambio, $ValorRestante, $fechaPagoContable, $ValorUltimoPago, $fechaUltimoPago)
{

    include('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
    $sentencia =  mysqli_prepare($conexion, "INSERT INTO pagos(IDENTIFICACION_CLIENTE, INSCRIPCION_ID,TIPO_SERVICIO,METODO_PAGO, VALOR_ORIGINAL, VALOR_PAGO_CONTABLE, VALOR_CAMBIO, VALOR_PENDIENTE, FECHA_CONTABLE, VALOR_ULTIMO_PAGO, FECHA_ULTIMO_PAGO) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $sentencia->bind_param("sssssssssss", $IdCliente, $IdInscripcion, $TipoInscripcion, $PagoMetodo, $ValorReal, $ValorPagoContable, $Cambio, $ValorRestante, $fechaPagoContable, $ValorUltimoPago, $fechaUltimoPago);

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

function ActualizarPago($IdInscripcion, $IdCliente, $ValorUltimoPago, $fechaUltimoPago, $ValorPendiente, $ValorCambio)
{

    include('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
    $sentencia =  mysqli_prepare($conexion, "UPDATE pagos SET  VALOR_ULTIMO_PAGO = ?, FECHA_ULTIMO_PAGO = ?, VALOR_PENDIENTE = ?, VALOR_CAMBIO = ?  WHERE INSCRIPCION_ID=? AND IDENTIFICACION_CLIENTE = ?");
    $sentencia->bind_param("ssssss",  $ValorUltimoPago, $fechaUltimoPago,  $ValorPendiente, $ValorCambio, $IdInscripcion, $IdCliente);

    return $sentencia->execute();
}

function convertirFormato($valor)
{
    return str_replace(array("$", ".", ","), "", $valor);
}

// Ingresa la info del carrito
function agregarProductoAlCarrito($idProducto)
{
    include('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
    iniciarSesionSiNoEstaIniciada();
    $idSesion = session_id();
    $consultaStock = mysqli_prepare($conexion, "SELECT STOCK FROM producto WHERE ID_PRODUCTO = ? ");
    $consultaStock->execute([$idProducto]);
    $stock = $consultaStock->get_result();
    $consultaCantidad = mysqli_query($conexion, "SELECT * FROM CARRITO WHERE ID_SESION = '$idSesion' AND PRODUCTO_ID = $idProducto");
    if ($consultaCantidad->num_rows > 0) {
        $cantidad = mysqli_fetch_array($consultaCantidad);
        $nuevoStock = $stock->fetch_column(0) - $cantidad[1];
        if ($nuevoStock > 0) {
            mysqli_query($conexion, "UPDATE CARRITO SET CANTIDAD = $cantidad[1]+1 where ID_SESION ='$idSesion' AND PRODUCTO_ID = '$idProducto'");
        }     
    } else {
        $cantidad = 1;
        $sentencia = mysqli_prepare($conexion, "INSERT INTO CARRITO(ID_SESION, CANTIDAD ,PRODUCTO_ID) VALUES (?,?,?)");
        return $sentencia->execute([$idSesion, $cantidad, $idProducto]);
    }
}

// Llena campo al lado del botón.
function obtieneCantidadDeProducto($idProducto)
{
    include('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
    iniciarSesionSiNoEstaIniciada();
    $idSesion = session_id();
    $consultaStock = mysqli_prepare($conexion, "SELECT STOCK FROM producto WHERE ID_PRODUCTO = ? ");
    $consultaStock->execute([$idProducto]);
    $stock = $consultaStock->get_result();
    $consultaCantidad = mysqli_query($conexion, "SELECT CANTIDAD FROM CARRITO WHERE ID_SESION = '$idSesion' AND PRODUCTO_ID = $idProducto");
    if ($consultaCantidad->num_rows > 0) {
        $cantidad = mysqli_fetch_array($consultaCantidad);
        $nuevoStock = $stock->fetch_column(0) - $cantidad[0];
        if ($nuevoStock > 0) {
            return $cantidad[0];      
        }
    } else {
        return '0';
    }
}

// Actualiza stock
function obtieneStockProductos($idProducto)
{
    include('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
    iniciarSesionSiNoEstaIniciada();
    $idSesion = session_id();
    $consultaStock = mysqli_prepare($conexion, "SELECT STOCK FROM producto WHERE ID_PRODUCTO = ? ");
    $consultaStock->execute([$idProducto]);
    $stock = $consultaStock->get_result();
    $consultaCantidad = mysqli_query($conexion, "SELECT CANTIDAD FROM CARRITO WHERE ID_SESION = '$idSesion' AND PRODUCTO_ID = $idProducto");
    if ($consultaCantidad->num_rows > 0) {
        $cantidad = mysqli_fetch_array($consultaCantidad);
        $nuevoStock = $stock->fetch_column(0) - $cantidad[0];
        if ($nuevoStock > 0) {
            return $nuevoStock;
        } else {
            return '0';
        }
    } else {
        return $stock->fetch_column(0);
    }
}

// Compara si existen productos en el carrito para la sesion actual
function validarCarrito()
{
    include('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
    iniciarSesionSiNoEstaIniciada();
    $sentencia = mysqli_prepare($conexion, "SELECT COUNT(*)
     FROM PRODUCTO
     INNER JOIN CARRITO
     ON PRODUCTO.ID_PRODUCTO = CARRITO.PRODUCTO_ID
     WHERE CARRITO.ID_SESION = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    $resultado = $sentencia->get_result();
    return $resultado->fetch_column(0);
}

function obtenerIdsDeProductosEnCarrito()
{
    include('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
    iniciarSesionSiNoEstaIniciada();
    $sentencia = mysqli_prepare($conexion, "SELECT SUM(CANTIDAD) FROM CARRITO WHERE ID_SESION = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    $resultado = $sentencia->get_result();
    return $resultado->fetch_column(0);
}

function obtenerProductosEnCarrito()
{
    include('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
    iniciarSesionSiNoEstaIniciada();
    $sentencia = mysqli_prepare($conexion, "SELECT PRODUCTO.ID_PRODUCTO, PRODUCTO.NOMBRE_PRODUCTO, PRODUCTO.STOCK, PRODUCTO.IMAGEN, PRODUCTO.VALOR_UNITARIO
     FROM PRODUCTO
     INNER JOIN CARRITO
     ON PRODUCTO.ID_PRODUCTO = CARRITO.PRODUCTO_ID
     WHERE CARRITO.ID_SESION = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    $resultado = $sentencia->get_result();
    return $resultado->fetch_array();
}

function iniciarSesionSiNoEstaIniciada()
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

function quitarProductoDelCarrito($idProducto)
{
    include('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');
    iniciarSesionSiNoEstaIniciada();
    $idSesion = session_id();
    $sentencia = mysqli_prepare($conexion, "DELETE FROM CARRITO WHERE ID_SESION = ? AND PRODUCTO_ID = ?");
    return $sentencia->execute([$idSesion, $idProducto]);
}

?>