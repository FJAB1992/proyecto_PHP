<?php
// Inicio de la sesión
session_start();

// Inclusión del archivo de conexión
require_once('conexion.php');

// Comprobación del método de solicitud
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recuperación de los datos del formulario
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    // Conexión a la base de datos
    $conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);

    // Verificación de la conexión
    if (!$conexion) {
        die("Error de conexión a la base de datos: " . mysqli_connect_error());
    }

    // Consulta para obtener el usuario con una sentencia preparada
    $consulta = "SELECT id_usuario, email, contraseña, rol FROM usuarios WHERE email = ?";
    $stmt = mysqli_prepare($conexion, $consulta);

    // Verificación de la preparación de la consulta
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $correo);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        // Verificación del resultado
        if ($resultado) {
            // Verificación de si el usuario existe
            if (mysqli_num_rows($resultado) == 1) {
                $usuario = mysqli_fetch_assoc($resultado);

                // Verificación de la contraseña utilizando password_verify
                if (password_verify($contraseña, $usuario["contraseña"])) {

                    // Usuario autenticado

                    // Guardar datos en la sesión
                    $_SESSION['iniciada'] = true;
                    $_SESSION['correo'] = $usuario['email'];
                    $_SESSION['idUsuario'] = $usuario['id_usuario'];
                    $_SESSION['rol'] = $usuario['rol'];

                    // Redireccionar siempre a dashboard.php
                    header("Location: dashboard.php");
                    exit();
                } else {
                    // Contraseña incorrecta
                    echo "Usuario o contraseña incorrectos";
                    echo "<br><br><button class='btn btn-primary'><a href='iniciar_sesion.php'>Volver</a></button>";
                }
            } else {
                // Usuario no encontrado
                echo "Usuario o contraseña incorrectos";
                echo "<br><br><button class='btn btn-primary'><a href='iniciar_sesion.php'>Volver</a></button>";
            }
        } else {
            // Error en la consulta SQL
            echo "Error en la consulta: " . mysqli_error($conexion);
        }

        // Cerrar la conexión a la base de datos
        mysqli_stmt_close($stmt);
    } else {
        // Error en la preparación de la consulta SQL
        echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos si aún está abierta
    mysqli_close($conexion);
} else {
    // Redireccionar si alguien intenta acceder directamente a login.php
    header("Location: index.php");
    exit();
}
