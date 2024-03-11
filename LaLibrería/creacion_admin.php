<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>

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
                    echo "<div class='text-center bg-success p-3'>Admin añadido exitosamente<br>";
                    session_start();
                    session_destroy();
                    echo "<a class='btn btn-primary' href='iniciar_sesion.php'>Ir a iniciar sesión</a><br> </div>";
                } else {
                    echo "Error al agregar usuario: " . mysqli_error($conexion);
                }
            } else {
                echo "Error: Datos del formulario incompletos.";
            }
        } else {
            // Mostrar el formulario de creación de administrador
            echo ("<div class='text-center bg-success'>");
            echo "<h1>Creación de nuevo administrador</h1>";
            echo "<form action='creacion_admin.php' method='POST'>";
            echo "<br><br><label for='nombre'>Nombre usuario</label>";
            echo "<input type='text' id='nombre' name='nombre' placeholder='Pon tu nombre ' required>";
            echo "<br><br><label for='email'>Email</label>";
            echo "<input type='text' id='email' name='email' placeholder='Pon tu email' required>";
            echo "<br><br><label for='contraseña'>Contraseña: </label><br>";
            echo "<input type='password' id='contraseña' name='contraseña' placeholder='Pon tu contraseña' required><br><br>";
            echo "<button class='btn btn-primary mb-3' type='submit'>Enviar</button>";
            echo "</form>";
            echo ("</div>");
        }
    } else {
        // Resto del código para el formulario de ingreso de contraseña...
    }
    ?>


    <div class="text-center p-3 m-3 bg-dark">
        <p class="text-white">Proyecto desarrollado por: Daniel A. Molina - Francisco J. Aranda - Carlos Vallejo</p>
    </div>
</body>

</html>