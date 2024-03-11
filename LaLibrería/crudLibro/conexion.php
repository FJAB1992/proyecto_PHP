<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$conexion = mysqli_connect($servidor, $usuario, $password)
    or die("Error de conexión");

// $sql1 = "CREATE DATABASE IF NOT EXISTS productosbd";
// mysqli_query($conexion, $sql1);


// mysqli_select_db($conexion, "productosbd");

// $sql2 = "CREATE TABLE IF NOT EXISTS productos (
//     id_producto INT(11) NOT NULL, 
//     nombre VARCHAR (20), 
//     descripcion VARCHAR(255),
//     precio INT(11),
//     -- blob tipo de documento de imagenes
//     fotografia BLOB,
//     PRIMARY KEY(id_producto))";

// //Dará el error que se produce en la consulta: mysqli_error($conexion)

// mysqli_query($conexion, $sql2) or die(mysqli_error($conexion));
