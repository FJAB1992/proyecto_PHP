<?php


//Me traigo la sesion
session_start();

//Recoger el id del usuario que vamos a modificar
$codigo = $_GET["codigo"];

// Incluir el archivo de conexión
require_once('conexion.php');
print('<div class="container my-5   bg-success">');
print "<h1>Informacion de usuarios</h1>";

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
            print("$texto[$contador]:<input type='text' value='$registro[$contador]' id='$texto[$contador]' name='$texto[$contador]'/><br>");
        }
        $contador = $contador + 1;
    }
}

print "<input type='submit' value='Modificar'/>";
print "</form>";

print "<a href='verUsuarios.php?'>Volver</a>   ";
print "<a href='dashboard.php?'>Volver al dashboard</a>";
include "footer_libros.php";
