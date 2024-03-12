<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mi Librería</title>
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
    <div class="container text-center bg-success">
<?php

//Me traigo la sesion
session_start();

//Recoger el id del usuario que vamos a modificar
$codigo = $_GET["codigo"];

// Incluir el archivo de conexión
require_once('conexion.php');
print('<div class="container my-5   bg-success">');
print "<h1>Información de usuarios</h1>";

//Recoger los datos del usuario
$verUsuario = "SELECT * FROM usuarios where id_usuario=$codigo";

//Los datos en una variable
$registros = mysqli_query($conexion, $verUsuario);

$texto = ["id", "nombre", "correo", "contraseña", "rol"];
$contador = 1;

print "<form method='post' action='modificarUsuario.php?codigo=$codigo'>";

while ($registro = mysqli_fetch_row($registros)) {
    while ($contador < sizeof($registro)) {
        if ($contador != 3 && $contador != 4) {
            print("$texto[$contador]:<input type='text' value='$registro[$contador]' id='$texto[$contador]' name='$texto[$contador]'/><br><br>");
        }
        $contador = $contador + 1;
    }
}

print "<br><input type='submit' value='Modificar'/>";
print "</form>";

print "<br><button class='btn btn-secondary'><a href='verUsuarios.php?'>Volver</a></button>";
print "<br><br><button class='btn btn-primary'><a href='dashboard.php?'>Volver al dashboard</a></button>";
?>
<?php
include "footer_libros.php";
?>
</div>
</body>
</html>
