<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mi Librería</title>
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
    <div class="container-fluid text-center p-3 bg-success">

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

        // Consulta SQL para obtener libros disponibles
        $consulta_libros_disponibles = "SELECT * FROM libros WHERE disponibilidad = 1";
        $resultado_libros_disponibles = mysqli_query($conexion, $consulta_libros_disponibles);

        // Verificar si se encontraron libros disponibles
        if ($resultado_libros_disponibles && mysqli_num_rows($resultado_libros_disponibles) > 0) {
            echo "<h2>Libros disponibles:</h2>";
            echo "<div class='container'><table class='table'>";
            echo "<thead><tr><th>Título</th><th>Autor</th><th>Género</th><th>Acción</th></tr></thead>";
            echo "<tbody>";
            while ($fila = mysqli_fetch_assoc($resultado_libros_disponibles)) {
                echo "<tr>";
                echo "<td>{$fila['titulo']}</td>";
                echo "<td>{$fila['autor']}</td>";
                echo "<td>{$fila['genero']}</td>";
                echo "<td><a href='archivo_de_reserva.php?id_libro={$fila['id_libro']}' class='btn btn-warning'>Reservar</a></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table></div>";
        } else {
            echo "No hay libros disponibles en este momento.";
        }

        mysqli_close($conexion);
        ?>

        <?php include("footer_libros.php"); ?>

    </div>
</body>

</html>
