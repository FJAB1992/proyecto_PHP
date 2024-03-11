<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Creación de Nuevo Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <style>
        a {
            text-decoration: none;
            color: white;
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