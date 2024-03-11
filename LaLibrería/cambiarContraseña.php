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

<div class="container text-center bg-success p-3">

    <?php
    session_start();

    // Incluir el archivo de conexión
    require_once('conexion.php');

    function generarPass()
    {
        $numero = 8;
        $abecedario = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWYZ";
        $pass = "";

        for ($i = 0; $i < $numero; $i++) {
            $caracterAleatorio = $abecedario[rand(0, strlen($abecedario) - 1)];
            $pass .= $caracterAleatorio;
        }
        return $pass;

        //Meter pass en la base de datos
        //Esto se va a activar unicamente con el uso de un boton en el dashboard de administradores, ya tendremos una contraseña en la bd inicial
    }

    //Leo la contraseña anterior
    $consultar = "SELECT contraseña FROM seguridad";

    $registros = mysqli_query($conexion, $consultar);
    $original = "";

    while ($registro = mysqli_fetch_row($registros)) {
        $original = $registro[0];
    }

    //Creo contraseña nueva
    $pass = generarPass();


    //La cambio
    $sql = "UPDATE seguridad SET contraseña='$pass' where contraseña='$original'";
    mysqli_query($conexion, $sql) or die("error:" . mysqli_error($conexion));

    //Comporbacion del cambio de contraseña
    $consultarNuevo = "SELECT contraseña FROM seguridad";

    $registros = mysqli_query($conexion, $consultar);
    $cambiado = "";

    while ($registro = mysqli_fetch_row($registros)) {
        $cambiado = $registro[0];
    }

    if ($pass == $cambiado) {
        echo ("Contraseña modificada<br>");
        echo ("<a href='dashboard.php?' class='btn btn-secondary p-3 m-3'>Volver</a>");
        print("<br>");
    }

    ?>


    <div class="text-center p-3 m-3 bg-dark">
        <p class="text-white">Proyecto desarrollado por: Daniel A. Molina - Francisco J. Aranda - Carlos Vallejo</p>
    </div>
</div>

</html>