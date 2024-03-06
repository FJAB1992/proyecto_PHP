<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Creación de Nuevo Administrador</title>
    <style>
        body {
            text-align: center;
        }

        a {
            color: blue;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php
    // Datos de conexión
    require_once('conexion.php');

    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar si se ha enviado la contraseña desde el formulario
        if (isset($_POST["contraseña"])) {
            $pass = $_POST["contraseña"];

            // Variable de la conexión (ya está definida en conexion.php)
            // $conexion = mysqli_connect($servidor, $usuario, $password);
            mysqli_select_db($conexion, "libreria");

            $seleccionarTodo = "SELECT * FROM seguridad";
            $registroTodo = mysqli_query($conexion, $seleccionarTodo);

            $contraseñaBD = null;

            while ($registro = mysqli_fetch_row($registroTodo)) {
                $contraseñaBD = $registro[0];
            }

            if (!is_null($contraseñaBD) && password_verify($pass, $contraseñaBD)) {   
                // El código del formulario y las acciones que siguen
                echo "<h1>Creación de nuevo administrador</h1>";
                echo "<form action='creacionAdmin.php' method='POST'>";
                echo "<label for='nombre'>Nombre usuario</label><br>";
                echo "<input type='text' id='nombre' name='nombre' placeholder='Pon tu nombre ' required><br><br>";
                echo "<label for='email'>Email</label><br>";
                echo "<input type='text' id='email' name='email' placeholder='Pon tu email' required><br><br>";
                echo "<label for='contraseña'>Contraseña: </label><br>";
                echo "<input type='password' id='contraseña' name='contraseña' placeholder='Pon tu contraseña' required><br><br>";
                echo "<input type='submit' value='Enviar'>";
                echo "</form>";
            } else {
                echo "Contraseña incorrecta. No puedes crear un administrador.";
            }
        } else {
            echo "Error: Datos del formulario incompletos.";
        }
        mysqli_close($conexion); // Cerrar la conexión a la base de datos
    } else {
        echo "Todo mal";
    }
?>
</body>
</html>
