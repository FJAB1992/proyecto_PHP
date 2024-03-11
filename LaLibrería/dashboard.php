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
            color: black;
        }
    </style>
</head>
<body>
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

// Consulta SQL para obtener información del usuario
$consulta = "SELECT * FROM usuarios WHERE email=?";
$stmt = mysqli_prepare($conexion, $consulta);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

// Verificar si se encontró al menos un registro
if ($resultado && mysqli_num_rows($resultado) > 0) {
    $registro = mysqli_fetch_assoc($resultado);
    $nombre = $registro['nombre'];

    echo "<div class='container text-center bg-success'><h1>Bienvenido $nombre</h1>";

    if ($registro['rol'] == 'admin') {
        // Resto del código para administrador
        echo "<p>Eres un administrador.</p><br>";
        echo("<a class='btn btn-primary' href='cambiarContraseña.php?'>Cambiar contraseña de acceso</a>");print("<br><br>"); 
        echo("<a class='btn btn-primary' href='verUsuarios.php?'>Ver usuarios</a>");print("<br><br>");



    } else {
        // Resto del código para usuario
        echo "<p>Eres un usuario.</p>";

        print "<h1>Libros disponibles</h1>";

        $consultar= "SELECT * FROM libros WHERE disponibilidad=1";

        $registros= mysqli_query($conexion, $consultar);
        $cambiado= "";
        //Para identificar facilmente el id del libro a reservar
        $codigo=1;

        print "<table class='table p-3'>";
        print"<tr class='table-warning'><th>Título</th>";
        print"<th>Autor</th>";
        print"<th>Género</th>";
        print"<th>Publicación</th>";
        print"<th>Acciones</th></tr>";
        while($registro=mysqli_fetch_row($registros)){

            print"<tr><td>$registro[1]</td>";
            print"<td>$registro[2]</td>";
            print"<td>$registro[3]</td>";
            print"<td>$registro[4]</td>";
            //En este enlace se pasa el codigo del libro como variable
            print"<td class='bg-secondary'><a class='btn btn-primary' href='reserva_libro.php?codigo=$codigo'>Reservar</a></td></tr>";
            $codigo= $codigo+1;
        }

        print "</table>";
    }

    echo "<br><a  class='btn btn-warning' href='cerrarSesion.php'>Cerrar sesión</a>";
} else {
    // No se encontró al usuario en la base de datos, esto puede ser un problema
    echo "Error: Usuario no encontrado en la base de datos.";
}

mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>
</div>
</body>