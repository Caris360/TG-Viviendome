<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$grupo = $_POST['NombreGrupo'];
$idAcademia = $_POST['Academia'];
$precio = $_POST['ValorGrupo'];
$nombre = ucfirst($grupo);
$valor = convertirFormato($precio);

$validarGrupo = mysqli_query($conexion, "SELECT * FROM grupo WHERE NOMBRE_GRUPO = '$nombre'");

if ($validarGrupo->num_rows == 1) {
    echo "<script>alert('Ya existe el grupo'); window.location='/gestion_grupos.php'; </script>";
} else {
    $insertar = mysqli_query($conexion, "INSERT INTO GRUPO (ACADEMIA_ID, NOMBRE_GRUPO, VALOR_INSCRIPCION) VALUES ('$idAcademia', '$nombre','$valor')");
    $insertarH = mysqli_query($conexion, "INSERT INTO GRUPO_HISTORICO (ACADEMIA_ID, NOMBRE_GRUPO, VALOR_INSCRIPCION) VALUES ('$idAcademia', '$nombre','$valor')");
    $actualizarAcademia = mysqli_query($conexion, "UPDATE ACADEMIA SET CANTIDAD_GRUPOS =(SELECT COUNT(*) FROM GRUPO WHERE ACADEMIA_ID ='$idAcademia') WHERE ID_ACADEMIA = '$idAcademia'");
    $actualizarAcademiaH = mysqli_query($conexion, "UPDATE ACADEMIA_HISTORICO SET CANTIDAD_GRUPOS =(SELECT COUNT(*) FROM GRUPO WHERE ACADEMIA_ID ='$idAcademia') WHERE ID_ACADEMIA = '$idAcademia'");
    echo "<script>alert('¡Grupo registrado con éxito!'); window.location='/gestion_grupos.php'; </script>";
}

function convertirFormato($valor){
    return str_replace(array("$", ".", ","), "", $valor);
  }

?>