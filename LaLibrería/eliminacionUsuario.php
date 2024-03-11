<?php
    //Me traigo la sesion
    session_start();

    // Incluir el archivo de conexión
    require_once('conexion.php');

    //Recoger el codigo
    $codigo= $_GET["codigo"];

    print "<h1>Informacion de usuarios</h1>";

    $borrar= "DELETE FROM usuarios WHERE id_usuario=$codigo";

    $resultado= mysqli_query($conexion, $borrar);

    if($resultado==1){
        print "Eliminado exitosamente<br>";
        print"<a href='dashboard.php?'>volver</a>";
    }else{
        print"Error al eliminar";
        print"<a href='dashboard.php?'>volver</a>";
    }
?>