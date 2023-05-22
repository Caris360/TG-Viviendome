
<?php


include('conexion_config.php');
$Consulta = $_POST['Consulta'];

switch ($Consulta) {
    case '1':
        $query = "SELECT c.NOMBRE_PUBLICO, COALESCE(g.NOMBRE_GRUPO, 'N/A') NOMBRE_GRUPO, COALESCE(t.NOMBRE_TALLER, 'N/A') NOMBRE_TALLER, i.VALOR, i.FECHA_INSCRIPCION, i.ESTADO_INSCRIPCION FROM inscripciones i INNER JOIN cliente c ON i.IDENTIFICACION_CLIENTE = c.IDENTIFICACION_CLIENTE LEFT JOIN grupo g ON i.GRUPO_ID = g.ID_GRUPO LEFT JOIN taller t ON i.TALLER_ID = t.ID_TALLER WHERE i.ESTADO_INSCRIPCION = 'Pago'";
        $resultado = mysqli_query($conexion, $query);
        if ($resultado) {
            while ($data = mysqli_fetch_assoc($resultado)) {
                $arreglo['data'][] = $data;
            }
            echo json_encode($arreglo);
        }
        break;

    case '2':
        $query = "SELECT c.NOMBRE_PUBLICO, COALESCE(g.NOMBRE_GRUPO, 'N/A') NOMBRE_GRUPO, COALESCE(t.NOMBRE_TALLER, 'N/A') NOMBRE_TALLER, i.VALOR, i.FECHA_INSCRIPCION, i.ESTADO_INSCRIPCION FROM inscripciones i INNER JOIN cliente c ON i.IDENTIFICACION_CLIENTE = c.IDENTIFICACION_CLIENTE LEFT JOIN grupo g ON i.GRUPO_ID = g.ID_GRUPO LEFT JOIN taller t ON i.TALLER_ID = t.ID_TALLER WHERE i.ESTADO_INSCRIPCION = 'Debe'";
        $resultado = mysqli_query($conexion, $query);
        if ($resultado) {
            while ($data = mysqli_fetch_assoc($resultado)) {
                $arreglo['data'][] = $data;
            }
            echo json_encode($arreglo);
        }
        break;
    case '3':
        $query = "SELECT c.NOMBRE_PUBLICO, COALESCE(g.NOMBRE_GRUPO, 'N/A') NOMBRE_GRUPO, COALESCE(t.NOMBRE_TALLER, 'N/A') NOMBRE_TALLER, i.VALOR, i.FECHA_INSCRIPCION, i.ESTADO_INSCRIPCION FROM inscripciones i INNER JOIN cliente c ON i.IDENTIFICACION_CLIENTE = c.IDENTIFICACION_CLIENTE LEFT JOIN grupo g ON i.GRUPO_ID = g.ID_GRUPO LEFT JOIN taller t ON i.TALLER_ID = t.ID_TALLER";
        $resultado = mysqli_query($conexion, $query);
        if ($resultado) {
            while ($data = mysqli_fetch_assoc($resultado)) {
                $arreglo['data'][] = $data;
            }
            echo json_encode($arreglo);
        }
        break;
}





?>