<?php
    //Me traigo la sesion
    session_start();

    //Recoger el id del usuario que vamos a modificar, junto con sus datos  (Los datos de un formulario se recogen usando el name)
    $codigo= $_GET["codigo"];
    $nombre= $_POST["nombre"];
    $email= $_POST["correo"];

    // Incluir el archivo de conexión
    require_once('conexion.php');

    //comprobacion de si estaba vacio (No funciona  )
    // if(sizeof($nombre)>0 && sizeof($email)>0 && sizeof($contraseña)>0 && sizeof($rol)){
    //     
    // }else{
    //     "Algun dato esta vacio";
    // } 

    $verUsuario = "UPDATE usuarios SET nombre='$nombre', email='$email' where id_usuario='$codigo'";
    //Los datos en una variable
    $funciona = mysqli_query($conexion, $verUsuario);

    if($funciona==1){
        print("Usuario modificado");
    }else{
        print("Algo ha fallado");
    }
    
    print "<a href='verUsuarios.php?'>Volver</a>   ";
    print "<a href='dashboard.php?'>Volver al dashboard</a>";
?>
