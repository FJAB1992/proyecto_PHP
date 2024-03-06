<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once('conexion.php');

// Verificar el método de solicitud
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Conectar a la base de datos
    $conexion = mysqli_connect($servidor, $usuario, $password, $basedatos) or die("Error de conexión");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    // Verificar si la contraseña está definida en el formulario
    if (isset($_POST['contraseña'])) {
        $contraseña_ingresada = $_POST['contraseña'];

        // Obtener la contraseña almacenada desde la tabla de seguridad
        $consultaSeguridad = "SELECT contraseña FROM seguridad";
        $resultadoSeguridad = $conexion->query($consultaSeguridad);

        if ($resultadoSeguridad && $resultadoSeguridad->num_rows > 0) {
            $filaSeguridad = $resultadoSeguridad->fetch_assoc();
            $contraseña_almacenada = $filaSeguridad['contraseña'];

            // Comparar contraseñas de manera básica
            if ($contraseña_ingresada === $contraseña_almacenada) {
                // Contraseña correcta, redirigir a creacionAdmin.php
                header("Location: creacionAdmin.php");
                exit(); // Asegurarse de salir después de la redirección
            } else {
                // Contraseña incorrecta
                echo "Error: Contraseña incorrecta.";
            }
        } else {
            echo "Error al obtener la contraseña almacenada.";
        }

    } else {
        // Datos del formulario incompletos
        die("Error: Datos del formulario incompletos.");
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    // Redireccionar si alguien intenta acceder directamente a registro.php
    header("Location: index.php");
    exit();
}
?>
