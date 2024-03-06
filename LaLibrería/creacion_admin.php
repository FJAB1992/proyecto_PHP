<?php
require_once('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contraseña'])) {
    $contraseña_ingresada = trim($_POST['contraseña']);

    // Verificar si se envió el formulario de creación de administrador
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['contraseña'])) {
        $nombre = trim($_POST['nombre']);
        $email = trim($_POST['email']);
        $contraseña_admin = trim($_POST['contraseña']);
        $tipoUser = "admin";

        // Validar que los campos no estén vacíos
        if (!empty($nombre) && !empty($email) && !empty($contraseña_admin)) {
            // Escapar y guardar la contraseña del administrador
            $nombre = mysqli_real_escape_string($conexion, $nombre);
            $email = mysqli_real_escape_string($conexion, $email);

            // Hashear la contraseña
            $hash_contraseña = password_hash($contraseña_admin, PASSWORD_DEFAULT);

            // Insertar nuevo administrador en la tabla usuarios
            $insertar = "INSERT INTO usuarios(nombre, email, contraseña, rol) VALUES ('$nombre', '$email', '$hash_contraseña', '$tipoUser')";

            if (mysqli_query($conexion, $insertar)) {
                echo "Admin añadido exitosamente<br>";
                session_start();
                session_destroy();
                echo "<a href='iniciar_sesion.php'>Ir a iniciar sesión</a><br>";
            } else {
                echo "Error al agregar usuario: " . mysqli_error($conexion);
            }
        } else {
            echo "Error: Datos del formulario incompletos.";
        }
    } else {
        // Mostrar el formulario de creación de administrador
        echo "<h1>Creación de nuevo administrador</h1>";
        echo "<form action='creacion_admin.php' method='POST'>";
        echo "<label for='nombre'>Nombre usuario</label><br>";
        echo "<input type='text' id='nombre' name='nombre' placeholder='Pon tu nombre ' required><br><br>";
        echo "<label for='email'>Email</label><br>";
        echo "<input type='text' id='email' name='email' placeholder='Pon tu email' required><br><br>";
        echo "<label for='contraseña'>Contraseña: </label><br>";
        echo "<input type='password' id='contraseña' name='contraseña' placeholder='Pon tu contraseña' required><br><br>";
        echo "<input type='submit' value='Enviar'>";
        echo "</form>";
    }
} else {
    // Resto del código para el formulario de ingreso de contraseña...
}
?>
