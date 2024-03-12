<?php
include "conexion.php";

$idm = $_GET["idmodifica"];

mysqli_select_db($conexion, "libreria");

$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$genero = $_POST["genero"];
$fecha_publicacion = $_POST["fecha_publicacion"];
$disponibilidad = isset($_POST["disponibilidad"]) ? 1 : 0; // Verifica si se ha marcado la casilla de disponibilidad

// Evitar la inyección SQL usando consultas preparadas
$query = "UPDATE libros SET titulo=?, autor=?, genero=?, fecha_publicacion=?, disponibilidad=? WHERE id_libro=?";
$stmt = mysqli_prepare($conexion, $query);

// Verificar si la preparación de la consulta fue exitosa
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssssii", $titulo, $autor, $genero, $fecha_publicacion, $disponibilidad, $idm);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

header("Location: alta_ok.php");
exit();
?>
