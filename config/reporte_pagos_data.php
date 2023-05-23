<?php

include('conexion_config.php');
$documentoCliente = $_POST['documento'];

$query = "SELECT c.NOMBRE_PUBLICO, COALESCE(g.NOMBRE_GRUPO, 'N/A') NOMBRE_GRUPO, COALESCE(t.NOMBRE_TALLER,'N/A') NOMBRE_TALLER, COALESCE(f.ID_FACTURA,'N/A') FACTURA, COALESCE(p.METODO_PAGO, 'N/A') METODO_PAGO, p.VALOR_ULTIMO_PAGO, p.VALOR_CAMBIO, p.FECHA_ULTIMO_PAGO FROM pagos p INNER JOIN cliente c ON p.IDENTIFICACION_CLIENTE = c.IDENTIFICACION_CLIENTE INNER JOIN inscripciones i ON p.INSCRIPCION_ID = i.ID_INSCRIPCION LEFT JOIN grupo g ON i.GRUPO_ID = g.ID_GRUPO LEFT JOIN taller t ON i.TALLER_ID = t.ID_TALLER LEFT JOIN factura f ON p.FACTURA_ID = f.ID_FACTURA";
$resultado = mysqli_query($conexion, $query);
if ($resultado) {
    while ($data = mysqli_fetch_assoc($resultado)) {
        $arreglo['data'][] = $data;
    }
    echo json_encode($arreglo);
}
mysqli_free_result($resultado);

?>