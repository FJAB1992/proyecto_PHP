<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reserva Exitosa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid text-center p-3 bg-success">
        <h1>Reserva Exitosa</h1>
        
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

        // Obtener el ID del libro desde la URL
        $id_libro = $_GET['id_libro'];

        // Actualizar la disponibilidad del libro a 0
        $consulta_actualizar_disponibilidad = "UPDATE libros SET disponibilidad = 0 WHERE id_libro = $id_libro";
        $resultado_actualizar_disponibilidad = mysqli_query($conexion, $consulta_actualizar_disponibilidad);

        // Verificar si se pudo actualizar la disponibilidad
        if ($resultado_actualizar_disponibilidad) {
            echo "¡El libro se ha reservado con éxito!<br>";
        } else {
            echo "Error al realizar la reserva.";
        }

        mysqli_close($conexion);
        ?>

        <a href="dashboard.php" class="btn btn-primary">Volver al listado de libros</a>
    </div>
</body>

</html>