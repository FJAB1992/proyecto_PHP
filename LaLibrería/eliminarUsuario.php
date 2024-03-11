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
    //Me traigo la sesion
    session_start();

    // Incluir el archivo de conexión
    require_once('conexion.php');

    //Recoger el codigo
    $codigo = $_GET["codigo"];

    print "<h1>Informacion de usuarios</h1>";

    $consultarUser = "SELECT * FROM usuarios WHERE id_usuario=$codigo";

    $registros = mysqli_query($conexion, $consultarUser);



    while ($registro = mysqli_fetch_row($registros)) {
        print "Seguro que quiere borrar el usuario $registro[1]  ?<br>";
        print "<a href='eliminacionUsuario.php?codigo=$codigo' class='btn btn-danger p-3 m-3'>Confirmar</a><br>      ";
        print "<a href='verUsuarios.php?' class='btn btn-primary p-3 m-3'>Ver usuarios</a>      <br>";
        print "<a href='dashboard.php?' class='btn btn-secondary p-3 m-3'>Volver al dashboard</a>";
    }
    ?>
    <div class="text-center p-3 m-3 bg-dark">
        <p class="text-white">Proyecto desarrollado por: Daniel A. Molina - Francisco J. Aranda - Carlos Vallejo</p>
    </div>
</div>

</html>