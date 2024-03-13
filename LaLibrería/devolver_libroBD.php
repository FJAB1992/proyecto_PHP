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
        <h1>Devolver libro</h1>
        
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
        $consulta_actualizar_disponibilidad = "UPDATE libros SET disponibilidad = 1 WHERE id_libro = $id_libro";
        $resultado_actualizar_disponibilidad = mysqli_query($conexion, $consulta_actualizar_disponibilidad);

        $consulta_actualizar_disponibilidad = "UPDATE libros SET prestamo = 0 WHERE id_libro = $id_libro";
        $resultado_actualizar_disponibilidad = mysqli_query($conexion, $consulta_actualizar_disponibilidad);

        // Verificar si se pudo actualizar la disponibilidad
        if ($resultado_actualizar_disponibilidad) {
            echo "¡El libro se ha devuelto con éxito!<br>";
        } else {
            echo "Error al realizar la devolucion.";
        }

        mysqli_close($conexion);
        ?>

        <a href="dashboard.php" class="btn btn-primary">Volver al listado de libros</a>
        <?php include("footer_libros.php"); ?>
    </div>
</body>

</html>