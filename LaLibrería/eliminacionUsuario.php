<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro en Librería</title>
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
    <div class="container text-center p-3 bg-success">
        <?php
        //Me traigo la sesion
        session_start();

        // Incluir el archivo de conexión
        require_once('conexion.php');

        //Recoger el codigo
        $codigo = $_GET["codigo"];

        print "<h1>Informacion de usuarios</h1>";

        $borrar = "DELETE FROM usuarios WHERE id_usuario=$codigo";

        $resultado = mysqli_query($conexion, $borrar);

        if ($resultado == 1) {
            print "Eliminado exitosamente<br>";
            print "<a href='dashboard.php?' class='btn btn-primary m-3'>Volver</a>";
        } else {
            print "Error al eliminar";
            print "<a href='dashboard.php?' class='btn btn-primary m-3'>Volver</a>";
        }
        ?>

        <?php include("footer_libros.php"); ?>
    </div>
</body>

</html>