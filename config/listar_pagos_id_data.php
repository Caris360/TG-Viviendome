<?php

include('conexion_config.php');
$IdCliente = $_POST['IDCliente'];
$tipo = $_POST['TipoInscripcion'];

switch ($tipo) {
    case '1':
        $queryTaller = "SELECT I.ID_INSCRIPCION, T.NOMBRE_TALLER FROM inscripciones I INNER JOIN TALLER T ON T.ID_TALLER = I.TALLER_ID WHERE I.IDENTIFICACION_CLIENTE = '$IdCliente' AND I.ESTADO_INSCRIPCION = 'Debe'";
        $resultado = mysqli_query($conexion, $queryTaller); 
        $bodyhtml ="<label style='font-family: Poppins-Bold;' class='form-label' for='form3Example8'>Seleccione Servicio:</label><select id='SeleccionarServicio' name='SeleccionarServicio' class='form-control form-control-lg' ><option selected disabled>Seleccione uno</option>"  ;  
        while ($datos = mysqli_fetch_array($resultado)) {
            $bodyhtml = $bodyhtml . '<option value='.$datos['ID_INSCRIPCION'].'>'.$datos['NOMBRE_TALLER'].'</option>';
        }   
        echo $bodyhtml."</select>";
        break;

    case '2':
        $queryGrupo = "SELECT I.ID_INSCRIPCION, G.NOMBRE_GRUPO FROM inscripciones I INNER JOIN GRUPO G ON G.ID_GRUPO = I.GRUPO_ID WHERE I.IDENTIFICACION_CLIENTE = '$IdCliente' AND I.ESTADO_INSCRIPCION = 'Debe'";
        $resultado = mysqli_query($conexion, $queryGrupo); 
        $bodyhtml ="<label style='font-family: Poppins-Bold;' class='form-label' for='form3Example8'>Seleccione Servicio:</label><select id='SeleccionarServicio' name='SeleccionarServicio' class='form-control form-control-lg' ><option selected disabled>Seleccione uno</option>"  ;  
        while ($datos = mysqli_fetch_array($resultado)) {
            $bodyhtml = $bodyhtml . '<option value='.$datos['ID_INSCRIPCION'].'>'.$datos['NOMBRE_GRUPO'].'</option>';
        }   
        echo $bodyhtml."</select>";
        break;

    case '3':
        $queryTaller = "SELECT I.ID_INSCRIPCION, I.IDENTIFICACION_CLIENTE, COALESCE(G.NOMBRE_GRUPO, 'N/A') NOMBRE_GRUPO,  COALESCE(sum(C.VALOR), 0) VALOR_CLASES FROM INSCRIPCIONES I LEFT JOIN GRUPO G ON G.ID_GRUPO = I.GRUPO_ID LEFT JOIN CLASE C ON C.GRUPO_ID = G.ID_GRUPO WHERE I.ESTADO_INSCRIPCION = 'Debe' AND I.IDENTIFICACION_CLIENTE = '$IdCliente' AND I.GRUPO_ID <> 0 GROUP BY I.IDENTIFICACION_CLIENTE, NOMBRE_GRUPO";
        $resultado = mysqli_query($conexion, $queryTaller); 
        $bodyhtml ="<label style='font-family: Poppins-Bold;' class='form-label' for='form3Example8'>Seleccione Servicio:</label><select id='SeleccionarServicio' name='SeleccionarServicio' class='form-control form-control-lg' ><option selected disabled>Seleccione uno</option>"  ;  
        while ($datos = mysqli_fetch_array($resultado)) {
            $bodyhtml = $bodyhtml . '<option value='.$datos['ID_INSCRIPCION'].'>'.$datos['VALOR_CLASES'].'</option>';
        }   
        echo $bodyhtml."</select>";
        break;
        
    }                                                               

?>