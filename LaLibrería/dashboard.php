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

    echo "<h1>Bienvenido $nombre</h1>";

    if ($registro['rol'] == 'admin') {
        // Resto del código para administrador
        echo "<p>Eres un administrador.</p><br>";
        echo("<a href='cambiarContraseña.php?'>Cambiar contraseña de acceso</a>");print("<br>"); 
        echo("<a href='verUsuarios.php?'>Ver usuarios</a>");print("<br>");



    } else {
        // Resto del código para usuario
        echo "<p>Eres un usuario.</p>";

        print "<h1>Libros disponibles</h1>";

        $consultar= "SELECT * FROM libros WHERE disponibilidad=1";

        $registros= mysqli_query($conexion, $consultar);
        $cambiado= "";
        //Para identificar facilmente el id del libro a reservar
        $codigo=1;

        print "<table>";
        print"<tr><th>titulo</th>";
        print"<th>autor</th>";
        print"<th>genero</th>";
        print"<th>publicacion</th>";
        print"<th>Acciones</th></tr>";
        while($registro=mysqli_fetch_row($registros)){

            print"<tr><td>$registro[1]</td>";
            print"<td>$registro[2]</td>";
            print"<td>$registro[3]</td>";
            print"<td>$registro[4]</td>";
            //En este enlace se pasa el codigo del libro como variable
            print"<td><a href='reserva_libro.php?codigo=$codigo'>Reservar</a></td></tr>";
            $codigo= $codigo+1;
        }

        print "</table>";
    }

    echo "<a href='cerrarSesion.php'>Cerrar sesión</a>";
} else {
    // No se encontró al usuario en la base de datos, esto puede ser un problema
    echo "Error: Usuario no encontrado en la base de datos.";
}

mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>
