<?php
// Inicio de la sesión
session_start();

// Inclusión del archivo de conexión
require_once('conexion.php');

// Comprobación del método de solicitud
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Conexión a la base de datos
    $conexion = mysqli_connect($servidor, $usuario, $password, $basedatos) or die("Error de conexión");

    // Verificación de la conexión
    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    // Recuperación de los datos del formulario
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);  // Evitar la inyección SQL
    $contraseña = $_POST['contraseña'];

    // Consulta para obtener el usuario con una sentencia preparada
    $consulta = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conexion->prepare($consulta);

    // Verificación de la preparación de la consulta
    if ($stmt) {
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        // Verificación del resultado
        if ($resultado) {
            // Verificación de si el usuario existe
            if ($resultado->num_rows == 1) {
                $usuario = $resultado->fetch_assoc();

                // Verificación de la contraseña utilizando password_verify
                if (password_verify($contraseña, $usuario['contraseña'])) {
                    
                    // Usuario autenticado

                    // Guardar datos en la sesión
                    $_SESSION['iniciada'] = true;
                    $_SESSION['correo'] = $usuario['email'];
                    $_SESSION['idUsuario'] = $usuario['id_usuario'];

                    // Redireccionar siempre a dashboard.php
                    header("Location: dashboard.php");
                    exit();
                } else {
                    // Contraseña incorrecta
                    echo "Usuario o contraseña incorrectos";
                }
            } else {
                // Usuario no encontrado
                echo "Usuario o contraseña incorrectos";
            }
        } else {
            // Error en la consulta SQL
            echo "Error en la consulta: " . mysqli_error($conexion);
        }

        // Cerrar la conexión a la base de datos
        $stmt->close();
    } else {
        // Error en la preparación de la consulta SQL
        echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos si aún está abierta
    if ($conexion) {
        $conexion->close();
    }
} else {
    // Redireccionar si alguien intenta acceder directamente a login.php
    header("Location: index.php");
    exit();
}
?>
