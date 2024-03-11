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
            color: black;
        }
    </style>
    </style>
</head>

<body>

    <div class="container text-center bg-success">
        <?php


        //Me traigo la sesion
        session_start();

        // Incluir el archivo de conexión
        require_once('conexion.php');

        print "<h1>Informacion de usuarios</h1>";

        $consultar = "SELECT * FROM usuarios";

        $registros = mysqli_query($conexion, $consultar);
        $cambiado = "";
        print("<div class='table-responsive'>");
        print "<table class='table table-primary'>";
        print "<tr class='table-dark'><th scope='col'>Nombre</th>";
        print "<th scope='col'>Email</th>";
        print "<th scope='col'>Contraseña</th>";
        print "<th scope='col'>Rol</th>";
        print "<th scope='col'>Acciones</th></tr>";
        //PAra poder mandar el id del usuario
        while ($registro = mysqli_fetch_row($registros)) {
            $nombre = $registro[1];
            $email = $registro[2];
            $contraseña = $registro[3]; //Probablemente sea cifrado, convertir a texto
            $rol = $registro[4];

            print "<tr><td>$registro[1]</td>";
            print "<td>$registro[2]</td>";
            print "<td>$registro[3]</td>";
            print "<td>$registro[4]</td>";
            print "<td><a href='eliminarUsuario.php?codigo=$registro[0]' class='btn btn-danger'>Eliminar</a>  ";
            print "<a href='añadirUsuario.php?' class='btn btn-primary'>Añadir</a>  ";
            //Al acceder al enlace podemos sacar el id del usuario facilmente
            print "<a href='modificarUsuario.php?codigo=$$registro[0]' class='btn btn-warning'>Modificar</a></td></tr>";
        }

        print "</table>";
        print "<a href='dashboard.php?' class='btn btn-secondary'>Volver al inicio</a>";

        ?>
    </div>
</body>

</html>