<?php
include "conexion.php";

mysqli_select_db($conexion,"libreria");

$libroborrar = $_GET["id"];

$borrar = "DELETE FROM libros WHERE id_producto = '$libroborrar'";
mysqli_query($conexion,$borrar);
header("Location: baja_ok.php");



?>