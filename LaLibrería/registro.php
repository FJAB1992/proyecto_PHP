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

    // Verificar si la contraseña y otros datos están definidos en el formulario
    if (isset($_POST['nombre'], $_POST['email'], $_POST['contraseña'])) {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Encriptar la contraseña

        // Definir el rol del nuevo usuario
        $rol_nuevo_usuario = (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin') ? 'admin' : 'user';

        // Insertar nuevo usuario en la tabla `usuarios`
        $consultaInsertarUsuario = "INSERT INTO `usuarios` (`nombre`, `email`, `contraseña`, `rol`) VALUES ('$nombre', '$email', '$contraseña', '$rol_nuevo_usuario')";
        
        if ($conexion->query($consultaInsertarUsuario) === TRUE) {
            // Redireccionar a iniciar_sesion.php con un mensaje
            header("Location: iniciar_sesion.php?mensaje=Usuario registrado correctamente");
            exit();
        } else {
            echo "Error al registrar el usuario: " . $conexion->error;
        }
    } else {
        // Datos del formulario incompletos
        echo "Error: Datos del formulario incompletos.";
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    // Redireccionar si alguien intenta acceder directamente a registro.php
    header("Location: index.php");
    exit();
}
?>
