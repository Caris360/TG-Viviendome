<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$id = $_POST['IDE'];

$eliminarClase = mysqli_query($conexion, "DELETE FROM clase WHERE ID_CLASE = '$id'");
$query = mysqli_query($conexion, "SELECT * FROM clase");
$number=1;

while ($row=mysqli_fetch_array($query)) {
    $id=$row['ID_CLASE'];
    $sql = mysqli_query($conexion,"UPDATE clase SET ID_CLASE = '$number' where ID_CLASE ='$id'");
    $number++;
}

header('location: /gestion_clases.php');

?>