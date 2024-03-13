<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Devolución Exitosa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid text-center p-3 bg-success">
        <h1>Devolución Exitosa</h1>
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
        $id_usuario = $_SESSION['id_usuario'];

        // Consulta SQL para obtener libros reservados por el usuario
        $consulta_libros_reservados = "SELECT * FROM libros WHERE prestamo = $id_usuario";
        $resultado_libros_reservados = mysqli_query($conexion, $consulta_libros_reservados);

        // Verificar si se encontraron libros reservados
        if ($resultado_libros_reservados && mysqli_num_rows($resultado_libros_reservados) > 0) {
            echo "<h2>Libros reservados:</h2>";
            echo "<div class='container'><table class='table'>";
            echo "<thead><tr><th>Título</th><th>Autor</th><th>Género</th></tr></thead>";
            echo "<tbody>";
            while ($fila = mysqli_fetch_assoc($resultado_libros_reservados)) {
                echo "<tr>";
                echo "<td>{$fila['titulo']}</td>";
                echo "<td>{$fila['autor']}</td>";
                echo "<td>{$fila['genero']}</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table></div>";
        } else {
            echo "No tienes libros reservados en este momento.";
        }

        mysqli_close($conexion);
        ?>


        <a href="dashboard.php" class="btn btn-primary">Volver al listado de libros</a>
    </div>
</body>

</html>