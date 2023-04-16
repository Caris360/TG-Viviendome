<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$id = $_POST['IDE'];

$eliminarTaller = mysqli_query($conexion, "DELETE FROM taller WHERE ID_TALLER = '$id'");
$query = mysqli_query($conexion, "SELECT * FROM taller");
$number=1;

while ($row=mysqli_fetch_array($query)) {
    $id=$row['ID_TALLER'];
    $sql = mysqli_query($conexion,"UPDATE taller SET ID_TALLER = '$number' where ID_TALLER ='$id'");
    $number++;
}

header('location: /listar_talleres.php');

?>