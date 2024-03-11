<?php include "conexion.php" ?>

<?php
mysqli_select_db($conexion, "libreria");

//var_dump($_POST);

//almacena lo que hay en el array asociativo
$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$genero = $_POST["genero"];
$fecha_publicacion = $_POST["fecha_publicacion"];
$disponibilidad = $_POST["disponibilidad"];


//Mostrará nombre,tipo,ubicación, errores, tamaño; ddel archivo
//var_dump($_FILES['imagen'])



$insertar = "INSERT libros (titulo,autor, genero,fecha_publicacion,disponibilidad) VALUES ('$titulo','$autor','$genero','$fecha_publicacion','$disponibilidad')";
mysqli_query($conexion, $insertar);
header("Location:alta_ok.php");
?>