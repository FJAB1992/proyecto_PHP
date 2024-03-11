<?php
    //Me traigo la sesion
    session_start();

    // Incluir el archivo de conexión
    require_once('conexion.php');

    //Recoger el codigo
    $codigo= $_GET["codigo"];

    print "<h1>Informacion de usuarios</h1>";

    $consultarUser= "SELECT * FROM usuarios WHERE id_usuario=$codigo";

    $registros= mysqli_query($conexion, $consultarUser);
    

    while($registro=mysqli_fetch_row($registros)){
        print"Seguro que quiere borrar el usuario $registro[1]  ?<br>";
        print"<a href='eliminacionUsuario.php?codigo=$codigo'>Confirmar</a>      ";
        print"<a href='verUsuarios.php?'>volver</a>      ";
        print"<a href='dashboard.php?'>volver al dashboard</a>";
    }
?>