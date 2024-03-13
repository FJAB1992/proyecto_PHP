<?php include "conexion.php" ?>

<?php
mysqli_select_db($conexion, "libreria");

$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$genero = $_POST["genero"];
$fecha_publicacion = $_POST["fecha_publicacion"];
$disponibilidad = $_POST["disponibilidad"];

$insertar = "INSERT libros (titulo,autor, genero,fecha_publicacion,disponibilidad) VALUES ('$titulo','$autor','$genero','$fecha_publicacion','$disponibilidad')";
mysqli_query($conexion, $insertar);
header("Location:alta_ok.php");
?>