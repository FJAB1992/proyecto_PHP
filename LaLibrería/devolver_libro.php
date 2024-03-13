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

        // Verificar si el libro está prestado
        $consulta_libro_prestado = "SELECT * FROM libros WHERE prestamo = $_SESSION[idUsuario]";
        $registros = mysqli_query($conexion, $consulta_libro_prestado);
        

            echo "<h2>Libros reservados:</h2>";
            echo "<div class='container'><table class='table'>";
            echo "<thead><tr><th>Título</th><th>Autor</th><th>Género</th><th>Fecha de publicación</th><th>Acción</th></tr></thead>";
            echo "<tbody>";
            while ($registro = mysqli_fetch_row($registros)) {

                print "<tr><td>$registro[1]</td>";
                print "<td>$registro[2]</td>";
                print "<td>$registro[3]</td>";
                print "<td>$registro[4]</td>";
                print "<td class='text-center'><a class='btn btn-primary' href='devolver_LibroBD.php?id_libro= $registro[0]'>Devolver</a></td></tr>";
            }
            print("</table>");


            mysqli_close($conexion);
        
        ?>

        <br>
        <a href="dashboard.php" class="btn btn-primary">Volver al listado de libros</a>
        <?php include("footer_libros.php"); ?>
    </div>
</body>

</html>