<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$academia = $_POST['NombreAcademia'];
$nombre = ucfirst($academia);
$validaAcademia = mysqli_query($conexion, "SELECT * FROM academia WHERE NOMBRE_ACADEMIA = '$nombre'");

if ($validaAcademia->num_rows == 1) {
    echo "<script>alert('Ya existe la academia'); window.location='/gestion_academias.php'; </script>";
} else {
    $insertar = mysqli_query($conexion, "INSERT INTO academia (NOMBRE_ACADEMIA, CANTIDAD_GRUPOS) VALUES ('$nombre', '0')");
    $insertar = mysqli_query($conexion, "INSERT INTO academia_historico (NOMBRE_ACADEMIA, CANTIDAD_GRUPOS) VALUES ('$nombre', '0')");
    $query = mysqli_query($conexion, "SELECT * FROM academia");
    $number = 1;

    while ($row = mysqli_fetch_array($query)) {
        $id = $row['ID_ACADEMIA'];
        $sql = mysqli_query($conexion, "UPDATE ACADEMIA SET ID_ACADEMIA= '$number' where ID_ACADEMIA ='$id'");
        $number++;
    }

    echo "<script>alert('¡Academia registrada con éxito!'); window.location='/gestion_academias.php'; </script>";
}
