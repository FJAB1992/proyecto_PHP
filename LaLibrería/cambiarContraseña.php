<?php
session_start();

// Incluir el archivo de conexión
require_once('conexion.php');

function generarPass()
{
    $numero= 8;
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
$consultar= "SELECT contraseña FROM seguridad";

$registros= mysqli_query($conexion, $consultar);
$original= "";

while($registro=mysqli_fetch_row($registros)){
    $original= $registro[0];
}

//Creo contraseña nueva
$pass= generarPass();


//La cambio
$sql="UPDATE seguridad SET contraseña='$pass' where contraseña='$original'";
mysqli_query($conexion, $sql) or die("error:".mysqli_error($conexion));

//Comporbacion del cambio de contraseña
$consultarNuevo= "SELECT contraseña FROM seguridad";

$registros= mysqli_query($conexion, $consultar);
$cambiado= "";

while($registro=mysqli_fetch_row($registros)){
    $cambiado= $registro[0];
}

if($pass == $cambiado){
    echo("Contraseña modificada");
    echo("<a href='dashboard.php?'>Volver</a>");print("<br>"); 
}

?>