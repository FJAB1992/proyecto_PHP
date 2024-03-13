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

// Obtener información del usuario de la sesión
$email = $_SESSION['correo'];

// Consulta SQL para obtener libros reservados por el usuario actual
$consulta_libros_reservados = "SELECT libros.titulo FROM libros JOIN usuarios ON libros.prestamo = usuarios.id WHERE usuarios.email = ?";
$stmt_libros_reservados = mysqli_prepare($conexion, $consulta_libros_reservados);
mysqli_stmt_bind_param($stmt_libros_reservados, "s", $email);
mysqli_stmt_execute($stmt_libros_reservados);
$resultado_libros_reservados = mysqli_stmt_get_result($stmt_libros_reservados);

// Verificar si se encontraron libros reservados
if ($resultado_libros_reservados && mysqli_num_rows($resultado_libros_reservados) > 0) {
    echo "<h2>Libros reservados por ti:</h2>";
    echo "<ul>";
    while ($fila = mysqli_fetch_assoc($resultado_libros_reservados)) {
        echo "<li>{$fila['titulo']}</li>";
    }
    echo "</ul>";
} else {
    echo "No tienes ningún libro reservado en este momento.";
}

mysqli_stmt_close($stmt_libros_reservados);
mysqli_close($conexion);
?>
