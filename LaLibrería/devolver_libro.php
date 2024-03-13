<?php
session_start();

// Manejo de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir el archivo de conexión
require_once('conexion.php');

// Variable de la conexión (asegúrate de tener la configuración correcta aquí)
$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener el ID del libro desde la URL
$id_libro = $_GET['id_libro'];

// Verificar si el libro está prestado
$consulta_libro_prestado = "SELECT * FROM libros WHERE id_libro = $id_libro AND prestamo IS NOT NULL";
$resultado_libro_prestado = mysqli_query($conexion, $consulta_libro_prestado);

if (mysqli_num_rows($resultado_libro_prestado) > 0) {
    // El libro está prestado, entonces actualizamos la información
    $fila = mysqli_fetch_assoc($resultado_libro_prestado);

    // Actualizar la información del libro
    $consulta_devolver_libro = "UPDATE libros SET prestamo = NULL, disponibilidad = 1 WHERE id_libro = $id_libro";
    $resultado_devolver_libro = mysqli_query($conexion, $consulta_devolver_libro);

    if ($resultado_devolver_libro) {
        echo "Libro devuelto exitosamente.";
    } else {
        echo "Error al devolver el libro.";
    }
} else {
    // El libro no está prestado
    echo "El libro no está prestado o no te pertenece.";
}

mysqli_close($conexion);
?>
