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

        //Recoger el id del usuario que vamos a modificar, junto con sus datos  (Los datos de un formulario se recogen usando el name)
        $codigo = $_GET["codigo"];
        $nombre = $_POST["nombre"];
        $email = $_POST["correo"];

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

        if ($funciona == 1) {
            print("<h2>Usuario modificado</h2>");
        } else {
            print("Algo ha fallado");
        }

        print "<br><br><button class='btn btn-secondary'><a href='verUsuarios.php?'>Volver</a></button>";
        print "<br><br><button class='btn btn-primary'><a href='dashboard.php?'>Volver al dashboard</a></button>";
        ?>
        <?php
        include "footer_libros.php";
        ?>
    </div>
</body>

</html>