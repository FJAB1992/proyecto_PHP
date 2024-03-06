<?php
// En tu archivo conexion.php
global $servidor, $usuario, $password, $basedatos;

$servidor = "localhost";
$usuario = "root";
$password = ""; // Asegúrate de tener la contraseña correcta aquí
$basedatos = "libreria";

// Establecer la conexión con MySQL
$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos) or die("Error de conexión");

// Seleccionamos la Base de Datos
mysqli_select_db($conexion, $basedatos);

?>
